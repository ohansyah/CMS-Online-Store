<div class="col-lg-3 col-md-6">
    <div class="single-product">
        <a href="{{ route('app.product.show', ['product' => $product->id]) }}" target="_blank" rel="noopener noreferrer">
            <img class="img-fluid" src="{{ $product->cover_image_url }}" alt="">
        </a>
        <div class="product-details">
            <h6>{{ $product->name }}</h6>
            <div class="price">
                <h6>Rp{{ $product->price }}</h6>
                <h6 class="l-through">Rp{{ $product->price * 1.2 }}</h6>
            </div>
            <div class="prd-bottom">
                <a href="{{ route('app.product.show', ['product' => $product->id]) }}" class="social-info">
                    <span class="lnr lnr-move"></span>
                    <p class="hover-text">view more</p>
                </a>
            </div>
        </div>
    </div>
</div>
