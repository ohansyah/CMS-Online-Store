@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        <form>
            <div class="row mt-3">
                {{ Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('title', $data->title, ['class' => 'form-control','required' => 'required','placeholder' => 'Title','disabled']) }}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('subtitle', 'Subtitle', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('subtitle', $data->subtitle, ['class' => 'form-control','required' => 'required','placeholder' => 'Subtitle','disabled']) }}
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('type', ['product-category' => 'Product Categories', 'product-list' => 'Product List'], $data->type, ['class' => 'form-control', 'required' => 'required', 'disabled']) !!}
                </div>
            </div>
            <div id="category-list">
                <div class="row mt-3">
                    {{ Form::label('category_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-md-4 col-sm-10">
                        {!! Form::select('category_id', $categories , isset($data->data->category_id) ? $data->data->category_id : 0, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>
            </div>
            <div id="product-list">
                <div class="row mt-3">
                    {{ Form::label('product_ids[]', 'Product', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {!! Form::select('product_ids[]', $products, isset($data->data->product_ids) ? $data->data->product_ids : 0, ['class' => 'selectpicker form-control', 'multiple'=>'', 'data-live-search' => 'true','disabled']) !!}
                    </div>
                </div>
            </div>
            <div id="product-total">
                <div class="row mt-3">
                    {{ Form::label('product_total', 'Total Product', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-md-4 col-sm-10">
                        {!! Form::number('product_total', isset($data->data->product_total) ? $data->data->product_total : null, ['class' => 'form-control', 'min' => 1, 'max' => 10,'disabled']) !!}
                    </div>
                </div>
            </div>
            <div id="button-link">
                <div class="row mt-3">
                    {{ Form::label('button_link', 'Button Link', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('button_link', isset($data->data->button_link) ? $data->data->button_link : null , ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                {{ Form::label('button_text', 'Button Text', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('button_text', $data->data->button_text, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Button Text','disabled']) }}
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
            <div class="row mt-3">
                {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <img src="{{ $data->image_url }}" alt="" class="img-thumbnail-md">
                </div>
            </div>

        </form>
    </div>

@endsection


@push('scripts')

    {{-- BOOTSTRAP MULTIPLE SELECT--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
       function getSelectedType(){
            let selected = document.getElementById('type').value;
            let categoryList = document.getElementById("category-list");
            let productList = document.getElementById("product-list");
            let productTotal = document.getElementById("product-total");
            let buttonLink = document.getElementById("button-link");
            
            if (selected == 'product-list'){
                productList.style.display = "block";
                buttonLink.style.display = "block";

                categoryList.style.display = "none";
                productTotal.style.display = "none";
                
            } else if (selected == 'product-category') {
                categoryList.style.display = "block";
                productTotal.style.display = "block";
                
                buttonLink.style.display = "none";
                productList.style.display = "none";
            } else {
                categoryList.style.display = "none";
                productList.style.display = "none";
                productTotal.style.display = "none";
                buttonLink.style.display = "none";
            }
       }
       getSelectedType();
    </script>
@endpush