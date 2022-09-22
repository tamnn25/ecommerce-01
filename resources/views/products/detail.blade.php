@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<section class="product-detail">
    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic__item">
                <img class="product__details__pic__item--large" src="{{ asset($product->thumbnail) }}" height="400px" alt="{{ $product->image }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                    @csrf
                    <h3><strong>{{ $product->name }}</strong></h3>

                    <p class="product-comment">
                        <textarea rows="10" cols="50" class="form-control" >{{ $product->description }}</textarea>
                    </p>
                    <p class="product-comment">
                        <b>Loại sản phẩm: </b>
                        <span>{{ $product->Category->name }}</span>
                    </p>
                    <p class="product-comment">
                        <b>Số lượng còn lại: </b>
                        @if ($product->quantity <= 0) <span class="text-danger">Hết hàng</span>
                            @else
                            <span>{{ $product->quantity }}</span>
                            @endif
                    </p>
                    <p class="product-price">
                        <b>Số lượng còn lại: </b>    
                        <span>{{ number_format($product->price) . '   VNĐ' }}</span>
                    </p>
                    <p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="quantity" required value="1" max="{{ $product->quantity }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Thêm vào giỏ hàng</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="col-lg-12">
            <h4>Mô tả sản phẩm</h4><hr>
            <textarea rows="20" class="form-control">{{ $product->content }}</textarea>
        </div>
    </div>
    </div>
</section>
<!-- comment & rating -->
<section id="app">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="comment">
                    <p v-for="items in item" v-text="items"></p>
                </div>
                <!--End Comment-->
            </div>
            <!--End col -->
        </div><!-- End row -->
        <form action="{{ route('comment.add-comment') }}" method="POST">
            @csrf
            <div class="row">
                <div class="">
                    <textarea type="text" rows="3" name="content" class="form-control" placeholder="Viết đánh giá ... " v-model="newItem" @keyup.enter="addItem()"></textarea>
                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <div class="rating">
                        <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <button v-on:click="addItem()" class="btn btn-warning mt-2" type="submit">Đánh giá</button>
                </div><!-- End col -->
            </div>
            <!--End Row -->
        </form>
    </div>
    <!--End Container -->
</section><!-- end App -->

<section class="categories">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title related__product__title">
                <h2>Sản phẩm liên quan</h2>
            </div>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @if (!empty($related))
                @foreach ($related as $item)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset($item->thumbnail) }}">
                        <h5><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
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

    .checked {
        color: orange;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
@endsection

@push('css')
<link rel="stylesheet" href="{{ '/shop/css/rating.css' }}">
@endpush

@push('js')

@endpush