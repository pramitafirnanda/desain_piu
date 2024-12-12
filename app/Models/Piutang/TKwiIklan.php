<?php

namespace App\Models\Piutang;

use App\Models\JpkAccounting\AccChartOfAccount;
use App\Models\JpkAccounting\AccChartOfCashFlow;
use Illuminate\Database\Eloquent\Model;

class TKwiIklan extends Model
{
    protected $connection = 'db_piutang';
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
        $this->table = 'TKwiIklan_' . $tahun;
    }
}


