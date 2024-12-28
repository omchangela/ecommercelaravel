<div  class="row">
    <div class="col-md-8">
        {{ html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label') }}
        {{ html()->file($name)->class(['form-control']) }}
    </div>
    <div class="col-md-4">
        @if(!empty($image_url))
            <div class="mt-2">
                <img src="{{ $image_url }}" width="100%" >
            </div>
        @endif
    </div>
</div>
{{--<div class="mb-2">--}}
    {{----}}
    {{----}}
{{--</div>--}}
