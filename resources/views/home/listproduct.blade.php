 <div class="">

    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Sản phẩm của chúng tôi</h2>
            </div>
            <!-- <div class="featured__controls">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="active" data-filter="*">
                                <a style="color:black" href="javascript:;" onclick="getProductByCategory({{ $category->id }})"> {{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
            </div> -->
        </div>

        <div class="col-lg-12 d-flex flex-wrap">
            @if(!empty($products))
                @for ($i = 1; $i <= 8; $i++) 
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('/'.$products[$i]->thumbnail) }}" style="border: 1px solid blanchedalmond;">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ route('product.detail', $products[$i]) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('product.detail', $products[$i]) }}"><strong>{{ $products[$i]->name }}</strong></a></h6>
                                <span>{{ number_format($products[$i]->price ) . '   VNĐ'  }}</span>
                                <div class="product-buy">
                                    <a href="{{ route('product.detail', $products[$i]) }}" class="btn btn-outline-success">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div> 
     <div class="row featured__filter" id="loadProduct">
         {{-- phần để slide đổ thông tin sản phẩn ra  không dc xóa --}}
    </div>
</div>
@section('scripts')
    <script>

        $(document).ready(function() {
            getProductByCategory(3); //gọi hàm getProductByCategory
        });//chạy sau khi load trang xong
        function getProductByCategory(id) {
            var url = `{{ url('/product/category' ) }}`+'/'+id; //đi đén route
            $.ajax({
                url: url, 
                type: 'GET',
                success: function (response) {
                    $('#loadProduct').html(response.html);//load file _ajax_product.blade.php
                    console.log(response.status);
                }
            });
            
        }
    </script>
@endsection

