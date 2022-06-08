@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => 'banner.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::select('type', ['home' => 'Home', 'popup' => 'Pop Up'], null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('start_date', 'Start Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local','start_date', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), ['id' => 'start-date', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('end_date', 'End Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local', 'end_date', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>

        <!-- Quill Editor Full -->
        <div class="row mt-3 mb-5">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10 mb-5">
                {{ Form::hidden('description', null, ['type' => 'hidden', 'id' => 'quill-text']) }}
                <div class="quill-editor-full" id="quill-container">
                    {!! null !!}
                </div>
            </div>
        </div>
        <!-- End Quill Editor Full -->

        <div class="row">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::file('image', ['class' => 'form-control', 'id' => 'formFile']) }}
            </div>
        </div>
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
@endpush
