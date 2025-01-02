@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Product Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.product_banners.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW BANNER
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <table class="table table-sm table-striped table-bordered mt-3">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image_path) }}" width="100" /></td>
                    <td class="text-center">
                        <a href="{{ route('admin.product_banners.edit', $banner->id) }}" class="btn btn-warning btn-sm"> Edit</a>
                        <form action="{{ route('admin.product_banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No banners found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $banners->links('vendor.pagination.bootstrap-4') }}
            
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
