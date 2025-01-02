@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Instagram Showcase</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.instagram.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW IMAGE
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ asset('storage/' . $image->image) }}" alt="Instagram Image" width="100"></td>
                    <td>{{ $image->created_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.instagram.edit', $image->id) }}" class="btn btn-warning btn-sm"> Edit</a>
                        <form action="{{ route('admin.instagram.destroy', $image->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')"> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No images found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $images->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
