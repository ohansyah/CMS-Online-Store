<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area" id="exclusive-deal">
    @foreach ($hotDeals as $key => $value)
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                @if ($key % 2 == 0)
                    @include('app.banner.inner-banner')
                @endif

                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">

                        @foreach ($value->products as $product)
                            <div class="single-exclusive-slider">
                                <a href="{{ route('app.product.show', ['product' => $product->id]) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{ $product->cover_image_url }}" alt="">
                                </a>
                                <div class="product-details">
                                    <div class="price">
                                        <h6>Rp{{ $product->price }}</h6>
                                        <h6 class="l-through">Rp{{ $product->price * 1.2 }}</h6>
                                    </div>
                                    <h4>{{ $product->name }}</h4>
                                    <div class="add-bag d-flex align-items-center justify-content-center">
                                        <a class="add-btn"
                                            href="{{ route('app.product.show', ['product' => $product->id]) }}"><span
                                                class="ti-bag"></span></a>
                                        <span class="add-text text-uppercase">Buy this</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                @if ($key % 2 != 0)
                    @include('app.banner.inner-banner')
                @endif
            </div>
        </div>
    @endforeach
</section>

<!-- End exclusive deal Area -->
