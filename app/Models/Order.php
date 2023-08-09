<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'map_slug',
        'order_id',
        'checkout_id',
        'status',
        'price'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}