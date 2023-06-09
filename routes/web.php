<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::controller(ProductController::class)->prefix('product')->group(function(){

// });

Route::prefix('product')->group(function () {
    Route::get('list',[ProductController::class,'index'])->name('api.product.list');
});
