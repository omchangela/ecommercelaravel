<div class="mb-2">
    {{ html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label') }}
    {{ html()->file($name)->class(['form-control']) }}
</div>
