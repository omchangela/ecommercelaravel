<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::select('id', 'order_number', 'shipping_name', 'total_amount', 'status', 'created_at');

            return DataTables::of($orders)
                ->editColumn('total_amount', function ($order) {
                    return '₹' . number_format($order->total_amount, 2);
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('d M, Y H:i');
                })
                ->addColumn('action', function ($order) {
                    return '<a href="' . route('admin.orders.show', $order->id) . '" class="btn btn-info btn-sm">View</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.order.index');
    }


    public function show($id)
    {
        $order = Order::with(['payment', 'products'])->find($id);

        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found.');
        }

        return view('admin.order.show', compact('order'));
    }


    // public function destroy($id)
    // {
    //     $order = Order::find($id);

    //     if (!$order) {
    //         return response()->json(['message' => 'Order not found.'], 404);
    //     }

    //     try {
    //         $order->delete();
    //         return response()->json(['message' => 'Order deleted successfully.'], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Failed to delete the order.'], 500);
    //     }
    // }

}
