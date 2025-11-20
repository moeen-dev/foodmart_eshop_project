@extends('backend.dashboard')
@section('title', 'Category List')
@section('content')
@push('styles')
<!-- DataTables CSS (Bootstrap 4) -->
<link rel="stylesheet"
    href="{{ asset('assets/backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
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
                        <h4>Category List</h4>
                    </div>
                    <div class="card-body">
                        <div class="section-title mt-0">
                            <a href="{{ route('product-category.create') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                        <table class="table table-border table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Image</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1}}</th>
                                    <td>
                                        <img src="{{ asset('upload/images/' . $category->category_img) }}"
                                            alt="{{ $category->category_name }}">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug}}</td>
                                    <td class="d-flex justify-content-center gap-3">

                                        <a href="{{ route('product-category.edit', $category->id ) }}" class="btn btn-primary mr-2" data-toogle="tooltip"
                                            title="Edit Category">Edit</a>
                                            
                                        {{-- Delete Form --}}
                                        <form id="delete-category-{{ $category->id }}"
                                            action="{{ route('product-category.destroy', $category->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        {{-- Delete Button --}}
                                        <button class="btn btn-danger trigger--fire-modal-7"
                                            data-confirm="Delete Category?|Are you sure you want to delete this category?"
                                            data-confirm-yes="document.getElementById('delete-category-{{ $category->id }}').submit();">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center text-danger">
                                        <p class="text-danger">No Data Found!</p>
                                        <a href="{{ route('product-category.create') }}" class="btn btn-primary">Create
                                            a new
                                            one</a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('assets/backend/modules/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('assets/backend/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "ordering": true,
            "searching": true,
            "lengthChange": true,
            "info": true
        });
    });
</script>
@endpush