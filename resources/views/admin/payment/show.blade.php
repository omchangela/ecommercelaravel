@extends('admin.layout.app')

@section('body')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Payment Details</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <h6>Order ID: {{ $payment->order_id }}</h6>
            <h6>Payment Gateway: {{ $payment->payment_gateway }}</h6>
            <h6>Payment ID: {{ $payment->payment_id }}</h6>
            <h6>Amount: ₹{{ number_format($payment->amount, 2) }}</h6>
            <h6>Status: {{ $payment->status }}</h6>
        </div>
    </div>
</div>
@endsection
