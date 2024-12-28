@extends('admin.layout.app')

@section('body')
<div class="container">
    <h1>Ingredients</h1>
    <a href="{{ route('admin.ingredients.create') }}" class="btn btn-primary mb-3">Add Ingredient</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td>{{ $ingredient->product->name }}</td>
                    <td>{{ $ingredient->key }}</td>
                    <td>{{ $ingredient->value }}</td>
                    <td>
                        <a href="{{ route('admin.ingredients.edit', $ingredient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.ingredients.destroy', $ingredient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No ingredients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $ingredients->links() }}
</div>
@endsection
