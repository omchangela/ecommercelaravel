@extends('admin.layout.app')

@section('body')
<div class="content">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.howtouses.create') }}" class="btn btn-primary mb-3">Add New Entry</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($howToUses as $entry)
                        <tr>
                            <td>{{ $entry->product->name }}</td>
                            <td>{!! Str::limit($entry->description, 50) !!}</td>
                            <td>
                                <a href="{{ route('admin.howtouses.edit', $entry->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.howtouses.destroy', $entry->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
