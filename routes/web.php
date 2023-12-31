<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PrefabController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SiteMapGenerator;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GelleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FreeMapController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get("f-a-q", [FAQController::class, 'index'])->name('f.a.q');

Route::get("map/{product:slug}", [ProductController::class, 'show'])->name('map.show');
Route::get("maps", [ProductController::class, 'fetch'])->name('maps.fetch');
Route::post("map/search", [ProductController::class, 'search'])->name('map.search');


Route::get("maps/free", [FreeMapController::class, 'show'])->name('maps.free');
Route::post("maps/download/{slug}", [FreeMapController::class, 'download'])->name('freemap.download')->middleware(['throttle:1,60']);
Route::get("map/free/search", [FreeMapController::class, 'search'])->name('free.map.search');

Route::get("contact", [ContactController::class, 'index'])->name('contact');
Route::post("contact", [ContactController::class, 'store']);

Route::get("blogs", [BlogController::class, 'index'])->name('blogs');
Route::get("blog/{blog:slug}", [BlogController::class, 'read'])->name('blog.read');
Route::post("blog/search/", [BlogController::class, 'search'])->name('blog.search');

Route::get("report", [ReportController::class, 'index'])->name('report');

Route::get("terms-of-service", [TermsController::class, 'index'])->name('terms');
Route::get("privacy-policy", [TermsController::class, 'policy'])->name('policy');

Route::get('/cancel/{order:checkout_id}', [OrderController::class, 'cancelOrder']);
Route::get('/success/{order:checkout_id}', [OrderController::class, 'successOrder']);

Route::get("/prefabs", [PrefabController::class, 'index'])->name('prefabs');

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('gellery', [GelleryController::class, 'index'])->name('gellery');
    Route::post('gellery', [GelleryController::class, 'store']);
    
    Route::get('products', [ProductController::class, 'index'])->name('product.dashboard');
    Route::get('create-products', [ProductController::class, 'create'])->name('product.create');
    Route::post('products', [ProductController::class, 'store'])->name('create.product');

    Route::get('free-maps/listing', [FreeMapController::class, 'index'])->name('free.map.list');
    Route::get('create-free-map', [FreeMapController::class, 'create'])->name('free.map.create');
    Route::post('free-map/create', [FreeMapController::class, 'store'])->name('create.free.map');
    Route::get('update-free-map/{slug}', [FreeMapController::class, 'update_page'])->name('free.map.update');
    Route::post('update-free-map/{slug}', [FreeMapController::class, 'update'])->name('update.free.map');

    Route::get('update-product/{slug}', [ProductController::class, 'update_page'])->name('product.update');
    Route::post('update-product/{slug}', [ProductController::class, 'update'])->name('update.product');

    Route::get('orders', [OrderController::class, 'orders'])->name('orders');

    Route::get('/create-blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/create-blog', [BlogController::class, 'store']);

    Route::get('/blogs/show', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/blog/update/{blog:slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::patch('/blog/update/{blog:slug}', [BlogController::class, 'update_blog'])->name('update.blog');

    Route::post('/image_upload', [BlogController::class, 'upload'])->name('upload');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post("report", [ReportController::class, 'store']);
    Route::post("order/{product:slug}", [OrderController::class, 'store'])->name('order');
    Route::get("client", [ClientController::class, 'index'])->name('client');
    Route::post("client/{order:map_slug}", [ClientController::class, 'download'])->name('client.download');
    Route::get("client/search", [ClientController::class, 'search'])->name('client.filter');
});

Route::get('/sitemap.xml', [SiteMapGenerator::class, 'index'])->name('sitemap');

require __DIR__.'/auth.php';