@extends('layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
    </section>
    <!-- End Banner Area -->

    <div class="single-product-slider mt-5">
        <div class="container">
            <div class="scrolling-pagination">
                <div class="row">

                    <!-- Products Start-->
                    @foreach ($products as $product)
                        @include('app.product.card')
                    @endforeach
                    <!-- Products End-->

                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('niceadmin/js/jscroll.js') }}"></script>
@endpush
