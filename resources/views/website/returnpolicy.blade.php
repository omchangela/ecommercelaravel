@extends('website.layouts.app')

@section('body')
<br><br><br><br>
<div class="container mt-5">
    <h2 class="text-center mb-4">Return Policy</h2>
    
    @if($returnpolicy->isNotEmpty())
        <div class="returnpolicy-content">
            @foreach($returnpolicy->reverse()->take(1) as $policy)
                <div class="term-item mb-4">
                    <!-- Render CKEditor content -->
                    <div class="ck-editor-content">
                        {!! $policy->description !!} <!-- Corrected to use $policy -->
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-warning">No terms and conditions found.</p>
    @endif
</div>
@endsection
