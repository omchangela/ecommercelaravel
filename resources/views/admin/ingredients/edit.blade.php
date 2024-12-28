@extends('admin.layout.app')

@section('body')
<div class="container">
    <h1>Edit Ingredient</h1>

    <form action="{{ route('admin.ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $ingredient->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="keyValueFields">
            @foreach ($ingredient->ingredients as $key => $ingredientValue)
                <div class="mb-3 key-value-pair">
                    <label for="key" class="form-label">Key</label>
                    <input type="text" name="key[]" class="form-control @error('key.*') is-invalid @enderror" value="{{ old('key.' . $key, $ingredientValue->key) }}" required>
                    <label for="value" class="form-label">Value</label>
                    <input type="text" name="value[]" class="form-control @error('value.*') is-invalid @enderror" value="{{ old('value.' . $key, $ingredientValue->value) }}" required>
                    <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary" id="addMoreKeyValue">Add More Key-Value Pair</button>
        <button type="submit" class="btn btn-primary">Update Ingredient</button>
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
