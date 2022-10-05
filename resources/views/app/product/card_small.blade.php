<div class="col-lg-6 col-md-6 col-sm-6 mb-20">
    <div class="single-related-product d-flex">
        <a href="{{ route('app.product.show', ['product' => $product->id]) }}">
            <img src="{{ $product->cover_image_url }}" alt="" style="width: auto; height: 70px; background-size: 70px;">
        </a>
        <div class="desc">
            <a href="{{ route('app.product.show', ['product' => $product->id]) }}" class="title">{{ $product->name }}</a>
            <div class="price">
                <h6>Rp{{ $product->price }}</h6>
                <h6 class="l-through">Rp{{ $product->price * 1.2 }}</h6>
            </div>
        </div>
    </div>
</div>
