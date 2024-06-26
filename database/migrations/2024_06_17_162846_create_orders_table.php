<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('checkout_id');
            $table->string('email');
            $table->boolean('is_paid')->default(false);
            $table->decimal('price', 10, 2);
            $table->string('status')->default('pending');
            $table->bigInteger('downloads');
            $table->text('url');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};