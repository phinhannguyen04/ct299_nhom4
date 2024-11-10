<x-flight>
    @include('layouts.flight-search', ['sanbays' => $sanbays])
    <!--pos page inner-->
    <div class="container">
        <!--pos home section-->
        <div class=" pos_section">
            <div class="row pos_home">
                <div class="col-lg-12 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider slider_1">
                        <div class="slider_active owl-carousel">
                            <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.png)">
                            </div>
                            <div class="single_slider" style="background-image: url(assets/img/slider/5.png)">

                            </div>
                            <div class="single_slider" style="background-image: url(assets/img/slider/6.png)">
                            </div>
                        </div>
                    </div>
                    <!--banner slider start-->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row pos_home">
                <!--categorie menu end-->
                <div class="col-lg-12 col-md-12">
                    <!--banner slider start-->
                    <!--banner slider start-->
                    <div class="blog_area">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="#"><img src="{{ asset('assets/img/slider/the_1.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog_content">
                                        <h3><a href="#">An tâm trọn vẹn bay cùng Galaxy.</a></h3>
                                        <p>Các chương trình bảo hiểm hấp dẫn đến từ các đối tác bảo hiểm uy tín của
                                            Galaxy. Thủ tục mua và bồi thường đơn giản, nhanh chóng.</p>
                                        <div class="post_footer">
                                            <div class="post_meta">
                                                <ul>
                                                    <li>20/10/2024</li>
                                                    <li>3 Bình luận</li>
                                                </ul>
                                            </div>
                                            <div class="Read_more">
                                                <a href="#">Đọc thêm... <i
                                                        class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/slider/swift2471592284169014-1695094650429.webp') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog_content">
                                        <h3><a href="#">Vận chuyển Bắc-Trung-Nam siêu tốc, siêu
                                                tiện lợi.</a></h3>
                                        <p>Rút ngắn khoảng cách hàng nghìn km trong thời gian ngắn nhất.</p>
                                        <div class="post_footer">
                                            <div class="post_meta">
                                                <ul>
                                                    <li>21/10/2024</li>
                                                    <li>10 Bình luận</li>
                                                </ul>
                                            </div>
                                            <div class="Read_more">
                                                <a href="#">Đọc thêm...<i
                                                        class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="#"><img src=" {{ asset('assets/img/slider/the_2.png') }} "
                                                alt=""></a>
                                    </div>
                                    <div class="blog_content">
                                        <h3><a href="#">Ưu đãi dành cho thẻ chủ mới.</a></h3>
                                        <p>Ưu tin check-in tại sân bay dành cho thẻ Platium. Giảm 50% du lịch, mua
                                            sắm, ăn uống giúp hàng khách tiết kiệm chi phí</p>
                                        <div class="post_footer">
                                            <div class="post_meta">
                                                <ul>
                                                    <li>25/01/2024</li>
                                                    <li>5 Bình luận</li>
                                                </ul>
                                            </div>
                                            <div class="Read_more">
                                                <a href="#">Đọc thêm...<i
                                                        class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="banner_slider mb-35">
                        <img src= "{{ asset('assets/img/banner/image.png') }}" alt="">
                    </div>
                    <div class="featured-products">
                        <div class="product-grid">
                            <!-- Thẻ sản phẩm 1 -->
                            <div class="product-item">
                                <span class="label">Khách sạn</span>
                                <img src="{{ asset('assets/img/banner/ks.png') }}" alt="Khách sạn"
                                    class="product-image">
                            </div>
                            <div class="product-item">
                                <span class="label">Du Lịch Thế Giới</span>
                                <img src="{{ asset('assets/img/banner/dltg.png') }} " alt="dltg"
                                    class="product-image">
                            </div>
                            <div class="product-item">
                                <span class="label">Săn Vé Giá Rẻ</span>
                                <img src="{{ asset('assets/img/banner/svgr.png') }}" alt="svgr"
                                    class="product-image">
                            </div>
                            <div class="product-item">
                                <span class="label">Địa Điểm Nổi Bật</span>
                                <a href="{{ url('view/diadiem-gialai') }}">
                                    <img src=" {{ asset('assets/img/banner/gialai.png') }} " alt="ddnb"
                                        class="product-image">
                                </a>
                            </div>
                            <div class="product-item">
                                <a href="{{ url('view/diadiem-nghean') }}"><img
                                        src=" {{ asset('assets/img/banner/nghena.png') }}" alt="nghean"
                                        class="product-image"></a>
                            </div>
                            <div class="product-item">
                                <a href="{{ url('view/diadiem-phuquoc') }}"><img
                                        src=" {{ asset('assets/img/banner/phuquoc.png') }}" alt="phuquoc"
                                        class="product-image"></a>
                            </div>
                            <div class="product-item">
                                <a href="{{ url('view/diadiem-quangbinh') }}"><img
                                        src=" {{ asset('assets/img/banner/quangbing.png') }}" alt="quangbinh"
                                        class="product-image"></a>
                            </div>
                            <div class="product-item">
                                <a href="{{ url('view/diadiem-thanhhoa') }}"><img
                                        src=" {{ asset('assets/img/banner/thanh hoa.png') }}" alt="thanhhoa"
                                        class="product-image"></a>
                            </div>
                            <div class="product-item">
                                <a href="{{ url('view/diadiem-hanoi') }}"><img
                                        src="{{ asset('assets/img/banner/hanoi.png') }}" alt="hanoi"
                                        class="product-image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--pos home section end-->
    @include('layouts.map')
</x-flight>
