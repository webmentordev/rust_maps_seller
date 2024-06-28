<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'stripe_id',
        'slug',
        'price',
        'is_active',
        'image',
        'file',
        'size',
        'description',
        'seo'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function images(){
        return $this->hasMany(Gallery::class);
    }
}
