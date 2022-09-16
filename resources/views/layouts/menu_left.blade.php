<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    @foreach ($categories as $category)
                    <ul>
                        <li class="active" data-filter="*">
                            <a href="{{ url('home/shop/'. $category->id)}}"><span>{{ $category->name }}</span></a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">

                <div class="hero__search">
                    <div class="hero__search__form">

                        <form action="{{ route('product.search') }}" id="formSearch" method="GET">
                            <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                            <input type="text" name="key" placeholder="Nhập sản phẩm cần mua">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            {{-- <i class="fa fa-phone"></i> --}}
                            <img src="{{ asset('shop/img/call.png') }}" alt="">
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0909 567 893</h5>
                            <span>Hỗ trợ hotline 24/7</span>
                        </div>
                    </div>
                </div>
                @include('layouts.slider_bar')
        </div>
    </div>
    </div>
</section>