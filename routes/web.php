<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function (){
   return view('index');
});

Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactUs');

Route::get(' /product/details/{id}/{slug}',[IndexController::class, 'ProductDetails']);

Route::middleware('auth')->group(function(){
    Route::resource('products',ProductController::class);
    Route::get('product/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('product/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');
});


Route::resource('sliders',SliderController::class);
Route::resource('brands',BrandController::class);
Route::resource('categories',CategoryController::class);

//Route::get('/', function () {
//    return view('backend.home');
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

