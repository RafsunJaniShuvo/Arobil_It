<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ProductController::class,'manage'])->name('manage');
Route::get('/product',[ProductController::class,'product'])->name('product');

//AmountSave
Route::post('/amount/save',[ProductController::class,'amountSave'])->name('amountSave');

// billNo
Route::post('/billNO',[ProductController::class,'bill'])->name('bill');

Route::post('/get-products-by-ajax/{id}',[ProductController::class,'getDataByAjax'])->name('getDataByAjax');


