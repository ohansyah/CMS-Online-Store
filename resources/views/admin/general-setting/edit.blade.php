@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => ['general-setting.update', $data->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', $data->name, ['class' => 'form-control','required' => 'required','placeholder' => 'Name']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('description', $data->description, ['class' => 'form-control','required' => 'required','placeholder' => 'Description']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('value', 'Value', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('value', $data->value, ['class' => 'form-control','required' => 'required','placeholder' => 'Value']) }}
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
