<div class="card mb-0">
    <!-- Slides with indicators -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($banners as $banner)
                @if ($loop->first)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->index + 1 }}"></button>
                @endif
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $banner)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <a href="{{ route('app.banner.show', $banner->id) }}">
                            <img src="{{ $banner->image_url }}" class="d-block w-100" alt="...">
                        </a>
                    </div>
                @else
                    <div class="carousel-item">
                        <a href="{{ route('app.banner.show', $banner->id) }}">
                            <img src="{{ $banner->image_url }}" class="d-block w-100" alt="...">
                        </a>
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
    <!-- Slides with indicators End -->
</div>

<nav class="d-flex justify-content-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('app.banner.index') }}">More Detail</a></li>
    </ol>
</nav>
