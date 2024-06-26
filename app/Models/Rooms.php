<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'areas',
        'images',
        'status',
    ];

    protected $casts = [
        'areas' => 'array',
        'images' => 'array',
    ];

}
