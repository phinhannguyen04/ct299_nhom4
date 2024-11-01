<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đặt Vé Máy Bay</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            body {
                background-color: #f5f7fa;
            }
            .ticket-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .ticket-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            }
            .price {
                color: #27ae60;
                font-size: 1.5em;
            }
            .ticket-type {
                color: #3498db;
                font-size: 0.85em;
                font-weight: bold;
                margin-top: 5px;
            }
            .form-container {
                max-width: 100%;
                margin: auto;
                padding: 1rem;
                background-color: #ffffff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .form-label {
                font-weight: 600;
            }
            .btn-submit {
                width: auto;
                min-width: 100px;
            }
        </style>
    </head>
    <body>
        <nav
            class="container navbar navbar-expand-lg navbar-light bg-light p-4"
        >
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Vé Máy Bay</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarNav"
                >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="#"
                                >Trang Chủ</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vé</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chuyến bay</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a
                        class="btn btn-outline-primary me-2"
                        href="#"
                        role="button"
                        >Đăng Nhập</a
                    >
                    <a class="btn btn-primary" href="#" role="button"
                        >Đăng Ký</a
                    >
                </div>
            </div>
        </nav>

        <div class="container my-5">
            <div class="row">
                <!-- Cột 3/5 hiển thị form -->
                <div class="col-lg-8 col-md-6">
                    <div class="card form-container shadow-sm">
                        <h3 class="text-center mb-4">Thông tin hành khách</h3>
                        <form>
                            <!-- Họ và tên, Số CCCD/CMND -->
                            <div class="card mb-3 p-3 shadow-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label"
                                            >Họ và tên</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Nhập họ và tên"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="idNumber" 
                                            class="form-label"
                                        >
                                            Số CCCD/CMND
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="idNumber"
                                            placeholder="Nhập số CCCD/CMND"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Email, Số điện thoại -->
                            <div class="card mb-3 p-3 shadow-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label"
                                            >Email</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            placeholder="Nhập email"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label"
                                            >Số điện thoại</label
                                        >
                                        <input
                                            type="tel"
                                            class="form-control"
                                            id="phone"
                                            placeholder="Nhập số điện thoại"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="card mb-3 p-3 shadow-sm">
                                <label for="address" class="form-label"
                                    >Địa chỉ</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Nhập địa chỉ"
                                />
                            </div>

                            <div class="text-end">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-submit"
                                >
                                    Đặt vé
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Cột 2/5 hiển thị thông tin vé -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card ticket-card p-4 shadow-sm">
                        <h2 class="card-title text-center">Vé máy bay</h2>
                        <div
                            class="ticket-info d-flex justify-content-between mb-3"
                        >
                            <div class="text-center">
                                <h5>Thành phố Xuất phát</h5>
                                <span>Sân bay Xuất phát</span>
                            </div>
                            <div class="text-center align-self-center">
                                <p>⟶</p>
                            </div>
                            <div class="text-center">
                                <h5>Thành phố Đến</h5>
                                <span>Sân bay Đến</span>
                            </div>
                        </div>
                        <p><strong>Thời gian:</strong> Giờ bay - Giờ đến</p>
                        <p><strong>Ngày:</strong> Ngày bay</p>
                        <p><strong>Máy bay:</strong> Tên máy bay</p>
                        <p><strong>Mã chuyến bay:</strong> Mã chuyến bay</p>
                        <div class="price text-center">
                            <h4>Giá VND</h4>
                        </div>
                        <div class="ticket-type text-center">Loại vé</div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>