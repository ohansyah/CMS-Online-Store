@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('parent_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::select('parent_id', $categories, 0, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>

        <!-- Start Images Upload -->
        <div class="row mt-3">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image_1', 'onchange' => 'previewImage(1)']) }}
            </div>
        </div>

        <div class="row mt-2">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10" id="image_preview_1"></div>
        </div>
        <!-- End Images Upload -->

        <div class="row mt-3">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>


        {!! Form::close() !!}
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('niceadmin/js/image-preview.js') }}"></script>
@endpush
