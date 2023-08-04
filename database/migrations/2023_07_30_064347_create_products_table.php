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
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 10, 2);
            $table->string('price_id');
            $table->string('stripe_id');
            $table->string('map_size');
            $table->boolean('is_fps')->nullable()->default(false);
            $table->boolean('is_buildable')->nullable()->default(false);
            $table->boolean('is_combined')->nullable()->default(false);
            $table->text('thumbnail');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_outdated')->default(false);
            $table->text('mapfile');
            $table->text('original_map_name');
            $table->text('description');
            $table->text('payment_link');
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
