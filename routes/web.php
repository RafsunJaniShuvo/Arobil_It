<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


//homepage
Route::get('/',[ProductController::class,'home'])->name('home');

//productpage
Route::get('/product',[ProductController::class,'product'])->name('product');

//AmountSave
Route::post('/amount/save',[ProductController::class,'amountSave'])->name('amountSave');

//billNo
Route::post('/billNO',[ProductController::class,'bill'])->name('bill');

//Get product by jquery ajax
Route::post('/get-products-by-ajax/{id}',[ProductController::class,'getDataByAjax'])->name('getDataByAjax');

// bilEditRoute
 Route::get('/editbill/{id}',[ProductController::class,'edit'])->name('eidtbill');

//billUpdateRoute
 Route::post('/updatebill/{id}',[ProductController::class,'update'])->name('bilupdate');
