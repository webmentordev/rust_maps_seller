<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'map_size',
        'is_active',
        'thumbnail',
        'mapfile'
    ];
}
