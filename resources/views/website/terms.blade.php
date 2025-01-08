@extends('website.layouts.app') <!-- Adjust path to your layout -->

@section('body')
<br><br><br><br>
<div class="container mt-5">
    <h2 class="text-center mb-4">Terms and Conditions</h2>
    
    @if($terms->isNotEmpty())
        <div class="terms-content">
            @foreach($terms->reverse()->take(1) as $term)
                <div class="term-item mb-4">
                    <!-- Render CKEditor content -->
                    <div class="ck-editor-content">
                        {!! $term->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-warning">No terms and conditions found.</p>
    @endif
</div>
@endsection
