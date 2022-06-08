@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        <form>
            <div class="row mt-3">
                {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('name', $data->name, ['class' => 'form-control','required' => 'required','placeholder' => 'Name','disabled']) }}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('description', $data->description, ['class' => 'form-control','required' => 'required','placeholder' => 'Description','disabled']) }}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('value', 'Value', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('value', $data->value, ['class' => 'form-control','required' => 'required','placeholder' => 'Value','disabled']) }}
                </div>
            </div>
        </form>
    </div>

@endsection
