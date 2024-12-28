@extends('admin.layout.app')

@section('body')

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">{{ $title }} - {{ !empty($record) ? "Edit" : "Create" }}</h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        @if(!empty($record))
        {{ html()->modelForm($record, 'PUT')->route($route . 'update', $record->id)->acceptsFiles()->open() }}
        @else
        {{ html()->form('POST')->route($route . 'store')->acceptsFiles()->open() }}
        @endif
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Form details</h6>
            </div>
            <div class="card-body">
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

                <!-- Name Field -->
                @component('admin.component.text', [
                'name' => 'name',
                'title' => 'Name',
                'value' => $record->name ?? null,
                'required' => true,
                ])@endcomponent

                <!-- Single Image Field -->
                @component('admin.component.image', [
                'name' => 'image',
                'title' => 'Select Image',
                'value' => $record->image ?? null,
                'required' => true,
                'image_url' => $record['image_url'] ?? null,
                ])@endcomponent

                <!-- Multiple Images Field -->
                <div class="mb-2">
                    <label for="multiple_images" class="form-label">
                        More Product Images<span class="text-danger"> *</span>
                    </label>
                    <input type="file" name="multiple_images[]" id="multiple_images" class="form-control" accept="image/*" multiple>
                    @if(!empty($record->multiple_images))
                        <div class="mt-3">
                            <h6>Existing Images:</h6>
                            <div class="d-flex flex-wrap">
                                @foreach ($record->multiple_images as $image)
                                    <div class="me-2">
                                        <img src="{{ $image['url'] }}" alt="Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                        <div class="mt-1 text-center">
                                            <button type="button" class="btn btn-sm btn-danger">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Status Field -->
                @component('admin.component.select', [
                'name' => 'status',
                'title' => 'Status',
                'value' => $record->status ?? null,
                'required' => true,
                'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'],
                ])@endcomponent

                <!-- Category Field -->
                <div class="mb-2">
                    <label for="category_id" class="form-label">
                        Category ID<span class="text-danger"> *</span>
                    </label>
                    <select name="category_id" class="form-select">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($record) && $record->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Description Field -->
                <div class="mb-2">
                    <label for="description" class="form-label">
                        Description<span class="text-danger"> *</span>
                    </label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter product description" required>{{ $record->description ?? '' }}</textarea>
                </div>

                <!-- Price and Unit Fields -->
                <div class="mb-2">
                    <label class="form-label">Price<span class="text-danger"> *</span></label>
                    <div id="price-container">
                        @foreach ($record->prices ?? [] as $priceEntry)
                        <div class="d-flex mb-2 price-entry">
                            <input type="number" step="0.01" name="price[]" class="form-control" value="{{ $priceEntry->price }}" placeholder="Enter price" required>
                            <input type="text" name="unit[]" class="form-control ms-2" value="{{ $priceEntry->unit }}" placeholder="Enter unit (e.g., ml, gram)" required>
                            @if(!$loop->first)
                            <button type="button" class="btn btn-danger ms-2 remove-price-btn"><i class="ph-trash"></i></button>
                            @endif
                        </div>
                        @endforeach
                        @if(empty($record->prices))
                        <div class="d-flex mb-2 price-entry">
                            <input type="number" step="0.01" name="price[]" class="form-control" placeholder="Enter price" required>
                            <input type="text" name="unit[]" class="form-control ms-2" placeholder="Enter unit (e.g., ml, gram)" required>
                            <button type="button" class="btn btn-success ms-2 add-price-btn"><i class="ph-plus"></i></button>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Rate Field -->
                <div class="mb-2">
                    <label for="rate" class="form-label">
                        Product Rating<span class="text-danger"> *</span>
                    </label>
                    <input type="number" step="0.01" name="rate" value="{{ $record->rate ?? '' }}" class="form-control" required>
                </div>

                <!-- Review Count Field -->
                <div class="mb-2">
                    <label for="review_count" class="form-label">
                        Review Count<span class="text-danger"> *</span>
                    </label>
                    <input type="number" name="review_count" value="{{ $record->review_count ?? '' }}" class="form-control" required>
                </div>

            </div>
            <div class="card-footer p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route($route . 'index') }}" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
</div>

<script>
    document.querySelector("#price-container").addEventListener("click", function(e) {
        if (e.target && e.target.classList.contains("add-price-btn")) {
            const newPriceEntry = document.createElement("div");
            newPriceEntry.classList.add("d-flex", "mb-2", "price-entry");
            newPriceEntry.innerHTML = `
                <input type="number" step="0.01" name="price[]" class="form-control" placeholder="Enter price" required>
                <input type="text" name="unit[]" class="form-control ms-2" placeholder="Enter unit (e.g., ml, gram)" required>
                <button type="button" class="btn btn-danger ms-2 remove-price-btn"><i class="ph-trash"></i></button>
            `;
            document.getElementById("price-container").appendChild(newPriceEntry);
        }
        if (e.target && e.target.classList.contains("remove-price-btn")) {
            e.target.closest(".price-entry").remove();
        }
    });
</script>

@endsection
