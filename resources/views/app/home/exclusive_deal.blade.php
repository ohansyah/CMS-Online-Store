<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area mb-5">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <h1>Exclusive Hot Deal Ends Soon!</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
                <a href="{{ route('app.product.index', ['category_id' => 7]) }}" class="primary-btn">Shop Now</a>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">

                    @foreach ($jerseys as $jersey)
                        <div class="single-exclusive-slider">
                            <a href="{{ route('app.product.show', ['product' => $jersey->id]) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-fluid" src="{{ $jersey->cover_image_url }}" alt="">
                            </a>
                            <div class="product-details">
                                <div class="price">
                                    <h6>Rp{{ $jersey->price }}</h6>
                                    <h6 class="l-through">Rp{{ $jersey->price * 1.2 }}</h6>
                                </div>
                                <h4>{{ $jersey->name }}</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn"
                                        href="{{ route('app.product.show', ['product' => $jersey->id]) }}"><span
                                            class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Buy this</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End exclusive deal Area -->
