<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $payments = Payment::select('id', 'order_id', 'payment_id', 'payment_gateway', 'amount', 'status', 'created_at');

        return DataTables::of($payments)
            ->editColumn('amount', function ($payment) {
                return '₹' . number_format($payment->amount, 2);
            })
            ->make(true);
    }

    return view('admin.payment.index');
}


    public function show($id)
    {
        $payment = Payment::with('order')->find($id);

        if (!$payment) {
            return redirect()->route('admin.payment.index')->with('error', 'Payment not found.');
        }

        return view('admin.payment.show', compact('payment'));
    }
}
