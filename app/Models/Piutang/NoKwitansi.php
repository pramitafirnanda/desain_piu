<?php

namespace App\Models\Piutang;

use App\Models\TesCode;
use Illuminate\Database\Eloquent\Model;

class NoKwitansi extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'NoKwitansi';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
}


