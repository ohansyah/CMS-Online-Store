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
                {{ Form::label('parent_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('parent_id', $categories, $data->parent_id, ['class' => 'form-control', 'required' => 'required', 'disabled']) !!}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-md-6 col-lg-8">
                    <img src="{{ $data->image_url }}" alt="" class="img-thumbnail-md">
                </div>
            </div>

        </form>
    </div>

@endsection
