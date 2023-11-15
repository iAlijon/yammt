<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'menu_id', 'status'];

    protected $casts = [
        'title' => 'array'
    ];

    public function category(){
        return $this->belongsTo(Menu::class);
    }
}
