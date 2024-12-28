@extends('admin.layout.app')

@section('body')
<div class="container">
    <h1>Add Ingredient</h1>

    <form action="{{ route('admin.ingredients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
                <option value="">Select Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="keyValueFields">
            <div class="mb-3 key-value-pair">
                <label for="key" class="form-label">Key</label>
                <input type="text" name="key[]" id="key" class="form-control @error('key.*') is-invalid @enderror" value="{{ old('key.0') }}" required>
                <label for="value" class="form-label">Value</label>
                <input type="text" name="value[]" id="value" class="form-control @error('value.*') is-invalid @enderror" value="{{ old('value.0') }}" required>
                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
            </div>
        </div>

        <button type="button" class="btn btn-primary" id="addMoreKeyValue">Add More Key-Value Pair</button>
        <button type="submit" class="btn btn-primary">Add Ingredient</button>
        <a href="{{ route('admin.ingredients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    document.getElementById('addMoreKeyValue').addEventListener('click', function () {
        const keyValueFields = document.getElementById('keyValueFields');
        const newField = document.createElement('div');
        newField.classList.add('mb-3', 'key-value-pair');
        newField.innerHTML = `
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key[]" class="form-control" required>
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value[]" class="form-control" required>
            <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
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
