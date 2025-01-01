@extends('admin.layout.app')

@section('body')

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ isset($indepthProductDetail) ? 'Edit' : 'Add' }} In-depth Product Detail</h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <form 
            action="{{ isset($indepthProductDetail) ? route('admin.indepth-product-details.update', $indepthProductDetail->id) : route('admin.indepth-product-details.store') }}" 
            method="POST" 
            enctype="multipart/form-data">
            @csrf
            @if(isset($indepthProductDetail))
                @method('PUT')
            @endif

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Form details</h6>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                    <div id="validation-errors" class="message-section">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <h5><i class="icon fas fa-ban"></i> Validation Error!</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <!-- Product Field -->
                    <div class="form-group mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" id="product_id" class="form-select" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    {{ isset($indepthProductDetail) && $product->id == $indepthProductDetail->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image Field -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if(isset($indepthProductDetail) && $indepthProductDetail->image)
                            <img src="{{ asset('storage/' . $indepthProductDetail->image) }}" alt="Image" class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>
                            {{ isset($indepthProductDetail) ? $indepthProductDetail->description : '' }}
                        </textarea>
                    </div>

                    <!-- Initialize CKEditor -->
                    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#description'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>

                </div>
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.indepth-product-details.index') }}" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($indepthProductDetail) ? 'Update' : 'Add' }} Detail
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
