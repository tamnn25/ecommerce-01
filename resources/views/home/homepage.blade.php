@section('content')
@extends('layouts.master')
@include('layouts.menu_left')



<!-- <section class="categories">

        <div class="container">
            <div class="row">

                <div class="categories__slider owl-carousel">
                   @if (!empty($products))

                        @foreach ($products as $product)

                            <div class="col-lg-3">
                                <div class="categories__item set-bg"  data-setbg="{{$product->image}}">

                                    <h5><a href="{{ route('product.detail', $product->id) }}">{{ $product->category->name }}</a></h5>
                            
                                </div>
                            </div> 

                        @endforeach

                    @endif    
                </div>
            </div>
        </div>
    </section> -->
<!-- Featured Section Begin -->

<section class="featured spad">

    @include('home.listproduct')

</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">

                <div class="banner__pic">

                    <div class="banner__pic">
                        <div id="m1" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">

                                <li data-target="#m1" data-slide-to="0" class="active"></li>

                                <li data-target="#m1" data-slide-to="1"></li>

                                <li data-target="#m1" data-slide-to="2"></li>

                                <li data-target="#m1" data-slide-to="3"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('shop/img/banner/1.jpg') }}" width="100%" height="275px" alt="Los Angeles">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('shop/img/banner/2.jpg') }}" width="100%" height="275px" alt="Chicago">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('shop/img/banner/3.jpg') }}" width="100%" height="275px" alt="New York">
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('shop/img/banner/8.jpg') }}" width="100%" height="275px" alt="New York">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- slide chạy trái --}}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">

                <div class="banner__pic">


                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">

                            <li data-target="#demo" data-slide-to="0" class="active"></li>

                            <li data-target="#demo" data-slide-to="1"></li>

                            <li data-target="#demo" data-slide-to="2"></li>

                            <li data-target="#demo" data-slide-to="3"></li>




                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('shop/img/banner/4.jpg') }}" width="100%" height="275px" alt="Los Angeles">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('shop/img/banner/5.jpg') }}" width="100%" height="275px" alt="Chicago">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('shop/img/banner/7.jpg') }}" width="100%" height="275px" alt="New York">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('shop/img/banner/6.jpg') }}" width="100%" height="275px" alt="New York">
                            </div>
                        </div>



                    </div>

                </div>
                {{-- slide chạy phải --}}
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Blog Section Begin -->
<section class="from-blog spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Blog của chúng tôi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="shop/img/blog/blog-1.jpg" height="250px" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 điều mà bạn cần chuẩn bị trước khi 30</a></h5>
                        <p>Có người bảo đời người chỉ bắt đầu khi ta 30 tuổi. Nhưng để có một tuổi 30 trong mơ, 29 năm trước bạn cần phải chuẩn bị nhiều thứ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="shop/img/blog/blog-2.jpg" height="250px" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Tham quan trang trại sạch ở Mỹ</a></h5>
                        <p>Nhà kho là nơi dùng để chứa các dụng cụ làm vườn và chăm bón cây, cứ vài tuần sẽ có người đến dọn dẹp sạch sẽ một lần</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="shop/img/blog/blog-3.jpg" height="250px" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Mẹo nấu ăn giúp việc nấu ăn trở nên đơn giản</a></h5>
                        <p>1. Đối với trứng · 2. Nghiền khoai tây bằng sữa ấm · 3. Không để chảo quá tải · 4. Áp chảo thịt bằng chảo không dính</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Blog Section End -->
@endsection
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

@push('css')

<link rel="stylesheet" href="{{'shop/css/rating.css' }}">

@endpush
@push('js')

@endpush