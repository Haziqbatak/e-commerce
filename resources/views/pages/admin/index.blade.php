@extends('layouts.parent')

@section('title', 'dashboard - Admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">With Home Icon</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                </ol>
            </nav>
        </div>
    </div>
    HELLO {{ Auth::user()->name }}
@endsection
