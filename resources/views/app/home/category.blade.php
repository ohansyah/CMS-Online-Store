<!-- Start category Area -->
<section class="category-area" id="categories">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="row">

                    @foreach ($categories as $category)
                        <div class="col-6 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ $category->image_url }}" alt="">
                                <a href="{{ route('app.product.index', ['category_id' => $category->id]) }}">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $category->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->
