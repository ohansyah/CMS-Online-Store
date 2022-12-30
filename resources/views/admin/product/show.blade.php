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
                {{ Form::label('category_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('category_id', $categories, $data->category_id, ['class' => 'form-control', 'required' => 'required', 'disabled']) !!}
                </div>
            </div>

            <div class="row mt-3">
                {{ Form::label('price', 'Price', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('price', $data->price, ['class' => 'form-control','required' => 'required','placeholder' => 'Price','disabled']) }}
                </div>
            </div>

            <div class="row mt-3 mb-5">
                {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10 mb-5">
                    {!! $data->description !!}
                </div>
            </div>

            @if ($data->productImages->count() > 0)
                @foreach ($data->productImages as $key => $image)
                    <div class="row mt-5">
                        {{ Form::label('image', 'Image '.++$key, ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <img src="{{ $image->image_url }}" class="img-thumbnail">
                        </div>
                    </div>
                @endforeach
            @endif

        </form>
    </div>

@endsection
