@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ isset($image) ? 'Edit' : 'Add' }} Instagram Image</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.instagram.index') }}" class="btn btn-secondary text-bold">
                <i class="icon-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-body">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form for adding/updating the image -->
            <form action="{{ isset($image) ? route('admin.instagram.update', $image->id) : route('admin.instagram.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($image))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="image" class="form-label">Instagram Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" {{ isset($image) ? '' : 'required' }}>

                    @if(isset($image))
                        <div class="mt-3">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Current Image" width="150">
                        </div>
                    @endif
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary text-bold">
                        {{ isset($image) ? 'Update Image' : 'Add Image' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
