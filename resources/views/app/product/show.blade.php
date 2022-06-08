@extends('layouts.app')
@section('content')
    <!-- Card with an image on top -->
    <div class="card m-3">
        <!-- Slides with indicators -->
        @if (count($product->productImages))
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($product->productImages as $image)
                        @if ($loop->first)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $loop->index }}"
                                aria-label="Slide {{ $loop->index + 1 }}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($product->productImages as $image)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img src="{{ $image->image_url }}" class="d-block w-100" alt="...">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ $image->image_url }}" class="d-block w-100" alt="...">
                            </div>
                        @endif
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img src="{{ $product->cover_image_url }}" class="card-img-top" alt="...">
        @endif
        <!-- Slides with indicators End -->

        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            {{ $product->category->name }}
        </div>
    </div><!-- End Card with an image on top -->
@endsection
