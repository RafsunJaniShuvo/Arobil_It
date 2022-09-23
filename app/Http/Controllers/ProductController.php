<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\InventoryProduct;
Use App\Models\Customer;
Use App\Models\Inventory;
use DB;

class ProductController extends Controller
{
    public function manage()
    {
        $products = InventoryProduct::all();
        $data= Product::all();
        $customer = Customer::all();
        // dd($product);
            return view('home',compact('products','data','customer'));
            // print_r($product->rate);
    }

    public function product()
    {
        $data= Product::all();
        // echo $data;
        $products = InventoryProduct::all();
        $customer = Customer::all();
        return view('home',compact('data','products','customer'));
    }
    public function amountSave(Request $request)
    {
         $data = Inventory::all();

        // dd($data);
         $data->totalbillamount = $request->totalbillamount;
         $data->totaldiscount = $request->discountTotal;
          $data->dueamount = $request->dueAmount;
         $data->paidamount = $request->paidAmount;
        
         echo  $data->totalbillamount."<br>".$data->totaldiscount."<br>".$data->dueamount."<br>". $data->paidamount;
        //   $data->save();
        // return redirect('/product')->with('success','Data saved successfully');
        // echo $data->totalbillamount;
        // echo  $data->totalbillamount ;
       
    }
    public function bill(Request $request)
    {
        $data = DB::select("SELECT * FROM `inventories` WHERE billNo = $request->bill");
        //  print_r($data);
         return view('bill',compact('data'));
        
    }
}
