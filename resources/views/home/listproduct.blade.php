 <div class="">

    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Sản phẩm của chúng tôi</h2>
            </div>
        </div>

        @if(!empty($categories))
        @foreach ($categories as $category)
            <div class="col-lg-12 d-flex flex-wrap row">
                <div class="row category-title"><h4><b>{{ $category->name }}</b><h4><hr></div>
                @foreach($category->products as $item)
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="product__item">
                        <div class="product__item__pic" style="height: 200px;" onclick="location.href=`{{ route('product.detail', $item->id) }}`">
                            <img class="product__details__pic__item--large" src="{{ asset('/'.$item->thumbnail) }}"  alt="{{ $item->image }}">    
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart mt-2"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet mt-2"></i></a></li>
                                <li><a href="{{ route('product.detail', $item->id) }}"><i class="fa fa-shopping-cart mt-2"></i></a></li>
                            </ul>
                        </div>
                    
                        <div class="product__item__text">
                            <h6><a href="{{ route('product.detail', $item) }}"><strong>{{ $item->name }}</strong></a></h6>
                            <span>{{ number_format($item->price ) . '   VNĐ'  }}</span>
                            <div class="product-buy">
                                <a href="{{ route('product.detail', $item) }}" class="btn btn-outline-success">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
        @endif
    </div>
 </div>
 <div class="row featured__filter" id="loadProduct">
     {{-- phần để slide đổ thông tin sản phẩn ra  không dc xóa --}}
 </div>
 </div>