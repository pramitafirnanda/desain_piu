<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    protected $connection = 'db_piutang';
    protected $table = 'usersmenu';
    protected $guarded = [];
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'kdmenu', 'kdmenu');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'kduser', 'kduser');
    }
}
