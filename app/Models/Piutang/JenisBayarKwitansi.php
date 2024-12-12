<?php

namespace App\Models\Piutang;

use App\Models\TesCode;
use Illuminate\Database\Eloquent\Model;

class JenisBayarKwitansi extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'jnsbyrkwi';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
}


