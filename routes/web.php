<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GelleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get("/map/{product:slug}", [ProductController::class, 'show'])->name('map.show');
Route::get("/maps", [ProductController::class, 'fetch'])->name('maps.fetch');
Route::post("/map/search", [ProductController::class, 'search'])->name('map.search');

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/gellery', [GelleryController::class, 'index'])->name('gellery');
    Route::post('/gellery', [GelleryController::class, 'store']);

    Route::get('/products', [ProductController::class, 'index'])->name('product.dashboard');
    Route::get('/create-products', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('create.product');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('order', [OrderController::class, 'store'])->name('order');
});

require __DIR__.'/auth.php';