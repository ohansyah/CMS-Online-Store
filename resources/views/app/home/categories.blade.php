<!-- Categories with indicators Start-->
<h5 class="mt-4"><b>Categories</b></h5>
<div>
    <ul class="hs full h-scrollbar">
        @foreach ($categories as $category)
            <div class="item card shadow-sm mb-3">
                <a href="{{ route('app.product.index', ['category_id' => $category->id]) }}">
                    <img src="{{ $category->image_url }}" class="d-block w-100" alt="...">
                </a>
                <p class="text-center text-small mb-0">{{ $category->name }}</p>
            </div>
        @endforeach
    </ul>
</div>
<!-- Categories with indicators End-->
