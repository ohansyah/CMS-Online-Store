@extends('layouts.app')
@section('content')
    <div class="scrolling-pagination">
        <div class="row row-cols-2 row-cols-lg-3 g-3 align-items-top">

            <!-- Products Start-->
            @foreach ($products as $product)
                <div class="col">
                    <div class="card m-0 shadow-sm">
                        <div class="card-body-product">
                            <a href="{{ route('app.product.show', $product->id) }}">
                                <img src="{{ $product->cover_image_url }}"
                                    class="img-thumbnail-product rounded mx-auto d-block" alt="...">
                            </a>
                            <h5 class="text-title-sm p-0 mt-1">
                                @if (strlen($product->name) < 18)
                                    {{ $product->name }}
                                @elseif (strlen($product->name) >= 18)
                                    {{ substr($product->name, 0, 16) }} ...
                                @endif
                            </h5>
                            <h6 class="text-small">{{ $product->category->name }}</h6>
                            <div class="d-grid gap-2 ">
                                <a href="{{ $wa_link }}" target="_blank" class="btn btn-primary "><i
                                        class="bi bi-whatsapp"></i> Whatsapp</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Products End-->

            {{ $products->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('niceadmin/js/jscroll.js') }}"></script>
@endpush
