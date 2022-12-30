@extends('admin.card')
@section('content-admin-card')
    <div class="card-body">
        {!! Form::open(['route' => ['product.update', $data->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', $data->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
            </div>
        </div>

        <div class="row mt-3">
            {{ Form::label('category_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {!! Form::select('category_id', $categories, $data->category_id, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="row mt-3">
            {{ Form::label('price', 'Price', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::number('price', $data->price, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Price']) }}
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
                <div class="row">
                    {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label', 'type' => 'hidden']) }}
                    <div id="div_image_{{ $image->id }}" class="col-sm-10 col-md-4">
                        <img src="{{ $image->image_url }}" class="img-thumbnail mt-5">
                        <div class="pt-2">
                            <a onclick="removeImage({{ $image->id }})" class="btn btn-danger" title="Remove image"><i
                                    class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Start Images Upload -->
        <div class="row mt-5">
            {{ Form::label('Upload Images', null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {{ Form::file('images[]', ['class' => 'form-control', 'multiple', 'onchange' => 'previewImages()', 'id' => 'image']) }}
            </div>
        </div>

        <div class="row mt-2">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10" id="images-preview"></div>
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
