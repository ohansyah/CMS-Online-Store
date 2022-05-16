@extends('layouts.app')
@section('content')
    <!-- Card with an image on top -->
    <div class="card m-3">
        <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            {{ $product->category->name }}
        </div>
    </div><!-- End Card with an image on top -->
@endsection
