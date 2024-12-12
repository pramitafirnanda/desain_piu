<?php

namespace App\Models\IklanKolom;

use Illuminate\Database\Eloquent\Model;

class AgenKolom extends Model
{
    protected $connection = 'db_iklan_kolom';
    protected $table = 'MastAgentKolom';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function areaKolom()
    {
        return $this->belongsTo(AreaKolom::class, 'AreaCode', 'AreaCode');
    }
}


