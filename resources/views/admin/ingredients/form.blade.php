@extends('admin.layout.app')

@section('body')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ isset($ingredient) ? 'Edit' : 'Add' }} Ingredient</h5>
        </div>
    </div>
</div>

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <form action="{{ isset($ingredient) ? route('admin.ingredients.update', $ingredient->id) : route('admin.ingredients.store') }}" method="POST">
            @csrf
            @if(isset($ingredient))
                @method('PUT') <!-- Indicate the method for updating -->
            @endif

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">{{ isset($ingredient) ? 'Edit' : 'Add' }} Ingredient Details</h6>
                </div>
                <div class="card-body">

                    <!-- Validation errors -->
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
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id', isset($ingredient) ? $ingredient->product_id : '') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Key-Value Pairs -->
                    <div id="keyValueFields">
                        @if(isset($ingredient) && $ingredient->keys->count() > 0)
                            @foreach($ingredient->keys as $index => $key)
                                <div class="mb-3 key-value-pair">
                                    <label for="key" class="form-label">Key</label>
                                    <input type="text" name="key[]" class="form-control @error('key.*') is-invalid @enderror" value="{{ old('key.'.$index, $key->key) }}" required>
                                    <label for="value" class="form-label">Value</label>
                                    <input type="text" name="value[]" class="form-control @error('value.*') is-invalid @enderror" value="{{ old('value.'.$index, $key->value) }}" required>
                                    <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div class="mb-3 key-value-pair">
                                <label for="key" class="form-label">Key</label>
                                <input type="text" name="key[]" class="form-control" value="{{ old('key.0') }}" required>
                                <label for="value" class="form-label">Value</label>
                                <input type="text" name="value[]" class="form-control" value="{{ old('value.0') }}" required>
                                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                            </div>
                        @endif
                    </div>

                    <!-- Add More Key-Value Button -->
                    <button type="button" class="btn btn-primary" id="addMoreKeyValue">Add More Key-Value Pair</button>

                </div>

                <!-- Action buttons -->
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">{{ isset($ingredient) ? 'Update Ingredient' : 'Add Ingredient' }}</button>
                        <a href="{{ route('admin.ingredients.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Script to handle dynamic key-value pairs -->
<script>
    document.getElementById('addMoreKeyValue').addEventListener('click', function () {
        const keyValueFields = document.getElementById('keyValueFields');
        const newField = document.createElement('div');
        newField.classList.add('mb-3', 'key-value-pair');
        newField.innerHTML = `
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key[]" class="form-control" required>
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value[]"  class="form-control"  required>
            <button type="button" class="btn btn-danger btn-sm  remove-key-value">Remove</button>
        `;
        keyValueFields.appendChild(newField);
    });

    document.getElementById('keyValueFields').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-key-value')) {
            e.target.closest('.key-value-pair').remove();
        }
    });
</script>

@endsection
