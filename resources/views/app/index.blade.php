@extends('layouts.app')
@section('content')
    @include('app.home.slider-banner')

    <div class="container">
        @include('app.home.popup')
        @include('app.home.categories')
        @include('app.home.products')
    </div>
@endsection
