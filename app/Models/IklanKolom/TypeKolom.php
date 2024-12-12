<?php

namespace App\Models\IklanKolom;

use Illuminate\Database\Eloquent\Model;

class TypeKolom extends Model
{
    protected $connection = 'db_iklan_kolom';
    protected $table = 'MastTypeKolom';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
}


