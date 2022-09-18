@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.create_product'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.product_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.create_product'))

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/backend/css/products/product-create.css">
@endpush

{{-- import file js (private) --}}
@push('js')
<!-- add plugin Price Format -->
<script src="/plugins/priceformat/jquery.priceformat.min.js"></script>

<!-- add jquery custom -->
<script src="/backend/js/products/product-list.js"></script>
@endpush

@section('content')
<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-5">
                <label for="" class="required">{{ __('message.product_name') }}</label>
                <input type="text" name="name" placeholder="" value="{{ old('name') }}" class="form-control">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="" class="required">{{ __('message.thumbnail') }}</label><br>
                <input type="file" name="thumbnail" class="form-control">
                @error('thumbnail')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-5">
                <label for="" class="required">{{ __('message.quantity') }}</label>
                <input type="text" name="quantity" placeholder="" value="{{ old('quantity') }}" class="form-control">
                @error('quantity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="" class="required">{{ __('message.category') }}</label>
                <select name="category_id" class="form-control">
                    <option value=""></option>
                    @if(!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                    <option value="{{ $categoryId }}" {{ old('category_id') == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
                    @endforeach
                    @endif
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- <div class="form-group mb-5">
                    <label for="">{{ __('message.product_image') }}</label><br>
                    <input type="file" name="images[]" multiple>
                    @error('url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> -->

            <div class="form-group mb-5">
                <label for="" class="required">{{ __('message.price') }}</label>
                @php
                // Define Variable
                $price = null;

                // Check Old Data
                if (old('price')) {
                // Get Value of Price
                $price = old('price');

                // Remove Character Special
                $price = \App\Utils\CommonUtil::removeCharSpecPrice($price);

                // Format
                $price = empty($price) ? null : number_format($price, 2);
                }
                @endphp
                <input type="text" name="price" placeholder="" value="{{ $price }}" class="form-control" id="price">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group mb-5">
        <label for="" class="required">{{ __('message.product_description') }}</label>
        <textarea name="description" rows="2" class="form-control">{{ old('description') }}</textarea>
        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-5">
        <label for="" class="required">{{ __('message.product_content') }}</label>
        <textarea name="content" rows="10" class="form-control">{{ old('content') }}</textarea>
        @error('content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <p><span class="red">(*)</span>: {{ __('message.required') }}</p>

    <div class="form-group">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.product_list') }}</span></a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <span class="ml-2">{{ __('message.save') }}</span></button>
    </div>
</form>
@endsection