@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => ['banner.update', $data->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', $data->name, ['class' => 'form-control','required' => 'required','placeholder' => 'Name']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::select('type', ['home' => 'Home', 'popup' => 'Pop Up'], $data->type, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('start_date', 'Start Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local','start_date', \Carbon\Carbon::parse($data->start_date)->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('end_date', 'End Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local','end_date', \Carbon\Carbon::parse($data->end_date)->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>

        <!-- Quill Editor Full -->
        <div class="row mt-3 mb-5">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10 mb-5">
                {{ Form::hidden('description', null, ['type' => 'hidden', 'id' => 'quill-text']) }}
                <div class="quill-editor-full" id="quill-container">
                    {!! $data->description !!}
                </div>
            </div>
        </div>
        <!-- End Quill Editor Full -->

        <!-- Start Images Upload -->
        <div class="row">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image_1', 'onchange' => "previewImage(1); removeImage(1)"]) }}
            </div>
        </div>

        <div id="div_image_1" class="row mt-2">
            {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                <img src="{{ $data->image_url }}" alt="" class="img-thumbnail">
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
    <script>
        $("#formData").on("submit", function() {
            $("#quill-text").val($("#quill-container").children().first().html());
        })
    </script>
    <script src="{{ asset('niceadmin/js/image-preview.js') }}"></script>
@endpush
