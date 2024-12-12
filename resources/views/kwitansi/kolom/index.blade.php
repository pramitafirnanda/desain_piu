@extends('layouts.dashboard-admin')
@section('content')
    {{--<section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h3>Kwitansi Kolom</h3>
                </div>
            </div>
        </div>
    </section>--}}
    <section class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Buat Kwitansi Kolom Baru</h5>
                        </div>
                        {{--<form action="{{ route('save-all') }}" method="POST">
                            @csrf
                            <button type="submit">asd</button>
                        </form>--}}
                        <div class="card-body overflow-x p-0">
                            <div class="col-12 p-3">
                                <div class="row">
                                    <div class="col-sm-7 col-12">
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Kode Area</label>
                                            <div class="col-10">
                                                <select id="kode_area" name="kode_area" class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">No. Kwitansi</label>
                                            <div class="col-10">
                                                <input type="text" name="no_kwitansi" id="no_kwitansi" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Tanggal</label>
                                            <div class="col-4">
                                                <input type="date" class="form-control date" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Kode Agent</label>
                                            <div class="col-10">
                                                <select id="kode_agent" name="kode_agent" class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Keterangan</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="keterangan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Jenis Pembayaran</label>
                                            <div class="col-4">
                                                <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control"></select>
                                            </div>
                                            <label class="col-2 text-right">No. Voucher</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="no_voucher" id="no_voucher">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 col-12">
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Jumlah</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="jumlahSemua" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Debet</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="debet" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Kredit</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="kredit" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 text-right">Netto</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="netto" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-warning btn-sm" id="buttonEntryIklan" disabled>Entry Iklan</button>
                                            <button class="btn btn-info btn-sm" id="buttonEntryBiaya" disabled>Entry Biaya</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary btn-sm" id="btnSaveAll">Save All</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>


    <!-- Modal Entry Iklan -->
    <div class="modal fade" id="modalEntryIklan" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="no_kwitansi_entry"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row pb-1">
                                <label class="col-2 text-right">Tipe Kolom</label>
                                <div class="col-10">
                                    <select id="type_kolom" name="type_kolom" class="form-control" style="width: 100% !important;"></select>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">No. Iklan</label>
                                <div class="col-7">
                                    <input type="text" name="TOrdNo" id="TOrdNo" class="form-control" readonly>
                                </div>
                                <div class="col-3">
                                    <button id="btnCariIklan" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Cari Nota Iklan</button>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">Tgl. Order</label>
                                <div class="col-4">
                                    <input type="date" class="form-control date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <label class="col-2 text-right">Pemasang</label>
                                <div class="col-10">
                                    <input type="text" name="pemasang" id="pemasang" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row pb-1">
                                <label class="col-3 text-right">Jumlah Order DPP</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="dpp" id="dpp" readonly>
                                </div>
                                <label class="col-2 text-right">Diskon</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="DiscExtP" id="DiscExtP" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">PPN</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="TaxM" id="TaxM" readonly>
                                </div>
                                <label class="col-2 text-right">Materai</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="Materai" id="Materai" readonly>
                                    <small>*Materai dimasukan biaya</small>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right"></label>
                                <div class="col-6">
                                    <hr class="my-2 border-dark">
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">Total Iklan</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="TotTagihanIklan" id="TotTagihanIklan" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">Terbayar</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="TotTagihan" id="TotTagihan" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">Nota Debet</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="notaDebet" value="0" readonly>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="" value="0" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">Nota Kredit</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="notaKredit" value="0" readonly>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="" value="0" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right"></label>
                                <div class="col-6">
                                    <hr class="my-2 border-dark">
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">Saldo Piutang</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="saldo" value="0" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <div class="col-9">
                                    <hr class="my-2 border-dark">
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-3 text-right">*Pembayaran Kini (Total)</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="pembayaran" required>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">PPh. 23</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="PphP" id="PphP" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="PphM" id="PphM" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-primary btn-sm" id="btnAddPembayaranIklan">Add Pembayaran</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal CARI IKLAN -->
    <div class="modal fade" id="modalCariIklan" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Iklan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tableModalCariIklan" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>No Iklan</th>
                            <th>Judul</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button id="addNotaIklan" class="btn btn-sm btn-primary" disabled>Add Nota</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--Tabel DATA --}}
    <section class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Data Iklan</h5>
                        </div>
                        <div class="card-body overflow-x p-0">
                            <table id="tableDataIklan" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Nomor</th>
                                    <th>Tgl.Order</th>
                                    <th>Bayar Total</th>
                                    <th>PPH (%)</th>
                                    <th>PPH (Rp)</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Data Biaya</h5>
                        </div>
                        <div class="card-body overflow-x p-0">
                            <table id="tableDataBiaya" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>D/K</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- === Modal ENTRY BIAYA !-->
    <div class="modal fade" id="modalEntryBiaya" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="no_kwitansi_entry"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            {{--<div class="row pb-1">
                                <label class="col-2 text-right">Nomor</label>
                                <div class="col-10">
                                    <input type="number" name="no_biaya" id="no_biaya" class="form-control">
                                </div>
                            </div>--}}
                            <div class="row pb-1">
                                <label class="col-2 text-right">Kode Biaya</label>
                                <div class="col-10">
                                    <select id="kode_biaya" name="kode_biaya" class="form-control" style="width: 100% !important;"></select>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">D/K</label>
                                <div class="col-10">
                                    <input type="text" name="DKA" id="DKA" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">Account</label>
                                <div class="col-10">
                                    <input type="text" name="Acc" id="Acc" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <label class="col-2 text-right">Cash flow</label>
                                <div class="col-10">
                                    <input type="text" name="Csf" id="Csf" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <label class="col-2 text-right">Jumlah Biaya</label>
                                <div class="col-10">
                                    <input type="text" name="jml_biaya" id="jml_biaya" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-primary btn-sm" id="btnAddPembayaranBiaya">Add Biaya</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('custom-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let areaCode;
        let agentCode;
        let typeCode;

        $(document).on('change', 'select[name="kode_area"],select[name="kode_agent"],select[name="jenis_pembayaran"]', function () {
            $('#buttonEntryIklan').prop('disabled', false);
            $('#buttonEntryBiaya').prop('disabled', false);

            // Cek apakah semua dropdown sudah terisi
            const kodeArea = $('select[name="kode_area"]').val();
            const kodeAgent = $('select[name="kode_agent"]').val();
            const jenisPembayaran = $('select[name="jenis_pembayaran"]').val();

            if (kodeArea && kodeAgent && jenisPembayaran) {
                $('#buttonEntryIklan').prop('disabled', false);
                $('#buttonEntryBiaya').prop('disabled', false);
            }
        });

        $('#kode_area').select2({
            allowClear: true,
            ajax: {
                delay: 250,
                url: '/kwitansi/search/kode-area-kolom',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.AreaCode,
                                text: item.text
                            };
                        }),
                        pagination: {
                            more: data.next_page_url != null
                        }
                    };
                }
            }
        });
        $('#kode_agent').select2();
        $('#kode_area').on('select2:select', function (e) {
            var kodeArea = e.params.data.id;
            $.ajax({
                url: '/kwitansi/generate/no-kwitansi-area-kolom/' + kodeArea,
                method: 'GET',
                success: function (response) {
                    $('#no_kwitansi').val(response);
                    $('#no_voucher').val(response);
                    areaCode = kodeArea;
                },
                error: function (xhr) {
                    alert('Gagal mengambil No. Kwitansi: ' + xhr.responseText);
                }
            });
            $('#kode_agent').select2({
                allowClear: true,
                ajax: {
                    delay: 250,
                    url: '/kwitansi/search/kode-agen-kolom/' + kodeArea,
                    dataType: 'json',
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    }
                }
            });
            $('#kode_agent').on('select2:select', function (e) {
                const selectedData = e.params.data;
                agentCode = selectedData.id;
            });
        });
        $('#jenis_pembayaran').select2({
            allowClear: true,
            /*theme: 'bootstrap4',*/
            ajax: {
                delay: 250,
                url: '/kwitansi/search/jenis-bayar',
                dataType: 'json',
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.jenis,
                                text: item.text
                            };
                        }),
                        pagination: {
                            more: data.next_page_url != null
                        }
                    };
                }
            }
        });
    </script>

    <script>
        function updateSummary() {
            let jumlahSemua = 0;
            let debet = 0;
            let kredit = 0;

            // Hitung jumlah dari pembayaran iklan
            $('#tableDataIklan tbody tr').each(function () {
                const pembayaran = parseInt($(this).find('td').eq(3).text().replace(/,/g, ''), 10) || 0;
                jumlahSemua += pembayaran;
            });

            // Hitung debet dan kredit dari pembayaran biaya
            $('#tableDataBiaya tbody tr').each(function () {
                const dka = $(this).find('td').eq(3).text();
                const jmlBiaya = parseInt($(this).find('td').eq(2).text().replace(/,/g, ''), 10) || 0;
                if (dka === 'D') {
                    debet += jmlBiaya;
                } else if (dka === 'K') {
                    kredit += jmlBiaya;
                }
            });

            const netto = jumlahSemua + debet - kredit;

            // Update nilai input
            $('input[name="jumlahSemua"]').val(jumlahSemua.toLocaleString());
            $('input[name="debet"]').val(debet.toLocaleString());
            $('input[name="kredit"]').val(kredit.toLocaleString());
            $('input[name="netto"]').val(netto.toLocaleString());
        }

    </script>

    <script>
        $('#btnSaveAll').click(function () {
            const kode_area = $('#kode_area').val();
            const no_kwitansi = $('#no_kwitansi').val();
            const tanggal = $('#tanggal').val();
            const kode_agent = $('#kode_agent').val();
            const keterangan = $('#keterangan').val();
            const jns_pembayaran = $('#jenis_pembayaran').val();
            const jumlahSemua = $('input[name="jumlahSemua"]').val();
            const debet = $('input[name="debet"]').val();
            const kredit = $('input[name="kredit"]').val();
            const netto = $('input[name="netto"]').val();

            // Ambil data dari tabel entry biaya
            const biayaEntries = [];
            $('#tableDataBiaya tbody tr').each(function () {
                const row = $(this);
                biayaEntries.push({
                    /*no_biaya: row.find('td:nth-child(1)').text().trim(),*/
                    kode_biaya: row.find('td:nth-child(1)').text().trim(),
                    keterangan: row.find('td:nth-child(2)').text().trim(),
                    jml_biaya: parseFloat(row.find('td:nth-child(3)').text().replace(/,/g, '').trim()) || 0,
                    DKA: row.find('td:nth-child(4)').text().trim()
                });
            });
            // Ambil data dari tabel entry iklan
            const iklanEntries = [];
            $('#tableDataIklan tbody tr').each(function () {
                const row = $(this);
                iklanEntries.push({
                    tipe_iklan: row.find('td:nth-child(1)').text().trim(),
                    no_iklan: row.find('td:nth-child(2)').text().trim(),
                    tgl_order: row.find('td:nth-child(3)').text().trim(),
                    bayar_iklan: parseFloat(row.find('td:nth-child(4)').text().replace(/,/g, '').trim()) || 0,
                    pphP: row.find('td:nth-child(5)').text().trim(),
                    pphR: row.find('td:nth-child(6)').text().trim()
                });
            });

            if (!kode_area || !no_kwitansi || !tanggal || !kode_agent || !jns_pembayaran) {
                alert('Mohon lengkapi semua');
                return;
            }

            /*alert(JSON.stringify({
                kode_area: kode_area,
                no_kwitansi: no_kwitansi,
                tanggal: tanggal,
                kode_agent: kode_agent,
                keterangan: keterangan,
                jns_pembayaran: jns_pembayaran,
                jumlah: jumlah,
                debet: debet,
                kredit: kredit,
                netto: netto,
                biayaEntries: biayaEntries,
                biayaIk: biayaEntries,
                _token: $('meta[name="csrf-token"]').attr('content')
            }))*/

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/kwitansi/kolom/save-all',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    kode_area: kode_area,
                    no_kwitansi: no_kwitansi,
                    tanggal: tanggal,
                    kode_agent: kode_agent,
                    keterangan: keterangan,
                    jns_pembayaran: jns_pembayaran,
                    jumlahSemua: jumlahSemua,
                    debet: debet,
                    kredit: kredit,
                    netto: netto,
                    biayaEntries: biayaEntries,
                    iklanEntries: iklanEntries
                }),
                success: function (response) {
                    console.log('Response:', response);
                    alert(JSON.stringify(response));
                    alert('Data berhasil disimpan!');
                    location.reload();

                    /*resetForm();*/
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                    console.error('Error:', xhr.responseText);
                }
            });
        });
        function resetForm() {
            // kosongkan form dan tabel
            $('#kode_area, #kode_agent, #jenis_pembayaran').val(null).trigger('change');
            $('#no_kwitansi, #tanggal, #keterangan').val('');
            $('input[name="jumlahSemua"], input[name="debet"], input[name="kredit"], input[name="netto"]').val(0);
            $('#tableDataBiaya tbody').empty();
            $('#tableDataIklan tbody').empty();
        }
    </script>

    <!-- === ENTRY IKLAN === -->
    <script>
        $('#buttonEntryIklan').click(function () {
            $('#modalEntryIklan').modal('show')

            const noKwitansi = $('#no_kwitansi').val();
            $('#no_kwitansi_entry').text(noKwitansi);

            $('#type_kolom').select2({
                allowClear: true,
                ajax: {
                    delay: 250,
                    url: '/kwitansi/search/type-kolom',
                    dataType: 'json',
                    theme: 'bootstrap4',
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    }
                }
            });
            $('#type_kolom').on('select2:select', function (e) {
                const selectedData = e.params.data;
                typeCode = selectedData.id;
            });
        });

        let selectedIklanCode = null;

        // Ketika tombol cariIklan diklik
        $('#btnCariIklan').click(function () {
            const url = `/kwitansi/search/nota-iklan-kolom?area=${areaCode}&agent=${agentCode}&type=${typeCode}`;

            // Clear tabel sebelum memuat data baru
            $('#tableModalCariIklan tbody').empty();

            // Ambil data dari server
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        data.forEach(item => {
                            $('#tableModalCariIklan tbody').append(`
                        <tr>
                            <td><input type="radio" name="iklan" value="${item.no_iklan}"></td>
                            <td style="white-space: nowrap">${item.no_iklan}</td>
                            <td>${item.name}</td>
                            <td>${item.total}</td>
                        </tr>
                    `);
                        });
                    } else {
                        $('#tableModalCariIklan tbody').append('<tr><td colspan="3">No data found</td></tr>');
                    }
                    $('#modalCariIklan').modal('show');
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });

            $(document).on('change', 'input[name="iklan"]', function () {
                selectedIklanCode = $(this).val();
                $('#addNotaIklan').prop('disabled', false);
            });

            $('#modalCariIklan').on('hidden.bs.modal', function () {
                $('body').addClass('modal-open'); // Atur kembali scroll untuk modal pertama
                $('#modalEntryIklan').css('overflow-y', 'auto'); // Pastikan modal pertama bisa scroll
            });

            $('#addNotaIklan').click(function () {
                if (selectedIklanCode) {
                    $.ajax({
                        url: '/kwitansi/add/nota-iklan-kolom',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            code: selectedIklanCode,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            $('#TOrdNo').val(response.TOrdNo);
                            $('#dpp').val(response.dpp);
                            $('#TaxM').val(response.TaxM);
                            $('#TotTagihanIklan').val(response.TotTagihan);
                            $('#TotTagihan').val(response.TotTagihan);
                            $('#DiscExtP').val(response.DiscExtP);
                            $('#Materai').val(response.Materai);
                            $('#PphP').val(response.PphP);
                            $('#PphM').val(response.PphM);
                            $('#pemasang').val(response.t_ord_no_kol_client.ClientCode + "/" + response.t_ord_no_kol_client.ClientName);
                            $('#modalCariIklan').modal('hide');
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });

        $('#btnAddPembayaranIklan').click(function () {
            const pembayaran = $('input[name="pembayaran"]').val();
            const noIklan = $('#TOrdNo').val();
            if (!pembayaran) {
                alert('Pembayaran tidak boleh kosong!');
                return;
            }
            $.ajax({
                url: '/kwitansi/add/pembayaran-iklan-kolom',
                type: 'POST',
                dataType: 'json',
                data: {
                    pembayaran: pembayaran,
                    no_iklan: noIklan,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    data.forEach(item => {
                        $('#tableDataIklan tbody').append(`
                    <tr>
                        <td>${item.tipe_iklan}</td>
                        <td>${item.no_iklan}</td>
                        <td>${item.tgl_order}</td>
                        <td>${parseInt(item.pembayaran).toLocaleString()}</td>
                        <td>${item.pph}</td>
                        <td>${item.pph_rp}</td>
                    </tr>
                `);
                    });

                    updateSummary();

                    $('#modalEntryIklan').on('hidden.bs.modal', function () {
                        $(this).find('input, select, textarea').val(0); // Set semua nilai ke 0
                        $(this).find('input[type="checkbox"], input[type="radio"]').prop('checked', false); // Uncheck semua checkbox dan radio
                    });
                    $('#modalEntryIklan').modal('hide')
                },
                error: function (xhr) {
                    alert(xhr.responseText);
                }
            });
        });
    </script>


    <!-- === Modal Untuk ENTRY BIAYA === -->
    <script>
        function getLastNoBiaya() {
            const lastRow = $('#tableDataBiaya tbody tr:last');
            if (lastRow.length > 0) {
                const lastNoBiaya = parseInt(lastRow.find('td:first').text().trim());
                return lastNoBiaya || 0;
            }
            return 0;
        }

        $('#buttonEntryBiaya').click(function () {
            $('#modalEntryBiaya').modal('show');

            $('#kode_biaya').select2({
                allowClear: true,
                ajax: {
                    delay: 250,
                    url: '/kwitansi/search/kode-biaya-kolom',
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results: data.results.map(item => ({
                                id: item.id,
                                text: item.text,
                                Acc: item.Acc,
                                Csf: item.Csf,
                                DKA: item.DKA
                            })),
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    }
                }
            });
            $('#kode_biaya').on('select2:select', function (e) {
                const selectedData = e.params.data;
                // Mengisi input field dengan data dari response
                $('#DKA').val(selectedData.DKA);
                $('#Acc').val(selectedData.Acc);
                $('#Csf').val(selectedData.Csf);
            });
        });

        $('#btnAddPembayaranBiaya').click(function () {
            const jml_biaya = $('input[name="jml_biaya"]').val();
            const kode_biaya = $('#kode_biaya').val();
            const kode_agent = $('#kode_agent').val();
            const kode_area = $('#kode_area').val();
            if (!jml_biaya) {
                alert('Pembayaran tidak boleh kosong!');
                return;
            }
            $.ajax({
                url: '/kwitansi/add/jumlah-biaya-kolom',
                type: 'POST',
                dataType: 'json',
                data: {
                    jml_biaya: jml_biaya,
                    kode_biaya: kode_biaya,
                    kode_agent: kode_agent,
                    kode_area: kode_area,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    data.forEach(item => {
                        $('#tableDataBiaya tbody').append(`
                    <tr>

                        <td>${item.kode_biaya}</td>
                        <td>${item.keterangan || 'Tidak ada keterangan'}</td>
                        <td>${parseInt(item.jml_biaya || 0).toLocaleString()}</td>
                        <td>${item.DKA || '-'}</td>
                    </tr>
                `);
                    });

                    updateSummary();

                    $('#modalEntryBiaya').on('hidden.bs.modal', function () {
                        $(this).find('input, select, textarea').val('');
                        $(this).find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
                    });
                    $('#modalEntryBiaya').modal('hide');
                },
                error: function (xhr) {
                    alert(xhr.responseText);
                }
            });
        });
    </script>



@endsection
