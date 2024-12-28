
<div class="modal-header pt-2 pb-2 bg-secondary text-white">
    <h5 class="modal-title">{{ $title }} - Form</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
{{--<form action="#">--}}
@if(!empty($record))
    {{ html()->modelForm($record, 'PUT')->class('ajax_submit')->route($route . 'update', $record->id)->open() }}
@else
    {{ html()->form('POST')->class('ajax_submit')->route($route . 'store')->open() }}
@endif



{{--ajax_submit--}}
    <div class="modal-body">
        <div id="validation-errors" class="message-section"></div>
        {{--<div class="mb-2">--}}
        {{--{{ html()->label('Name')->class('form-label') }}--}}
        {{--{{ html()->text('name')->class(['form-control'])->placeholder('Enter name') }}--}}
        {{--</div>--}}
        @component('admin.component.text', [
            'name' => 'name',
            'title' => 'Name',
            'value' => null,
            'required' => true,
        ])@endcomponent

        @component('admin.component.select', [
            'name' => 'status',
            'title' => 'Status',
            'value' => null,
            'required' => true,
            'options' => ['Active' => 'Active','Inactive' => 'Inactive'],
        ])@endcomponent

    </div>

    <div class="modal-footer bg-light pt-1 pb-1">
        <button type="button" class="btn btn-link border-info" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes <i class="ph-paper-plane-tilt ms-2"></i></button>
    </div>
{{ html()->form()->close() }}