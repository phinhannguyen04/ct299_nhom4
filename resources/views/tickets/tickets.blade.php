<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Vé Máy Bay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thay đổi màu nền cho body */
        body {
            background-color: #f5f7fa;
        }
        /* Thiết kế thẻ vé */
        .ticket-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm đổ bóng */
        }
        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Tăng cường đổ bóng khi hover */
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
        .passenger-count {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="container navbar navbar-expand-lg navbar-light bg-light p-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vé Máy Bay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
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
                <a class="btn btn-outline-primary me-2" href="#" role="button">Đăng Nhập</a>
                <a class="btn btn-primary" href="#" role="button">Đăng Ký</a>
            </div>
        </div>
    </nav>

    <div class="container my-0">
        @foreach (session('flights') as $flight)
            <div class="row">
                <!-- Danh sách vé -->
                <div class="col-md-8 mx-auto">
                    <div class="row d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                        <!-- Vé mẫu Economy -->
                        <div class="col-6">
                            <div class="card ticket-card p-4 shadow-sm">
                                <h2 class="card-title text-center">Vé máy bay</h2>
                                <div class="ticket-info d-flex justify-content-between mb-3">
                                    <div class="text-center">
                                        <h5>{{ $flight->sanbayXuatphat->thanhpho}}</h5>
                                        <span>{{ $flight->sanbayXuatphat->ten}}</span>
                                    </div>
                                    <div class="text-center align-self-center">
                                        <p>⟶</p>
                                    </div>
                                    <div class="text-center">
                                        <h5>{{ $flight->sanbayDiemden->thanhpho}}</h5>
                                        <span>{{ $flight->sanbayDiemden->ten}}</span>
                                    </div>
                                </div>
                                <p><strong>Thời gian:</strong> {{ $flight->giobay }} - {{ $flight->gioden }}</p>
                                <p><strong>Ngày:</strong> {{ date('d/m/y', strtotime($flight->ngaybay)) }}</p>
                                <p><strong>Máy bay:</strong> {{ $flight->tenmaybay }}</p>
                                <p><strong>Mã chuyến bay:</strong> {{ $flight->machuyenbay }}</p>
                                <div class="price text-center">
                                    <h4>{{ $flight->giaghephothong}}VND</h4>
                                </div>
                                <div class="ticket-type text-center">Economy</div>
                                
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="flight_id" value="{{ $flight->id }}"> <!-- Trường ẩn chứa ID chuyến bay -->
                                    <input type="hidden" name="flight_mavemaybay" value="{{ $flight->machuyenbay }}"> <!-- Trường ẩn chứa mã chuyến bay -->
                                    <input type="hidden" name="flight_business" value="{{ $flight->giaghephothong }}"> <!-- Trường ẩn chứa loại vé của chuyến bay -->
                                    <button class="btn btn-primary w-100 mt-3">Đặt vé</button>
                                </form>

                            </div>
                        </div>
                        <!-- Vé mẫu Business -->
                        <div class="col-6">
                            <div class="card ticket-card p-4 shadow-sm">
                                <h2 class="card-title text-center">Vé máy bay</h2>
                                <div class="ticket-info d-flex justify-content-between mb-3">
                                    <div class="text-center">
                                        <h5>{{ $flight->sanbayXuatphat->thanhpho}}</h5>
                                        <span>{{ $flight->sanbayXuatphat->ten}}</span>
                                    </div>
                                    <div class="text-center align-self-center">
                                        <p>⟶</p>
                                    </div>
                                    <div class="text-center">
                                        <h5>{{ $flight->sanbayDiemden->thanhpho}}</h5>
                                        <span>{{ $flight->sanbayDiemden->ten}}</span>
                                    </div>
                                </div>
                                <p><strong>Thời gian:</strong> {{ $flight->giobay }} - {{ $flight->gioden }}</p>
                                <p><strong>Ngày:</strong> {{ date('d/m/y', strtotime($flight->ngaybay)) }}</p>
                                <p><strong>Máy bay:</strong> {{ $flight->tenmaybay }}</p>
                                <p><strong>Mã chuyến bay:</strong> {{ $flight->machuyenbay }}</p>
                                <div class="price text-center">
                                    <h4>{{ $flight->giaghethuonggia}}VND</h4>
                                </div>
                                <div class="ticket-type text-center">Bussiness</div>
                                
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="flight_id" value="{{ $flight->id }}"> <!-- Trường ẩn chứa ID chuyến bay -->
                                    <input type="hidden" name="flight_mavemaybay" value="{{ $flight->machuyenbay }}"> <!-- Trường ẩn chứa mã chuyến bay -->
                                    <input type="hidden" name="flight_business" value="{{ $flight->giaghethuonggia }}"> <!-- Trường ẩn chứa loại vé của chuyến bay -->
                                    <button class="btn btn-primary w-100 mt-3">Đặt vé</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
