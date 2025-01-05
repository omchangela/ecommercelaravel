<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Product;

class OrderProductsController extends Controller
{
   // OrderProductController.php


   public function index(Request $request)
   {
       if ($request->ajax()) {
           // Eager load the associated product
           $orderProducts = OrderProduct::with('product')->select('id', 'order_id', 'product_id', 'quantity', 'price');
   
           return DataTables::of($orderProducts)
               ->editColumn('price', function ($orderProduct) {
                   return '₹' . number_format($orderProduct->price, 2);
               })
               
            //    ->addColumn('action', function ($orderProduct) {
            //        return '<a href="' . route('admin.orderproducts.show', $orderProduct->id) . '" class="btn btn-info btn-sm">View</a>';
            //    })
            //    ->rawColumns(['action'])
               ->make(true);
       }
   
       return view('admin.orderproducts.index');
   }
   



    public function show($id)
    {
        $orderProduct = OrderProduct::with(['order', 'product'])->find($id);

        if (!$orderProduct) {
            return redirect()->route('admin.orderproducts.index')->with('error', 'Order Product not found.');
        }

        return view('admin.orderproducts.show', compact('orderProduct'));
    }

    
}
