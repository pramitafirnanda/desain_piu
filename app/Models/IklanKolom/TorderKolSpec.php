<?php

namespace App\Models\IklanKolom;

use App\Models\TesCode;
use Illuminate\Database\Eloquent\Model;

class TorderKolSpec extends Model
{
    protected $connection = 'db_iklan_kolom';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function __construct($tahun = null)
    {
        parent::__construct();
        $this->setTableForYear($tahun ?? date('Y'));
    }

    public function setTableForYear($tahun)
    {
        $this->table = 'TOrderKolSpec_' . $tahun;
    }
}


