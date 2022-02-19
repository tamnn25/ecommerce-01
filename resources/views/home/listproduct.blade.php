 <div class="container">

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



        <div class="col-lg-12">
        @if(!empty($products))
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__text">                          
                        <div class="product-image" style="margin-bottom: 10px">
                            <a href="{{ route('product.detail', $product['id']) }}"><img src="{{ $product['thumbnail'] }}" alt="image" style="height:240px"></a>
                        </div>
                        <h5 style="margin-bottom: 10px">{{ $product['name'] }}</h5>
                        <div class="product-description">
                            <h4 style="margin-bottom: 10px">{{ number_format($product->price) }} VNĐ</h4>
                        </div>
                        <div class="product-buy">
                            <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-outline-primary">Xem thêm</a>
                        </div>
                    </div>                                            
                </div>
            </div>
            @endforeach
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

