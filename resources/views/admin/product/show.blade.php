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

            <!-- Quill Editor Full -->
            <div class="row mt-3">
                {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10 mb-5">
                    {{ Form::hidden('description', null, ['type' => 'hidden', 'id' => 'quill-text']) }}
                    <div class="quill-editor-full" id="quill-container">
                        {!! $data->description !!}
                    </div>
                </div>
            </div>
            <!-- End Quill Editor Full -->

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
