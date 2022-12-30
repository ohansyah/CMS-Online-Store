@extends('admin.card')
@section('content-admin-card')
    <div class="card-body">
        {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
            </div>
        </div>

        <div class="row mt-3">
            {{ Form::label('category_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::select('category_id', $categories, 0, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="row mt-3">
            {{ Form::label('price', 'Price', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::number('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Price']) }}
            </div>
        </div>

        <!-- Quill Editor Full -->
        <div class="row mt-3  mb-5">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10 mb-5">
                {{ Form::hidden('description', null, ['type' => 'hidden', 'id' => 'quill-text']) }}
                <div class="quill-editor-full" id="quill-container">
                    {!! null !!}
                </div>
            </div>
        </div>
        <!-- End Quill Editor Full -->

        <!-- Start Images Upload -->
        <div class="row mt-3">
            {{ Form::label('images', 'Images', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {{ Form::file('images[]', ['class' => 'form-control', 'multiple', 'required' => 'required', 'onchange' => 'previewImages()', 'id' => 'image']) }}
            </div>
        </div>

        <div class="row mt-2">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10" id="images-preview"></div>
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
    <script>
        $("#formData").on("submit", function() {
            $("#quill-text").val($("#quill-container").children().first().html());
        })
    </script>
    <script src="{{ asset('niceadmin/js/image-preview.js') }}"></script>
@endpush
