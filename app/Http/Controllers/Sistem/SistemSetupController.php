<?php

namespace App\Http\Controllers\Sistem;
use App\Http\Controllers\Controller;

class SistemSetupController extends Controller
{
    /* panggil nama function sesuai dengan nama yang sudah dibikin di routes/web => setup() */
    public function setup() {
        return view('sistem.setup.setup'); /* panggil nama view tanpa menyertakan .blade.php */
    }

}
