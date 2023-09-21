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
        Schema::create('free_maps', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('slug');
            $table->bigInteger('map_size');
            $table->boolean('is_active')->default(true);
            $table->text('thumbnail');
            $table->text('mapfile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_maps');
    }
};
