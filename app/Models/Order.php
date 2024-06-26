<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'checkout_id',
        'email',
        'is_paid',
        'status',
        'price',
        'downloads',
        'url'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}