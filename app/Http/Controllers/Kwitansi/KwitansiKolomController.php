<?php

namespace App\Http\Controllers\Kwitansi;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ReturnHelper;
use App\Http\Helpers\UserHelper;
use App\Models\Historis\Programlog;
use App\Models\IklanKolom\AgenKolom;
use App\Models\IklanKolom\AreaKolom;
use App\Models\IklanKolom\TorderKol;
use App\Models\IklanKolom\TypeKolom;
use App\Models\Menu;
use App\Models\Piutang\JenisBayarKwitansi;
use App\Models\Piutang\MasterBiaya;
use App\Models\Piutang\NoKwitansi;
use App\Models\Piutang\Pphiklan;
use App\Models\Piutang\TKwiBiaya;
use App\Models\Piutang\TKwiIklan;
use App\Models\Piutang\TKwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KwitansiKolomController extends Controller
{
    function __construct(){
        $this->userHelp = new UserHelper();
        $this->returnHelp = new ReturnHelper();
    }

    public function kolom(){
        /*$master = AgenKolom::where('AreaCode', 'JB')->where('AgentCode', "002")->with('areaKolom')->first();
        dd($master);*/

       /* $to = TorderKol::where('TOrdNo', 'AV-JB-00004-2024')->with('TOrdNoKolSpec')->with('TOrdNoKolClient')->first();
        dd($to->TOrdNoKolClient);*/

        return view('kwitansi.kolom.index');
    }

    public function saveAllKwitansiKolom(Request $request){
        $data = $request->json()->all();
        return response()->json([
            'iklanEntries' => $data['iklanEntries'] ?? [],
        ]);

        $kode_area = $data['kode_area'] ?? null;
        $no_kwitansi = $data['no_kwitansi'] ?? null;
        $tanggal = $data['tanggal'] ?? null;
        $kode_agent = $data['kode_agent'] ?? null;
        $keterangan = $data['keterangan'] ?? null;
        $jns_pembayaran = $data['jns_pembayaran'] ?? null;
        $jumlahSemua = $data['jumlahSemua'] ?? null;
        $debet = $data['debet'] ?? null;
        $kredit = $data['kredit'] ?? null;
        $netto = $data['netto'] ?? null;
        $year = date('Y');

        $master = AgenKolom::where('AreaCode', $kode_area)->where('AgentCode', $kode_agent)->with('areaKolom')->first();

        $kwitansi = new TKwitansi();
        $kwitansi->Iklan = '' ?? null;
        $kwitansi->AreaCode = $master->areaKolom->AreaCode;
        $kwitansi->AreaName = $master->areaKolom->AreaName;
        $kwitansi->KwitansiNo = $no_kwitansi;
        $kwitansi->KwitansiDate = $tanggal;
        $kwitansi->AgentCode = $master->AgentCode;
        $kwitansi->AgentName = $master->AgentName;;
        $kwitansi->Keterangan = $keterangan;
        $kwitansi->NoVoucher = $no_kwitansi;
        $kwitansi->JenisBayar = $jns_pembayaran;
        $kwitansi->Jumlah = $jumlahSemua;
        $kwitansi->Debet = $debet;
        $kwitansi->Kredit = $kredit;
        $kwitansi->Netto = $netto;
        $kwitansi->Posting = null;
        $kwitansi->Protect = null;
        $kwitansi->Protdate = null;
        $kwitansi->iklansp = null;
        $kwitansi->save();

        foreach ($data['iklanEntries'] as $entry => $val) {
            $to = TorderKol::where('TOrdNo', $val['no_iklan'])->with('TOrdNoKolSpec')->with('TOrdNoKolClient')->first();
            $iklan = new TKwiIklan();
            $iklan->KwitansiNo = $no_kwitansi;
            $iklan->NoUrut = $entry + 1;
            $iklan->TypeCode = $to->TypeCode ?? 0;
            $iklan->TypeName = $to->TypeName ?? 0;
            $iklan->TOrdNo = $val['no_iklan'];
            $iklan->OrderDate = $tanggal;
            $iklan->ClientCode = $to->TOrdNoKolClient->ClientCode;
            $iklan->ClientName = $to->TOrdNoKolClient->ClientName;
            $iklan->ProdCode = $to->TOrdNoKolSpec->ProdCode;
            $iklan->ProdName = $to->TOrdNoKolSpec->ProdName;
            $iklan->OrderDescription = $to->OrderDescription;
            $iklan->OrderDPP =  $to->dpp;
            $iklan->OrderPPN = $to->TaxM;
            $iklan->OrderMaterai = $to->Materai;
            $iklan->OrderTotal = $to->TotTagihan;
            $iklan->BayarTotal = $val['bayar_iklan'] ?? 0;
            $iklan->save();

            $pphIklan = new Pphiklan();
            $pphIklan->areaagent = $master->areaKolom->AreaCode.$master->AgentCode;
            $pphIklan->noiklan = $val['no_iklan'];
            $pphIklan->nokwi = $no_kwitansi;
            $pphIklan->pphp = $val['pphP'];
            $pphIklan->pphm =  $val['pphR'];
            $pphIklan->nopph = null;
            $pphIklan->tglpph = '' ?? null;
            $pphIklan->src = null;
            $pphIklan->pilih = 0;
            $pphIklan->nocatat = null;
            $pphIklan->tglorder = $tanggal;
            $pphIklan->save();

        }

        foreach ($data['biayaEntries'] as $entry => $val) {
            $biaya = new TKwiBiaya();
            $biaya->KwitansiNo = $no_kwitansi ?? null;
            $biaya->NoUrut = $entry + 1;
            $biaya->BiayaCode = $val['kode_biaya'] ?? null;
            $biaya->Keterangan =  isset($val['keterangan']) ? substr($val['keterangan'], 0, 30) : null; // Maksimal 30 karakter
            $biaya->DKA = isset($val['DKA']) ? substr($val['DKA'], 0, 1) : null;
            $biaya->Jumlah = isset($val['jml_biaya']) ? round($val['jml_biaya'], 2) : null;
            $biaya->save();
        }

        // update no_kwitansi
        list($kodearea, $tahun, $nokwi) = explode('-', $no_kwitansi);
        $nokw = NoKwitansi::where('AreaType', $kodearea)->where('Tahun', $tahun)->first();
        if ($nokw) {
            $nokw->update(['NoKwi' => $nokwi]);
        }

        // simpan ke programlog
        $path_url = '/'.Str::beforeLast($request->path(), '/');
        $this->userHelp->createProgramLog($path_url, $no_kwitansi, 'simpan', null);

        return response()->json([
            'no_kwitansi' => $no_kwitansi,
            'tanggal' => $tanggal,
            'kode_area' => $kode_area,
            'biayaEntries' => $data['biayaEntries'] ?? [],
            'iklanEntries' => $data['iklanEntries'] ?? [],
        ]);

    }

    public function searchKodeAreaKolom(Request $request){
        $area = AreaKolom::when($request->get('search'), function($query) use ($request){
            return $query->where('AreaCode', 'like', '%'.$request->get('search').'%');
        })->select('AreaCode', DB::raw("AreaCode + ' - ' + AreaName as text"))
            ->paginate(10);
        return $area;
    }

    public function searchJenisBayar(Request $request){
        $data = JenisBayarKwitansi::when($request->get('search'), function($query) use ($request){
            return $query->where('AreaCode', 'like', '%'.$request->get('search').'%');
        })->select('jenis', DB::raw("jenis as text"))
            ->paginate(10);
        return $data;
    }

    public function searchKodeAgenKolom($kodeArea, Request $request){
        $data = AgenKolom::where('AreaCode', $kodeArea)
            ->when($request->get('q'), function ($query) use ($request) {
                return $query->where('AgentCode', 'like', '%' . $request->get('q') . '%');
            })
            ->select('AgentCode', DB::raw("AreaCode + ' - ' + AgentCode + ' - ' + AgentName as text"))
            ->get();
        return $this->returnHelp->paginationSelect($request, $data, 'AgentCode');
    }

    public function generateNoKwitansiAreaKolom($kodeArea){
        $year = date('Y');
        $no = NoKwitansi::where('AreaType', $kodeArea)->where('Tahun', $year)->first();
        if (!$no) {
            return response()->json('No. Kwitansi tidak ditemukan', 404);
        }
        $noKwiPlus = str_pad($no->NoKwi + 1, 6, '0', STR_PAD_LEFT);


        $text = "$no->AreaType-$year-$noKwiPlus";
        return response()->json($text);
    }

    public function searchTypeKolom(Request $request){
        $data = TypeKolom::where('active', 'Y')->when($request->get('search'), function($query) use ($request){
            return $query->where('TypeCode', 'like', '%'.$request->get('search').'%');
        })->select('TypeCode', DB::raw("TypeCode + ' - ' + TypeName as text"))
            ->orderByRaw("CASE WHEN urutan IS NULL THEN 1 ELSE 0 END, urutan ASC")->get();

        return $this->returnHelp->paginationSelect($request, $data, 'TypeCode');
    }

    public function searchNotaIklanKolom(Request $request){
        $data = TorderKol::where('TypeCode', $request->type)->where('AreaCode', $request->area)
            ->where('AgentCode', $request->agent)
            ->select('TOrdNo as no_iklan', 'TOrdNo as no_iklan2' , 'OrderDescription as name', 'TotTagihan as total')
            ->get();
        return response()->json($data);
    }

    public function addNotaIklanKolom(Request $request){
        $data = TorderKol::where('TOrdNo', $request->code)->with('TOrdNoKolSpec')->with('TOrdNoKolClient')->first();
        return response()->json($data);
    }

    public function addPembayaranIklanKolom(Request $request){
        $validatedData = $request->validate([
            'pembayaran' => 'required|numeric|min:1',
            'no_iklan' => 'required|string',
        ]);
        if (!$validatedData){
            return response()->json("Pembayaran Harus diisi dan pastikan Nomor Iklan tercatat", 500);
        }

        $to = TorderKol::where('TOrdNo', $request->no_iklan)->first();
        if (!$to){
            return response()->json("Tidak ada data order", 500);
        }
        $data = [
            'tipe_iklan' => $to->TypeCode,
            'no_iklan' => $to->TOrdNo,
            'tgl_order' => (new \DateTime($to->OrderDate))->format('m/d/Y'),
            'pembayaran' => $request->pembayaran,
            'pph' => $to->PphP,
            'pph_rp' => $to->PphM,
        ];
        return response()->json([$data]);
    }


    // === BIAYA KOLOM === //
    public function searchKodeBiayaKolom(Request $request)
    {
        $data = MasterBiaya::when($request->get('search'), function($query) use ($request) {
            return $query->where('BiayaCode', 'like', '%'.$request->get('search').'%');
        })
            ->select('BiayaCode', 'BiayaName', 'Acc', 'Csf', 'DKA',
                DB::raw("BiayaCode + ' - ' + BiayaName as text"))
            ->get();

        $perPage = 10;
        $page = $request->get('page', 1);
        $paginated = $data->slice(($page - 1) * $perPage, $perPage)->values();

        return response()->json([
            'results' => $paginated->map(function ($item) {
                return [
                    'id' => $item->BiayaCode,
                    'text' => $item->text,
                    'Acc' => $item->Acc,
                    'Csf' => $item->Csf,
                    'DKA' => $item->DKA
                ];
            }),
            'pagination' => [
                'more' => $paginated->count() == $perPage,
            ],
        ]);
    }

    public function addJumlahBiayaKolom(Request $request){
        $validatedData = $request->validate([
            'jml_biaya' => 'required|numeric|min:1',
        ]);

        if (!$validatedData){
            return response()->json("Jumlah Biaya Harus diisi dan lebih dari 0", 500);
        }
        $mas_biaya = MasterBiaya::where('BiayaCode', $request->kode_biaya)->first();
        $kode_agen = AgenKolom::where('AreaCode', $request->kode_area)->where('AgentCode', $request->kode_agent)->first();
        $keterangan = $mas_biaya->BiayaName." ". $kode_agen->AgentName;


        $data = [
            'kode_biaya' => $request->kode_biaya,
            'keterangan' => $keterangan,
            'jml_biaya' => $request->jml_biaya,
            'DKA' => $mas_biaya->DKA,
        ];
        return response()->json([$data]);
    }


}
