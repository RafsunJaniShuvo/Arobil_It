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

    public function home()
    {
        $products = InventoryProduct::all();
        $data= Product::all();
        $customer = Customer::all();
     
        return view('home',compact('products','data','customer'));
           
    }

   // product page
    public function product()
    {
        $data= Product::all();
        $products = InventoryProduct::all();
        $customer = Customer::all();
        return view('home',compact('data','products','customer'));
    }


    //amount save into inventory
    public function amountSave(Request $request)
    {
         $data = new Inventory;
        $heightBill = Inventory::max('billNo');
        $billNo = 0;
        if($heightBill) {
            $billNo = $heightBill + 1;
        } else {
            $billNo = 1;
        }

        $data->customer_id = $request->customer_id;
         $data->totalbillamount = $request->totalbillamount;
         $data->date = $request->date;
         $data->customer_id = $request->customer_id;
         $data->billNo = $billNo;
         $data->totaldiscount = $request->discountTotal;
          $data->dueamount = $request->dueAmount;
         $data->paidamount = $request->paidAmount;
        
       
        $data->save();
        return redirect('/product')->with('success','Data saved successfully');

       
    }
    public function bill(Request $request)
    {
        $data = DB::select("SELECT * FROM `inventories` WHERE billNo = $request->bill");
         // print_r($data);
         return view('bill',compact('data'));
        
    }


    // get data by ajax 
    public function getDataByAjax(Request $request) {
        $productId = $request->id;

        $product = Product::find($productId);
        $invPro = InventoryProduct::where(['inventrory_id' => $product->id])->first();
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'rate' => $invPro->Rate,
            'qty' => $invPro->qty,
            'disc' => $invPro->discount,
        ];

        return response()->json($data);
    }

    //edit bill
    public function edit($id)
    {
       // echo $id;
         $billupdate = Inventory::find($id);
       //dd($billupdate->toArray());
         return view('billEdit',compact('billupdate'));
    }

    //update with bill
    public function update(Request $request,$id )
    {
        $data = Inventory::find($id);
        $data->totaldiscount = $request->total_dis;
        $data->totalbillamount = $request->total_amount;
        $data->paidamount = $request->paid_amount;
        $data->dueamount = $request->due_amount;
        $data->update();
        
         return redirect('/')->with('success','Data Updated successfully');
     
    }

} 
