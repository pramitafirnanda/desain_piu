<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelMenu extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'levelmenus';
    protected $guarded = [];
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function level()
    {
        return $this->belongsTo(Levels::class, 'kdlevel', 'kdlevel');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'kdmenu', 'kdmenu');
    }

}
