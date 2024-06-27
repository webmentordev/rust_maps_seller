<?php

use App\Livewire\Home;
use App\Livewire\Contact;
use App\Livewire\Product;
use App\Livewire\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DashboardController;
use App\Livewire\CreateProduct;
use App\Livewire\UpdateProduct;

Route::get('/', Home::class)->name('home');
Route::get('/maps', Products::class)->name('maps');
Route::get('/map/{product:slug}', Product::class)->name('map');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/cancel/{order:checkout_id}', [OrderController::class, 'cancel'])->name('cancel');
Route::get('/success/{order:checkout_id}', [OrderController::class, 'success'])->name('success');

Route::get('/terms-of-service', [TermsController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [TermsController::class, 'policy'])->name('policy');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/download/{order:checkout_id}', [DownloadController::class, 'index'])->name('download');
Route::post('/download/{order:checkout_id}', [DownloadController::class, 'download']);

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::delete('/contact/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/create', CreateProduct::class)->name('product.create');
    Route::get('/product/update/{product:slug}', UpdateProduct::class)->name('product.update');
    Route::patch('/product/status/{product:slug}', [ProductController::class, 'status'])->name('product.status');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::delete('/order/delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
});


require __DIR__.'/auth.php';