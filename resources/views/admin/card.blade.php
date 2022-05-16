@extends('layouts.admin')
@section('content')
    @include('admin.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @yield('content-admin-card')

                </div>
            </div>
        </div>
    </section>
@endsection
