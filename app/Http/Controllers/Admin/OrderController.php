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
        $orders = Order::select('id', 'order_number', 'shipping_name', 'total_amount', 'status', 'delivery_status', 'created_at');

        return DataTables::of($orders)
            ->editColumn('total_amount', function ($order) {
                return '₹' . number_format($order->total_amount, 2);
            })
            ->addColumn('delivery_status', function ($record) {
                return html()->select('status', ['Pending' => 'Pending', 'Shipped' => 'Shipped', 'Delivered' => 'Delivered'])
                    ->value($record['delivery_status'])
                    ->attributes(['data-id' => $record->id])
                    ->class(['update_field', 'form-select', 'form-select-sm',
                        'text-warning' => ($record['delivery_status'] == "Pending"),
                        'text-primary' => ($record['delivery_status'] == "Shipped"),
                        'text-success' => ($record['delivery_status'] == "Delivered")]);
            })
            ->rawColumns(['action', 'delivery_status'])
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

public function updateDeliveryStatus(Request $request)
{
    // Validate the request data
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'delivery_status' => 'required|in:Pending,Shipped,Delivered',
    ]);

    // Find the order and update the delivery status
    $order = Order::find($request->order_id);
    $order->delivery_status = $request->delivery_status;
    $order->save();

    return response()->json([
        'success' => true,
        'message' => 'Delivery status updated successfully!',
    ]);
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
