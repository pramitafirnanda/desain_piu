<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'levels';
    protected $guarded = [];
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

}
