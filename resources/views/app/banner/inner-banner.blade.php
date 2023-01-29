<div class="col-lg-6 no-padding exclusive-left" style="background:url('{{ $value->image_url }}')">
    <div class="row clock_sec clockdiv" id="clockdiv">
        <div class="col-lg-12">
            <h1>{{ $value->title }}</h1>
            <p>{{ $value->subtitle }}</p>
        </div>
    </div>
    @if ($value->type == 'product-category')
        <a href="{{ route('app.product.index', ['category_id' => $value->data->category_id]) }}" class="primary-btn">Shop
            Now</a>
    @else
        <a href="{{ route('app.product.index', ['id' => implode(',', $value->data->product_ids)]) }}"
            class="primary-btn">Shop Now</a>
    @endif
</div>
