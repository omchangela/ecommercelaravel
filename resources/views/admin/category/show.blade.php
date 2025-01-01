@extends('admin.layout.app')

@section('body')


<div class="modal-header pt-2 pb-2 bg-secondary text-white">
    <h5 class="modal-title">{{ $title }} - Details</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body p-1">
    <table class="table  table-hover ">
        <tbody>
        <tr>
            <th width="150">ID</th>
            <th width="10" class="text-right pl-0 pr-0">:</th>
            <td>{{ $record['id'] }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <th class="text-right pl-0 pr-0">:</th>
            <td>{{ $record['name'] }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <th width="10" class="text-right pl-0 pr-0">:</th>
            <td>{{ $record['status'] }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <th class="text-right pl-0 pr-0">:</th>
            <td>{{ $record['created_at']->format(config('setting.DATETIME_FORMAT')) }}</td>
        </tr>

        </tbody>
    </table>

</div>

<div class="modal-footer bg-light pt-1 pb-1">
    <button type="button" class="btn btn-link border-info" data-bs-dismiss="modal">Close</button>
    {{--<button type="submit" class="btn btn-primary">Save changes <i class="ph-paper-plane-tilt ms-2"></i></button>--}}
</div>

@endsection
