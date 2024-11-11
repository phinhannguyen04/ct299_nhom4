<nav class="header_area">
    <!--header top-->
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Align all content to the right -->
                <div class="header_links d-flex justify-content-end align-items-center">
                    <ul class="d-flex align-items-center">
                        <!-- Support Icon -->
                        <li class="support">
                            <a href="#" title="Hỗ trợ">
                                <i class="fa fa-headphones"></i> Hỗ trợ
                            </a>
                        </li>
                        <!-- Sign Up and Login Links -->
                        <li class="ml-4">
                            <a href="my-account.html" title="Đăng ký">
                                <i class="fa fa-user"></i> Đăng ký
                            </a>
                        </li>
                        <li class="mx-2">|</li>
                        <li>
                            <a href="login.html" title="Đăng nhập">Đăng nhập</a>
                        </li>
                        <!-- Language Switcher -->
                        <li class="languages ml-4">
                            <a href="#" title="Tiếng Việt">
                                Tiếng Việt <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown_languages">
                                <li><a href="#">Tiếng Anh</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header top end-->

    <!--header middle-->
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('/assets/img/logo/image.png') }}" alt="Logo"></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-8 col-md-9">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">Đặt vé máy bay</a></li>
                                <li>
                                    <a href="#">Tra cứu thông tin chuyến bay</a>
                                    <!-- Search dropdown menu -->
                                    <div class="search-dropdown">
                                        <div
                                            class="border border-secondary rounded p-4 shadow search-form-container">
                                            <form id="ticketSearchForm" method="POST" action="{{ url('tickets/information') }}">
                                                @csrf
                                                <h4 class="mb-3">Tìm Vé Máy Bay</h4>
                                                <div class="mb-3">
                                                    <label for="ticketCode" class="form-label">Nhập mã
                                                        vé:</label>
                                                    <input type="text" class="form-control" id="ticketCode" name="mavemaybay"
                                                        placeholder="Nhập mã vé" required>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button type="submit" class="btn-search"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Tìm vé
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin vé máy bay</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <p><strong>Mã vé:</strong> <span id="modalTicketCode">Mã vé của bạn sẽ được hiển
                                        thị ở đây</span></p>
                                <p><strong>Chuyến bay:</strong> HAN ⟶ SGN</p>
                                <p><strong>Ngày:</strong> 12/12/2024</p>
                                <p><strong>Giá:</strong> 1,200,000 VND</p>
                                <p><strong>Loại vé:</strong> Economy</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-1 col-md-1">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="#">
                            <input placeholder="Tìm kiếm..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>