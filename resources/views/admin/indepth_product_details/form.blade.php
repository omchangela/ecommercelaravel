@extends('admin.layout.app')

@section('body')

<div class="container">
    <h1 class="my-4">{{ isset($indepthProductDetail) ? 'Edit' : 'Add' }} In-depth Product Detail</h1>

    <form 
        action="{{ isset($indepthProductDetail) ? route('admin.indepth-product-details.update', $indepthProductDetail->id) : route('admin.indepth-product-details.store') }}" 
        method="POST" 
        enctype="multipart/form-data">
        @csrf
        @if(isset($indepthProductDetail))
            @method('PUT')
        @endif

        <div class="form-group mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                        {{ isset($indepthProductDetail) && $product->id == $indepthProductDetail->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if(isset($indepthProductDetail) && $indepthProductDetail->image)
                <img src="{{ asset('storage/' . $indepthProductDetail->image) }}" alt="Image" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">
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

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">
                {{ isset($indepthProductDetail) ? 'Update' : 'Add' }} Detail
            </button>
        </div>
    </form>
</div>

@endsection
