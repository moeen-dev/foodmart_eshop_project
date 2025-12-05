@extends('backend.dashboard')
@section('title', 'Create Product')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/modules/dropify/css/dropify.css') }}">
@endpush

<section class="section">
    <div class="section-header">
        <h1>Category Create</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Category Create</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category Create From</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Product Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_name" id="product_name"
                                        required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Product Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_slug" id="product_slug"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_img">Product Image <span class="text-danger">*</span></label>
                                <input type="file" class="dropify" name="product_img" id="product_img"
                                    data-allowed-file-extensions="png jpeg jpg webp" required>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="product_status">Product Status <span class="text-danger">*</span></label>
                                    <select name="product_status" id="product_status" class="form-control">
                                        <option value="" selected disabled>--- Please Select an Option ---</option>
                                        <option value="1"> In Stock </option>
                                        <option value="0"> Out of Stock </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="product_stock">Product Stock <span class="text-danger">*</span></label>
                                    <input type="number" name="product_stock" id="product_stock" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="product_price">Product Price <span class="text-danger">*</span></label>
                                    <input type="number" name="product_price" id="product_price" class="form-control">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-info mr-2" onclick="window.history.back()">Go Back
                                    to Index</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('assets/backend/modules/dropify/js/dropify.js') }}"></script>
<script>
    // Dropify
        $('.dropify').dropify();

        // Text for slug
        $('#category_name').keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $('#category_slug').val(Text);
        });
</script>
@endpush
@endsection