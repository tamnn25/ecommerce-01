@section('content')
@extends('layouts.master')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('shop/img/banner01.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên hệ</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Liên hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container border border-3 rounded-3 mt-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight mt-3">
                    <div class="mb-2">
                        <h3 style="text-transform: uppercase;">Về chúng tôi</h3>
                    </div>
                    <div class="content">
                        <h4 class="mb-2">Giới thiệu về The An Stationery</h4>
                        <p>
                            Văn phòng phẩm The An là đơn vị chuyên cung cấp văn phòng phẩm như giấy in, 
                            bút viết, fule hồ sơ, băng keo,.. với chất lượng phục vụ tốt nhất, 
                            giao hàng nhanh nhất tại TP. Huế. Qúy khách hàng có thể hoàn toàn hài lòng về chúng tôi.
                        </p>
                        <p>
                            Quý khách liên lạc, trao đổi hoặc đóng góp ý kiến, vui lòng:
                        </p>
                        <ul class="ml-4" style="color: #6f6f6f;">
                            <li>Liên lạc qua điện thoại/zalo: 0909 567 893</li>
                            <li>Liên lạc qua email: <a href="#">Theanstationery@gmail.com</a></li>
                            <li>Fanpage của The An Stationery <a href="#">https://www.facebook.com/vanphongphamthean</a></li>
                        </ul>
                    </div>
                </div>
                <div class="p-2 flex-shrink-0 bd-highlight">
                    <img src="../shop/img/logothean.jpg" alt="" height="300px">

                </div>
            </div>
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <div class="content mt-4">
                        <h4 class="mb-2">Định hướng hoạt động</h4>
                        <p>
                            The An Stationery ra đời với mong muốn mang sự tiện lợi cho khách hàng có nhu cầu văn phòng phẩm, 
                            học cụ, sản phẩm mỹ thuật có thể dễ dàng tiếp cận và chọn mua sản phẩm một cách nhanh chóng. 
                            Ngoài ra, The An Stationery còn mong muốn thay đổi thói quen tiêu dùng chọn mua văn phòng phẩm truyền thống, 
                            đem đến cho khách hàng một hệ thống cung cấp các sản phẩm văn phòng, giáo dục trực tuyến một nơi uy tín 
                            và đáng tin cậy.
                            The An Stationery đặt mục tiêu trở thành sàn thương mại điện tử hàng đầu Việt Nam chuyên về sản phẩm văn phòng, học cụ, dụng cụ mỹ thuật và tất cả các sản phẩm liên quan đến giáo dục.
                        </p>
                        <div class="border px-5 mx-5">
                            <img src="https://ecci.com.vn/wp-content/uploads/2022/03/van-phong-pham.jpg" alt="" height="450px">
                        </div>
                    </div>
                    <div class="content mt-4">
                        <h4 class="mb-2">Hệ thống phân phối</h4>
                        <p>
                            The An Stationery ra đời với mong muốn mang sự tiện lợi cho khách hàng có nhu cầu văn phòng phẩm, 
                            học cụ, sản phẩm mỹ thuật có thể dễ dàng tiếp cận và chọn mua sản phẩm một cách nhanh chóng. 
                            Ngoài ra, The An Stationery còn mong muốn thay đổi thói quen tiêu dùng chọn mua văn phòng phẩm truyền thống, 
                            đem đến cho khách hàng một hệ thống cung cấp các sản phẩm văn phòng, giáo dục trực tuyến một nơi uy tín 
                            và đáng tin cậy.
                            The An Stationery đặt mục tiêu trở thành sàn thương mại điện tử hàng đầu Việt Nam chuyên về sản phẩm văn phòng, học cụ, dụng cụ mỹ thuật và tất cả các sản phẩm liên quan đến giáo dục.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection