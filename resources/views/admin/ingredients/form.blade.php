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
                @method('PUT')
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
                        <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id', $ingredient->product_id ?? '') == $product->id ? 'selected' : '' }}>
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
                        <div class="row mb-3 key-value-pair">
                            <div class="col-md-5">
                                <label for="key_0" class="form-label">Key</label>
                                <input type="text" name="key[]" id="key_0" class="form-control @error('key.0') is-invalid @enderror" value="{{ old('key.0', $ingredient->key ?? '') }}" required>
                            </div>
                            <div class="col-md-5">
                                <label for="value_0" class="form-label">Value</label>
                                <input type="text" name="value[]" id="value_0" class="form-control @error('value.0') is-invalid @enderror" value="{{ old('value.0', $ingredient->value ?? '') }}" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                            </div>
                        </div>
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
        const index = keyValueFields.children.length;
        const newField = document.createElement('div');
        newField.classList.add('row', 'mb-3', 'key-value-pair');
        newField.innerHTML = `
            <div class="col-md-5">
                <label for="key_${index}" class="form-label">Key</label>
                <input type="text" name="key[]" id="key_${index}" class="form-control" required>
            </div>
            <div class="col-md-5">
                <label for="value_${index}" class="form-label">Value</label>
                <input type="text" name="value[]" id="value_${index}" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
            </div>
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
