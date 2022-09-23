<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\InventoryProduct;

class ProductController extends Controller
{
    public function manage()
    {
        $products = InventoryProduct::all();
        // dd($product);
            return view('welcome',compact('products'));
            // print_r($product->rate);
    }
}
