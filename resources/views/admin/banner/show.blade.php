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
                {{ Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('type', ['home' => 'Home', 'popup' => 'Pop Up'], $data->type, ['class' => 'form-control', 'required' => 'required', 'disabled']) !!}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('start_date', 'Start Date', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::input('dateTime-local','start_date', \Carbon\Carbon::parse($data->start_date)->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date', 'disabled']) !!}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('end_date', 'End Date', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::input('dateTime-local','end_date', \Carbon\Carbon::parse($data->end_date)->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date', 'disabled']) !!}
                </div>
            </div>
            <div class="row mt-3 mb-5">
                {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10 mb-5">
                    {!! $data->description !!}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <img src="{{ $data->image_url }}" alt="" class="img-thumbnail-md">
                </div>
            </div>

        </form>
    </div>

@endsection
