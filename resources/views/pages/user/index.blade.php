@extends('layouts.parent')

@section('title', 'dashboard - Admin')

@section('content')
    <div class="section dashboard">
        <div class="row">
            
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                    <div class="card-body">
                        <h5 class="card-title">Dashboard <span>| This Year</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pending }}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $settlement }}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $expired }}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                <!-- Category Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Category</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pending }}</h6>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Category Card -->
            </div>
            <div class="col-md-4">
                <!-- Product Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Product</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-check-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $settlement }}</h6>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Product Card -->
            </div>
            <div class="col-md-4">
                <!-- User Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">User</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-emoji-sunglasses-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $expired }}</h6>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End User Card -->
            </div>
        </div>
    </div>

@endsection
