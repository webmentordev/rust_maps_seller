<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('stripe_id');
            $table->text('slug');
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->text('image');
            $table->string('file');
            $table->bigInteger('size');
            $table->text('description');
            $table->string('seo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
