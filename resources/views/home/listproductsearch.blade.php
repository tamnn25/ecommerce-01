
@extends('layouts.master')
@section('content')

<body>
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul style=" display:none; " >
                            @foreach ($categories as $category)
                                    <li class="active" data-filter="*">
                                            <a href="{{ url('home/shop/'. $category->id)}}"><i>{{ $category->name }}</i></a>
                                    </li>
                            @endforeach
                            </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                    
                            <div class="hero__search__form">
                                <div class="hero__search__categories">
                                    <form action="{{ route('product.search') }}" id="formSearch" method="GET">
                                        <input type="text" name="key" placeholder="Bạn muốn tìm mua sách nào?">
                                        <button type="submit" class="site-btn">Tìm kiếm</button>
                                    </form>
                                </div>    
                            </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 263 888 279</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>    
    </section>
  
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('shop/img/imageshop.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Mua sắm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.shop', 0) }}">Trang chủ</a>
                            <span>Mua sắm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " >
                    <div class="sidebar" >
                        
                        <div class="sidebar__item">
                                {{-- {{dd(request()->route()->parameters['id'])}} --}}
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <form action="{{ route('home.shop', (request()->route()->parameters)?request()->route()->parameters['id']:0) }}">
                                    <input type="radio" name="money" id="" value="1"> <label for="">Từ 0 - 100.000 VNĐ</label><br>
                                    <input type="radio" name="money" id="" value="2"> <label for="">Từ 100.000 VNĐ - 500.000 VNĐ</label><br>
                                    <input type="radio" name="money" id="" value="3"> <label for="">Từ 500.000 VNĐ - 1.000.000VNĐ</label><br>
                                    <input type="submit" value="Search" class="btn btn-outline-success">
                                </form>

                                {{-- <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div> --}}
                             
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="sidebar__item sidebar__item__color--option">
                            <h4>Màu sắc</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    Trắng
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Xám
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                Đỏ
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                Đen
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Xanh da trời
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Xanh lá
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar__item">
                            <h4>Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Lớn
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Vừa
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Nhỏ
                                    <input type="radio" id="small">
                                </label>
                            </div>

                        </div> --}}
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Sản phẩm mới</h4>
                                 <div class="latest-product__slider owl-carousel">
                                    @for ($i = 1; $i <= 3; $i++) 
                                        <div class="latest-prdouct__slider__item">
                                            @if(isset($lasterProduct[$i]))
                                            @foreach ($lasterProduct[$i] as $key => $item)

                                                    <a href="{{ route('product.detail', $item['id']) }}" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            
                                                            <img src="{{asset('/'.$item->thumbnail ) }}" alt="" style="width: 110px ">
                                                        </div>
                                                        
                                                        <div class="latest-product__item__text">
                                                            
                                                            <h6 >  {{ $item->name }}</h6>
                                                <span>{{ number_format($item->price ) . '   VNĐ'  }}</span>
                                                        </div>
                                                    </a>
                                            @endforeach
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 col-md-7">
                    {{-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sản phẩm khuyến mãi</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                     @if (!empty($promotion))
                                         @foreach ($promotion as $item)
                                             <br>
                                             {{ $item->discount }}

                                             <br>
                                             {{ $item->begin_date }}
                                             <br>
                                             {{ $item->end_date }}
                                         @endforeach
                                     @endif
                            </div>
                        </div>
                    </div> --}}
                    <div class="filter__item">
                        <div class="row">
                            
                            <div class="col-lg-4 col-md-5">
                                {{-- <div class="filter__sort">
                                    <label for="amount">Sắp sếp theo</label>
                                   
                                    <span>Sắp sếp theo</span>
                                    <select name="sortBy">
                                        <option value="asc"><a href="{{ route('home.shop', ['sortBy' => 'asc'])  }}">a -> z</a></option>
                                        <option value="desc"><a href="{{ route('home.shop', ['sortBy' => 'desc']) }}">z -> a</a></option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    
                                    <h6><strong>Tìm thấy </strong><span> 
                                    @php
                                        $soluong = count($products);
                                        echo $soluong;
                                    @endphp
                                    </span> <strong>sản phẩm</strong></h6>
                                
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        
                            @if($products)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" style="border: 1px solid blanchedalmond;" onclick="location.href=`{{ route('product.detail', $product->id) }}`">
                                            <img class="product__details__pic__item" src="{{ asset($product->thumbnail) }}" alt="{{ $product->image }}">

                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="{{ route('product.detail', $product['id']) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="{{ route('product.detail', $product['id']) }}"><strong>{{ $product->name }}</strong></a></h6>
                                            <span>{{ number_format($product->price ) . '   VNĐ'  }}</span>
                                            <div class="product-buy">
                                                <a href="{{ route('product.detail', $product['id']) }}" class="btn  btn-outline-primary">Xem Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            
                    </div>
                          <div style="margin-left: 45%; ">  {{ $products->links() }} </div>
                </div>
            </div>
        </div>
    </section>
</body>
</section>  

@endsection
