<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class News extends Model
{
    use HasFactory;
    use Mediable;

    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
        'date',
        'status'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'date' => 'datetime:d/m/Y'
    ];

}
