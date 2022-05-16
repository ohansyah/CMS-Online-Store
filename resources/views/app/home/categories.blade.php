<!-- Categories with indicators Start-->
<h5 class="mt-4"><b>Categories</b></h5>
<div class="row row-cols-4">
    @foreach ($categories as $category)
        <div class="categories">
            <a href="{{ route('app.product.index', ['category_id' => $category->id]) }}">
                <div class="card m-0 shadow-sm mx-2 rounded15">
                    <div class="card-body p-2">
                        <img src="{{ $category->image_url }}" class="d-block w-100" alt="...">
                    </div>
                </div>
            </a>
            <p class="text-center text-small mt-1">{{ $category->name }}</p>
        </div>
    @endforeach
</div>
<!-- Categories with indicators End-->
