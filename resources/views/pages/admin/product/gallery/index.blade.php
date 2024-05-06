@extends('layouts.parent')

@section('title', 'Category')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery >> {{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Data Product Gallery</li>
                </ol>
            </nav>

            <a href="" class="btn btn-primary"><i class="bi bi-plus">Add Gallery</i></a>

            <table class="table">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>No</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
