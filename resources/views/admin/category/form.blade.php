<div class="modal-header pt-2 pb-2 bg-secondary text-white">
    <h5 class="modal-title">{{ $title }} - Form</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>

@if(!empty($record))
    {{ html()->modelForm($record, 'PUT')->class('ajax_submit')->attribute('enctype', 'multipart/form-data')->route($route . 'update', $record->id)->open() }}
@else
    {{ html()->form('POST')->class('ajax_submit')->attribute('enctype', 'multipart/form-data')->route($route . 'store')->open() }}
@endif

<div class="modal-body">
    <div id="validation-errors" class="message-section"></div>

    {{-- Name Field --}}
    @component('admin.component.text', [
        'name' => 'name',
        'title' => 'Name',
        'value' => null,
        'required' => true,
    ])@endcomponent

    {{-- Status Field --}}
    @component('admin.component.select', [
        'name' => 'status',
        'title' => 'Status',
        'value' => null,
        'required' => true,
        'options' => ['Active' => 'Active','Inactive' => 'Inactive'],
    ])@endcomponent

    {{-- Image Field --}}
    <div class="mb-2">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image" accept="image/*">
    </div>

    @if(isset($record) && !empty($record->image))
    <img src="{{ asset('storage/' . $record->image) }}" alt="{{ $record->name}}" class="img-thumbnail" width="150" height="150">
@else
    <span></span>
@endif


</div>

<div class="modal-footer bg-light pt-1 pb-1">
    <button type="button" class="btn btn-link border-info" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes <i class="ph-paper-plane-tilt ms-2"></i></button>
</div>

{{ html()->form()->close() }}
