<?php

namespace App\Models\Piutang;

use Illuminate\Database\Eloquent\Model;

class Sistem extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'mni_Sistem';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
}
