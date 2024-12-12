<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesCode extends Model
{
    protected $table = 'tesCode';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
}


