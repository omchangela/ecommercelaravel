@extends('admin.layout.app')

@section('body')

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Edit Banner</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <!-- Corrected the route to 'admin.banners.update' -->
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label for="text_input_1" class="form-label">Text Input 1</label>
                    <input type="text" class="form-control" id="text_input_1" name="text_input_1" value="{{ old('text_input_1', $banner->text_input_1) }}" required>
                </div>

                <div class="mb-3">
                    <label for="text_input_2" class="form-label">Text Input 2</label>
                    <input type="text" class="form-control" id="text_input_2" name="text_input_2" value="{{ old('text_input_2', $banner->text_input_2) }}" required>
                </div>

                <div class="mb-3">
                    <label for="text_input_3" class="form-label">Text Input 3</label>
                    <input type="text" class="form-control" id="text_input_3" name="text_input_3" value="{{ old('text_input_3', $banner->text_input_3) }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Banner Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if ($banner->image)
                    <img src="{{ Storage::url($banner->image) }}" alt="Current Banner Image" width="150">
                    @endif
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Update Banner</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
