<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Gellery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'original_map_name',
        'slug',
        'price',
        'price_id',
        'stripe_id',
        'map_size',
        'is_fps',
        'is_combined',
        'is_buildable',
        'is_active',
        'is_outdated',
        'thumbnail',
        'mapfile',
        'description'
    ];

    protected $hidden = [
        'mapfile',
        'original_map_name'
    ];

    public function images(){
        return $this->hasMany(Gellery::class)->where('is_active', true);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}