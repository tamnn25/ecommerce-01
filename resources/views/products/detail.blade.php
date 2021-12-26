@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<hr>
<section class="product-detail">
    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic__item">
                <img class="product__details__pic__item--large" src="{{ asset($product->thumbnail) }}" width=" 350px" height="400px" alt="{{ $product->image }}">
            </div>
            <hr>
            <div class="product__details__pic__slider owl-carousel">
            </div>
            <hr>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                    @csrf
                    <h3><strong>{{ $product->name }}</strong></h3>

                    <p class="product-comment">
                        <span>{{ $product->description }}</span>
                    </p>
                    <p class="product-comment">
                        <span>Quantity Remaining: </span>
                        @if ($product->quantity <= 0) <span class="text-danger">Out of stock</span>
                            @else
                            <span>{{ $product->quantity }}</span>
                            @endif
                    </p>
                    <hr>
                    @if (!empty($product->discount))
                    <p class="product-price text-muted"><del>{{ number_format($product->price) . '   VND' }}</del></p>
                    <p class="product-price">{{ number_format($product->discount) . 'VND' }}</p>
                    @else
                    <p class="product-price">{{ number_format($product->price) . '   VND' }}</p>
                    @endif
                    <hr>
                    <p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="quantity" required value="1" max="{{ $product->quantity }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Add Cart</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<section class="categories">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title related__product__title">
                <h2>Related Product</h2>
            </div>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @if (!empty($related))
                @foreach ($related as $item)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset($item->thumbnail) }}">
                        <h5><a href="{{ route('product.detail', $item->id) }}">{{ $item->category->name }}</a>
                        </h5>

                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
@endsection

@push('css')
<link rel="stylesheet" href="{{ '/shop/css/rating.css' }}">
@endpush

@push('js')

@endpush