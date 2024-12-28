@extends('admin.layout.app')

@section('body')
<div class="content">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.howtouses.update', $howToUse->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $howToUse->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description-editor" name="description" class="form-control">{{ $howToUse->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#description-editor',
        plugins: 'image',
        toolbar: 'undo redo | styleselect | bold italic | link image',
        height: 300
    });
</script>
@endsection
