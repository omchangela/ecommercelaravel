@extends('admin.layout.app')

@section('body')

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ $title }} - Details</h5>
        </div>
    </div>
</div>
<!-- /Page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Details</h6>
            </div>
            <div class="card-body p-1">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->category->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>category_id</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->category_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Product Review</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->review_count ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Product Rating</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->rate ?? 'N/A' }}/5</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ $record->status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td>{{ optional($record->created_at)->format(config('setting.DATETIME_FORMAT')) ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route($route . 'index') }}" class="btn btn-light">Back</a>
                </div>
            </div>
        </div>
        
        <!-- Prices Table -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="mb-0">Prices</h6>
            </div>
            <div class="card-body p-1">
                @if($record->prices->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Price</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($record->prices as $index => $price)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $price->price }}</td>
                                    <td>{{ $price->unit }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No prices available for this product.</p>
                @endif
            </div>
        </div>
        <!-- /Prices Table -->
    </div>
</div>
<!-- /content area -->

@endsection
