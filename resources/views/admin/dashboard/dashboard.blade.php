@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>{{ $breadcrumb['title'] }}</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Banners Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Banners</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi-badge-ad"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count['banner_active']}}<span class="text-muted small pt-2 ps-1">Active</span></h6>
                                        <span class="text-muted small pt-2 ps-1">from total {{$count['banner']}} Banner</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Banners Card -->

                    <!-- Categories Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Categories</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi-columns-gap"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count['category']}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Categories Card -->

                    <!-- Products Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Products</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi-box-seam"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count['product']}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Products Card -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
