<?php
namespace App\Http\Helpers;

use App\Models\Historis\Programlog;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class UserHelper {

    public function encryptPassword($inputPwd){

        $len =strlen($inputPwd);
        $odd=''; $even='';
        for($i=0;$i<$len;$i++){
            $ch=chr(ord($inputPwd[$i])+$len);
            if (($i % 2)<>1)
                $odd=$odd.$ch;
            else
                $even=$even.$ch;
        }
        $result=$odd.$even;
        return $result;
    }

    public function decryptPassword($inputPwd){
        $len =strlen($inputPwd);
        $cut=ceil($len / 2);
        $odd=substr($inputPwd,0,$cut);
        $even=substr($inputPwd,$cut,$len);
        $result=''; $counter=0;
        for($i=0;$i<$len;$i++){
            if (($i % 2)<>1){
                $result=$result.$odd[$counter];
            } else {
                $result=$result.$even[$counter];
                $counter=$counter+1;
            }
            $result[$i]=chr(ord($result[$i])-$len);
        }
        return $result;
    }

    public function createProgramLog($url, $noBukti, $aksi, $ket){

        $menu = Menu::where('link', $url)->first();
        $log = new Programlog();
        $log->userlogin = Auth::user()->kduser;
        $log->namalogin = Auth::user()->nmuser;
        $log->grouplogin = null;
        $log->modul = 00;
        $log->submodul = $menu->nmfrm;
        $log->pkind = 0;
        $log->nobukti = $noBukti;
        $log->aksi = $aksi;
        $log->tanggal = date("Y-m-d H:i:s");
        $log->ket = $ket ?? '';
        $log->save();
        return $log;
    }
}
?>
