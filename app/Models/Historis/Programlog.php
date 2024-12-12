<?php

namespace App\Models\Historis;

use Illuminate\Database\Eloquent\Model;

class Programlog extends Model
{
    protected $connection = 'db_historis';
    protected $table = 'programlog';
    protected $guarded = [];
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
}
