@section('content')
@extends('layouts.master')

<!-- Humberger End -->

<!-- Header Section Begin -->

<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Kinh tế</a></li>
                        <li><a href="#">Tâm lý - Kỹ năng sống</a></li>
                        <li><a href="#">Nuôi dạy con</a></li>
                        <li><a href="#">Sách thiếu nhi</a></li>
                        <li><a href="#">Tiểu sử - Hồi ký</a></li>
                        <li><a href="#">Sách ngoại ngữ</a></li>
                        <li><a href="#">Sách mới</a></li>
                        <li><a href="#">Sách bán chạy</a></li>
                        <li><a href="#">Dụng cụ học sinh</a></li>
                        <li><a href="#">Bách hóa lưu niệm</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">

                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('shop/img/breadcrumb-1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang Chủ</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Danh mục sản phẩm</h4>
                        <ul>
                            <li><a href="#">Tất cả</a></li>
                            <li><a href="#">Văn học</a></li>
                            <li><a href="#">Kinh tế</a></li>
                            <li><a href="#">Tâm lý - Kỹ năng sống</a></li>
                            <li><a href="#">Nuôi dạy con</a></li>
                            <li><a href="#">Sách ngoại ngữ</a></li>
                            <li><a href="#">Sách mới</a></li>
                            <li><a href="#">Sách bán chạy</a></li>
                            <li><a href="#">Dụng cụ học sinh</a></li>
                            <li><a href="#">Bách hóa lưu niệm</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin tức gần đây</h4>
                        <div class="blog__sidebar__recent">
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{ asset('shop/img/blog/sidebar/sr-1.jpg') }}" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>09 quyển sách hay <br />nuôi dạy con tốt</h6>
                                    <span>Tháng 3, 2019</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{ asset('shop/img/blog/sidebar/sr-2.jpg') }}" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>Mẹo bán hàng<br /> dành cho dân kinh doanh</h6>
                                    <span>Tháng 3, 2019</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{ asset('shop/img/blog/sidebar/sr-3.jpg') }}" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>4 loại bút mà học sinh <br />tiểu học cần</h6>
                                    <span>Tháng 3, 2019</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tìm kiếm theo</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Sách bán chạy</a>
                            <a href="#">Sắc đẹp</a>
                            <a href="#">Sức khỏe</a>
                            <a href="#">Trí tuệ</a>
                            <a href="#">Kỹ năng sống</a>
                            <a href="#">Phong cách sống</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-2.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> Tháng 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">6 điều mà bạn cần chuẩn bị trước khi 30</a></h5>
                                <p>Có người bảo đời người chỉ bắt đầu khi ta 30 tuổi. Nhưng để có một tuổi 30 trong mơ, 29 năm trước bạn cần phải chuẩn bị nhiều thứ...</p>
                                <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-3.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Tham quan trang trại sạch ở Mỹ</a></h5>
                                <p>Nhà kho là nơi dùng để chứa các dụng cụ làm vườn và chăm bón cây, cứ vài tuần sẽ có người đến dọn dẹp sạch sẽ một lần...</p>
                                <a href="#" class="blog__btn">Xem thêm<span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-1.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Mẹo nấu ăn giúp việc nấu ăn trở nên đơn giản</a></h5>
                                <p>1. Đối với trứng · 2. Nghiền khoai tây bằng sữa ấm · 3. Không để chảo quá tải · 4. Áp chảo thịt bằng chảo không dính...</p>
                                <a href="#" class="blog__btn">Xem thêm<span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-4.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Mẹo nấu ăn giúp việc nấu ăn trở nên đơn giản</a></h5>
                                <p>1. Đối với trứng · 2. Nghiền khoai tây bằng sữa ấm · 3. Không để chảo quá tải · 4. Áp chảo thịt bằng chảo không dính...</p>
                                <a href="#" class="blog__btn">Xem thêm<span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-4.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Tham quan trang trại sạch ở Mỹ</a></h5>
                                <p>Nhà kho là nơi dùng để chứa các dụng cụ làm vườn và chăm bón cây, cứ vài tuần sẽ có người đến dọn dẹp sạch sẽ một lần...</p>
                                <a href="#" class="blog__btn">Xem thêm<span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('shop/img/blog/blog-6.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Tham quan trang trại sạch ở Mỹ</a></h5>
                                <p>Nhà kho là nơi dùng để chứa các dụng cụ làm vườn và chăm bón cây, cứ vài tuần sẽ có người đến dọn dẹp sạch sẽ một lần...</p>
                                <a href="#" class="blog__btn">Xem thêm<span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
<!-- Footer Section Begin -->