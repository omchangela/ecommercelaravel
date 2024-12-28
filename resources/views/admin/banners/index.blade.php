@extends('admin.layout.app')

@section('body')

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Manage Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW BANNER
            </a>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Text Input 1</th>
                    <th>Text Input 2</th>
                    <th>Text Input 3</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->text_input_1 }}</td>
                    <td>{{ $banner->text_input_2 }}</td>
                    <td>{{ $banner->text_input_3 }}</td>
                    <td><img src="{{ Storage::url($banner->image) }}" alt="Banner Image" width="100"></td>
                    <td>{{ $banner->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('admin.banners.show', $banner->id) }}" class="btn btn-info btn-sm" title="View">
                            View
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
