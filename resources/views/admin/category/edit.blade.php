@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => ['category.update', $data->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', $data->name, ['class' => 'form-control','required' => 'required','placeholder' => 'Name']) }}
            </div>
        </div>
        @if ($data->parent_id != 0)
            <div class="row mt-3">
                {{ Form::label('parent_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('parent_id', $categories, $data->parent_id, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        @endif
        <div class="row mt-3">
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
