@extends('layouts.admin')
@section('content')
    @include('admin.breadcrumb')

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">

                    @yield('content-user-card-profile-img')

                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">

                    @yield('content-user-card-profile-body')
                    
                </div>
            </div>
        </div>
    </section>
@endsection
