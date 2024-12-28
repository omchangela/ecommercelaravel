<div class="mb-2">
    {{ html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label') }}
    {{ html()->select($name,$options)->class(['form-select'] + $options)->placeholder('Select '.$name) }}
</div>
