@extends('admin.card')
@section('content-admin-card')

    <div class="card-body">
        {!! Form::open(['route' => 'hot-deals.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}
        <div class="row mt-3">
            {{ Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Title']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('subtitle', 'Subtitle', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('subtitle', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Subtitle']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::select('type', ['--- Select Type ---', 'product-category' => 'Product Categories', 'product-list' => 'Product List'], null, ['class' => 'form-control', 'required' => 'required', 'onchange' => 'getSelectedType()']) !!}
            </div>
        </div>

        <div id="category-list">
            <div class="row mt-3">
                {{ Form::label('category_id', 'Parent Category', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-md-4 col-sm-10">
                    {!! Form::select('category_id', $categories, 0, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div id="product-list">
            <div class="row mt-3">
                {{ Form::label('product_ids[]', 'Product', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {!! Form::select('product_ids[]', $products, 0, ['class' => 'selectpicker form-control', 'multiple'=>'', 'data-live-search' => 'true']) !!}
                </div>
            </div>
        </div>
        <div id="product-total">
            <div class="row mt-3">
                {{ Form::label('product_total', 'Total Product', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-md-4 col-sm-10">
                    {!! Form::number('product_total', null, ['class' => 'form-control', 'min' => 1, 'max' => 10]) !!}
                </div>
            </div>
        </div>
        <div id="button-link">
            <div class="row mt-3">
                {{ Form::label('button_link', 'Button Link', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('button_link', null, ['class' => 'form-control', 'placeholder' => 'Button Link']) }}
                </div>
            </div>
        </div>

        <div class="row mt-3">
            {{ Form::label('button_text', 'Button Text', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('button_text', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Button Text']) }}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('start_date', 'Start Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local','start_date', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), ['id' => 'start-date', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>
        <div class="row mt-3">
            {{ Form::label('end_date', 'End Date', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {!! Form::input('dateTime-local', 'end_date', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>          

        <!-- Start Images Upload -->
        <div class="row mt-3">
            {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-md-4 col-sm-10">
                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image_1', 'onchange' => 'previewImage(1)']) }}
            </div>
        </div>
        
        <div class="row mt-2">
            {{ Form::label(null, null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10" id="image_preview_1"></div>
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
    <script src="{{ asset('niceadmin/js/image-preview.js') }}"></script>

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
    </script>
@endpush
