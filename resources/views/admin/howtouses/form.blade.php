@extends('admin.layout.app')

@section('body')
<div class="content">
    <div >
        <div class="card-body col-md-8 offset-md-2">
            <form method="POST" 
                  action="{{ isset($howToUse) ? route('admin.howtouses.update', $howToUse->id) : route('admin.howtouses.store') }}">
                @csrf
                @if(isset($howToUse))
                    @method('PUT')  <!-- This indicates an update request -->
                @endif

                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" 
                                {{ isset($howToUse) && $product->id == $howToUse->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description-editor" name="description" class="form-control">
                        {{ isset($howToUse) ? $howToUse->description : '' }}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($howToUse) ? 'Update' : 'Create' }}  <!-- Button text changes based on create/edit -->
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Include CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description-editor'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable'],
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
