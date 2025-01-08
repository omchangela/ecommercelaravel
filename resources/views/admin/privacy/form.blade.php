@extends('admin.layout.app')

@section('body')

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ isset($privacy) ? 'Edit' : 'Create' }} privacy & Conditions</h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <form 
            action="{{ isset($privacy) ? route('admin.privacy.update', $privacy->id) : route('admin.privacy.store') }}" 
            method="POST" 
            enctype="multipart/form-data">
            @csrf
            @if (isset($privacy))
                @method('PUT')
            @endif

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Form Details</h6>
                </div>
                <div class="card-body">

                    <!-- Success Message -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    @endif

                    <!-- Validation Errors -->
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

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>
                            {{ old('description', $privacy->description ?? '') }}
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
                        <a href="{{ route('admin.privacy.index') }}" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($privacy) ? 'Update' : 'Create' }} privacy & Conditions
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
