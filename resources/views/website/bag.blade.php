@extends('website.layouts.app') <!-- Adjust path to your layout -->

@section('body')
    <h1>Your Bag</h1>

    @if($bagItems->isEmpty())
        <p>Your bag is empty.</p>
    @else
        <ul>
            @foreach ($bagItems as $item)
                <li>
                    <strong>{{ $item['product']->name ?? 'Unknown Product' }}</strong> - 
                    {{ $item['price']->unit ?? 'Unknown Unit' }} for ₹{{ $item['price']->price ?? '0.00' }}
                </li>
            @endforeach
        </ul>
    @endif
    
@endsection
