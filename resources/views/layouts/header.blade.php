<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope text-white"></i>Theanstationery@gmail.com</li>
                            <li>Thành viên của The An Stationery sẽ nhận được ưu đãi hấp dẫn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/">Facebook</a>
                            <a href="https://twitter.com/">Instagram</a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="https://flagcdn.com/h20/vn.png" srcset="https://flagcdn.com/h40/vn.png 2x,
                                        https://flagcdn.com/h60/vn.png 3x" height="20" alt="Vietnam">
                            {{-- <img src="shop/img/language.png" alt=""> --}}
                            <div class="text-white">Tiếng Việt</div>

                        </div>

                        <div class="flex-container" style="display: inline-block;">
                            <div class="flex-item">
                                @auth
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fa fa-user"></span><span class="text"> </span><span>{{ Auth::user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color:#F5DAC1;">

                                        <li>
                                            {{-- <a class="dropdown-item" href="{{route('password.password')}}">Cập nhật hồ sơ</a>
                                        </li> --}}

                                        <li><a class="dropdown-item " href="{{route('order_user.profile')}}">Thông tin cá nhân</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('order_user.list_order')}}">Lịch sử mua sắm</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('password.password')}}">Chỉnh sửa mật khẩu</a></li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf

                                                <button style="width: 75%; margin-left: 20px" type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i><span class="text">&nbsp;Đăng xuất</span></button>

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @endauth

                                @guest
                                <div class="header__right__auth">
                                    <a class="btn btn-danger" href="{{route('login')}}">Đăng nhập</a>
                                    <a class="btn btn-danger" href="{{route('register')}}">Đăng ký</a>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('index')}}"><img src="{{ asset('shop/img/logothean.jpg') }}" height="80px" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('index')  }}">Trang chủ</a></li>
                        <li><a href="{{ route('home.shop', 0) }}">Sản phẩm</a></li>
                        <li><a href="">Kiến thức</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Kỹ năng sống</a></li>
                                <li><a href="#">Những cuốn sách hay</a></li>
                            </ul>
                        </li>
                        <li><a href="">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <div class="flex-item">
                        @include('layouts.parts.cart_number')
                    </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>


</header>
<hr style="color:#F7941F; height:4px">
<!-- Header Section End -->