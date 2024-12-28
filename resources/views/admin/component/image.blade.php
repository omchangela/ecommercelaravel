<div class="mb-2">
    {{ html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label') }}
    {{ html()->file($name)->class(['form-control']) }}

    @if(!empty($image_url))
    <div class="mt-2">
        <img src="{{ $image_url }}" width="150">
    </div>
    @endif
</div>
