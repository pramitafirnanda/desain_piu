<?php

namespace App\Models\JpkAccounting;

use Illuminate\Database\Eloquent\Model;

class AccChartOfAccount extends Model
{
    protected $connection = 'db_jpk_accounting';
    protected $table = 'Acc_ChartOfAccount';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
}


