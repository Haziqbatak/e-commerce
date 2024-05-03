@extends('layouts.parent')

@section('title', 'Category')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Product</li>
                </ol>
            </nav>

            {{-- button modal create category --}}
            <!-- Basic Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalCategory">
                <i class="bi bi-plus"></i>
                Add Product
            </button>
            @include('pages.admin.category.modal-create')



            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td>{{ $row->price }}</td>
                        <td>
                            <a href="{{ route('admin.product.update', $row->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.product.destroy', $row->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data is empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>

@endsection

@push('script')
    <script src="text/javascript">

        ()function($) {
            function readURL(input) {
                var $prev = $('preview-logo')

                if(input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $prev.attr('src', e.target.result);
                    }

                    reader.readerAsDataURL(input.files[0]);
                    $prev.attr('class','');
                }else{
                    $prev.attr('class','visually-hidden')
                }
            }
            $('#image').on('chab=nge', function(){
                readURL(this);
            });
        }(jQuery);
    </script>
    
@endpush
