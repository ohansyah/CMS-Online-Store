@extends('layouts.app')
@section('content')
    <!-- Card with an image on top -->
    <div class="card m-3">
        <img src="{{ $banner->image_url }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{!! $banner->name !!}</h5>
            {!! $banner->description !!}
        </div>
    </div><!-- End Card with an image on top -->
@endsection
