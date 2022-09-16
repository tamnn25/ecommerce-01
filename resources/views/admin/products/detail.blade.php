@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.detail_product'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.product_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.detail_product'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/products/product-edit.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <!-- add plugin Price Format -->
    <script src="/plugins/priceformat/jquery.priceformat.min.js"></script>

    <!-- add jquery custom -->
    <script src="/backend/js/products/product-list.js"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-5">
                <label>{{ __('message.product_name') }}</label>
                <input type="text" placeholder="{{ __('message.product_name') }}" value="{{ $product->name }}" class="form-control" disabled>
            </div>

            <div class="form-group mb-5">
                <label>{{ __('message.thumbnail') }}</label><br>
                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-5">
                <label>{{ __('message.quantity') }}</label>
                <input type="text" name="quantity" placeholder="{{ __('message.quantity') }}" value="{{ $product->quantity }}" class="form-control" disabled>
            </div>

            <div class="form-group mb-5">
                <label>{{ __('message.category') }}</label>
                <input type="text" value="{{ $product->category->name }}" class="form-control" disabled>
            </div>

            <div class="form-group mb-5">
                <label>{{ __('message.product_image') }}</label>

                {{-- show all image of table product_images --}}
                @if (!empty($product->images))
                    <ul class="row list-product-image">
                        @foreach ($product->images as $image)
                            <li class="col-4">
                                <div class="product-image-group">
                                    <img src="{{ asset($image) }}" alt="image" class="img-fluid">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="form-group mb-5">
                <label>{{ __('message.price') }}</label>
                @php
                    // Get Value of Price
                    $price = old('price', $product->price);

                    // Remove Character Special
                    $price = \App\Utils\CommonUtil::removeCharSpecPrice($price);

                    // Format
                    $price = empty($price) ? null : number_format($price, 2);
                @endphp
                <input type="text" placeholder="price" value="{{ $price }}" class="form-control" id="price" disabled>
            </div>
        </div>
    </div>

    <div class="form-group mb-5">
        <label>{{ __('message.product_description') }}</label>
        <textarea rows="2" class="form-control" disabled>{{ $product->description }}</textarea>
    </div>

    <div class="form-group mb-5">
        <label>{{ __('message.product_content') }}</label>
        <textarea rows="10" class="form-control" disabled>{{ $product->content }}</textarea>
    </div>

    <div class="form-group">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.product_list') }}</span></a>
    </div>
@endsection
