<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Frontend Controllers
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;

// Admin Controllers
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/products/{id}', [FrontendController::class, 'productDetail'])->name('frontend.product_detail');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('frontend.contact.submit');

// Frontend Blog Routes
Route::get('/blogs', [FrontendBlogController::class, 'index'])->name('frontend.blogs.index');
Route::get('/blogs/{slug}', [FrontendBlogController::class, 'show'])->name('frontend.blogs.show');

Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('frontend.blog_detail');

// Frontend Services Routes
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services.index');
Route::get('/services/{slug}', [FrontendController::class, 'serviceDetail'])->name('frontend.services.show');

Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/services/{slug}', [FrontendController::class, 'serviceDetail'])->name('frontend.services.show');

Route::get('/invest', [FrontendController::class, 'invest'])->name('frontend.invest');





/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('site_contents', SiteContentController::class);

    Route::resource('blogs', AdminBlogController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('services', ServiceController::class);

});

/*
|--------------------------------------------------------------------------
| Profile / Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
