@extends('website.layouts.app')
@section('body')
<br><br><br><br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('status') == 'success')
                    <div class="alert alert-success mt-5">
                        <h4>Payment Successful!</h4>
                        <p>Your payment has been processed successfully.</p>
                        <p><strong>Order ID:</strong> {{ session('order_id') }}</p>
                    </div>
                @elseif(session('status') == 'failure')
                    <div class="alert alert-danger mt-5">
                        <h4>Payment Failed!</h4>
                        <p>Sorry, there was an issue with your payment. Please try again.</p>
                    </div>
                @else
                    <div class="alert alert-warning mt-5">
                        <h4>Payment Status Unknown</h4>
                        <p>We couldn't determine the status of your payment. Please try again later.</p>
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{ route('checkout.show') }}" class="btn btn-primary mt-3">Go Back to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @endsection