<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status'
    ];

    protected $casts = [
        'title' => 'array'
    ];

    public function menu()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu_id', 'id');
    }
}
