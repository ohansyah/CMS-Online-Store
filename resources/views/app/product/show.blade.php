@extends('layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">

                    @if ($product->productImages->count() > 0)
                        @if ($product->productImages->count() > 1)
                            <div class="s_Product_carousel">
                                @foreach ($product->productImages as $key => $image)
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $image->image_url }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            @foreach ($product->productImages as $key => $image)
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="{{ $image->image_url }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    @endif

                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>Rp{{ $product->price }}</h2>
                        <ul class="list">
                            <li><a class="active"
                                    href="{{ route('app.product.index', ['category_id' => $product->category_id]) }}"><span>Category</span>
                                    : {{ $product->category->name }}</a></li>
                            <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                        </ul>
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
    </section>
    <!--================End Product Description Area =================-->

    @include('app.product.product-related')

@endsection
