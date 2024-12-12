<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   
    protected $table = 'menus';
    public $timestamps = false;
    protected $guarded = [];

    /*protected $fillable = [
        'kdmenu',
        'nmmenu',
        'nmfrm',
        'lvl',
        'def',
        'parent',
        'group',
    ];*/

    protected $primaryKey = 'kdmenu';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'parent' => 'string',
    ];

    // relasi ke parent
    public function parents()
    {
        return $this->belongsTo(Menu::class, 'parent', 'kdmenu');
    }

    // Relasi ke children
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent', 'kdmenu');
    }
    
}
