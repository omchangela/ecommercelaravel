@extends('admin.layout.app')

@section('body')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Order Product Details</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <h6>Order ID: {{ $orderProduct->order_id }}</h6>
            <h6>Product ID: {{ $orderProduct->product_id }}</h6>
            <h6>Quantity: {{ $orderProduct->quantity }}</h6>
            <h6>Price: ₹{{ number_format($orderProduct->price, 2) }}</h6>
        </div>
    </div>
</div>
@endsection
