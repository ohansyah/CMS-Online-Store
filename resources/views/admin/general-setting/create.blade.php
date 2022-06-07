@extends('admin.card')
@section('content-admin-card')
    <div class="card-body">
        {!! Form::open(['route' => 'general-setting.store', 'method' => 'POST', 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Description']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('value', 'Value', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('value', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Value']) }}
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
