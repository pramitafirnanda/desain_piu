<?php

namespace App\Models\Piutang;

use App\Models\JpkAccounting\AccChartOfAccount;
use App\Models\JpkAccounting\AccChartOfCashFlow;
use Illuminate\Database\Eloquent\Model;

class MasterBiaya extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'MastBiaya';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function AccChartOfAccount()
    {
        return $this->belongsTo(AccChartOfAccount::class, 'Acc', 'Acc');
    }
    public function tKwiBiaya()
    {
        return $this->hasMany(TKwiBiaya::class, 'biayacode', 'biayacode');
    }
    public function accChartOfCashFlow()
    {
        return $this->belongsTo(AccChartOfCashFlow::class, 'csf', 'csf');
    }


}
