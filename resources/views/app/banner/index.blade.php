@extends('layouts.app')
@section('content')
    <div class="scrolling-pagination">

        <!-- Banner Start-->
        @foreach ($banners as $banner)
            <a href="{{ route('app.banner.show', $banner->id) }}">
                <div class="card m-3 rounded15" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ $banner->name }}">
                    <img src="{{ $banner->image_url }}" class="custom-shadow-sm rounded15" alt="...">
                </div>
            </a>
        @endforeach
        <!-- Banner End -->

        {{ $banners->links() }}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('niceadmin/js/jscroll.js') }}"></script>
@endpush
