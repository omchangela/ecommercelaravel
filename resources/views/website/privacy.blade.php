@extends('website.layouts.app') <!-- Adjust path to your layout -->

@section('body')
<br><br><br><br>
<div class="container mt-5">
    <h2 class="text-center mb-4">Privacy & Policy</h2>
    
    @if($privacy->isNotEmpty())
        <div class="privacy-content">
            @foreach($privacy->reverse()->take(1) as $privacy)
                <div class="term-item mb-4">
                    <!-- Render CKEditor content -->
                    <div class="ck-editor-content">
                        {!! $privacy->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-warning">No terms and conditions found.</p>
    @endif
</div>
@endsection
