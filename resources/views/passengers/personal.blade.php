<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt Vé Máy Bay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #3498db;
        }

        .navbar-brand, .nav-link, .btn {
            color: #fff !important;
        }

        .ticket-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .price {
            color: #27ae60;
            font-size: 1.75em;
        }

        .form-container {
            max-width: 100%;
            padding: 1.5rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }

        .btn-submit {
            width: auto;
            min-width: 150px;
            background-color: #3498db;
            border: none;
            color: #fff;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vé Máy Bay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="btn btn-outline-light me-2" href="#" role="button">Đăng Nhập</a>
                <a class="btn btn-light" href="#" role="button">Đăng Ký</a>
            </div>
        </div>
    </nav>

    <!-- Form chính bao tất cả thông tin hành khách -->
    <form method="POST" action="">
        @csrf
        <div class="container my-5">
            <div class="row">
                <!-- Cột hiển thị form nhập thông tin hành khách -->
                <div class="col-lg-8 col-md-6 mb-4">
                    @for ($i = 1; $i <= session('totalPassengers'); $i++)
                        {{-- input ẩn --}}
                        @php 
                            $ticket = session('ticket');
                        @endphp
    
                        @if ($ticket)
                        <input
                            name="passengers[{{ $i }}][ticket_chuyenbay_id]"
                            type="hidden"
                            value="{{ $ticket->chuyenbay_id }}"
                        />
                        <input
                            name="passengers[{{ $i }}][ticket_id]"
                            type="hidden"
                            value="{{ $ticket->id }}"
                        />
                        <input
                            name="passengers[{{ $i }}][ticket_loaive]"
                            type="hidden"
                            value="{{ $ticket->loaive }}"
                        />
                            @endif
                                    
                        <!-- Form thông tin hành khách -->
                        <div class="card form-container mb-4">
                            <h3 class="text-center mb-4">Thông tin hành khách {{ $i }}</h3>
                            <!-- Họ và tên, Số CCCD/CMND -->
                            <div class="card mb-3 p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name_{{ $i }}" class="form-label">Họ và tên</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="name_{{ $i }}" 
                                            name="passengers[{{ $i }}][name]"
                                            placeholder="Nhập họ và tên"
                                            required 
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="idNumber_{{ $i }}" class="form-label">Số CCCD/CMND</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="idNumber_{{ $i }}"
                                            name="passengers[{{ $i }}][cccd]"
                                            placeholder="Nhập số CCCD/CMND"
                                            required 
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Email, Số điện thoại -->
                            <div class="card mb-3 p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email_{{ $i }}" class="form-label">Email</label>
                                        <input 
                                            type="email" 
                                            class="form-control" 
                                            id="email_{{ $i }}"
                                            name="passengers[{{ $i }}][email]"
                                            placeholder="Nhập email" 
                                            required
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_{{ $i }}" class="form-label">Số điện thoại</label>
                                        <input 
                                            type="tel" 
                                            class="form-control"
                                            name="passengers[{{ $i }}][sdt]" 
                                            id="phone_{{ $i }}"
                                            placeholder="Nhập số điện thoại" 
                                            required
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="card mb-3 p-3">
                                <label for="address_{{ $i }}" class="form-label">Địa chỉ</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="address_{{ $i }}" 
                                    name="passengers[{{ $i }}][diachi]"
                                    placeholder="Nhập địa chỉ"
                                    required 
                                />
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Cột hiển thị thông tin vé -->
                <div class="col-lg-4 col-md-6 mb-4">
                    @php
                        $ticket = session('ticket');
                    @endphp
                    <div class="card ticket-card p-4">
                        <h2 class="card-title text-center">Vé máy bay</h2>
                        <div class="ticket-info d-flex justify-content-between mb-3">
                            <div class="text-center">
                                <h5>{{ $ticket->chuyenbay->sanbayXuatphat->thanpho }}</h5>
                                <span>{{ $ticket->chuyenbay->sanbayXuatphat->ten }}</span>
                            </div>
                            <div class="text-center align-self-center">
                                <p>⟶</p>
                            </div>
                            <div class="text-center">
                                <h5>{{ $ticket->chuyenbay->sanbayDiemden->thanpho }}</h5>
                                <span>{{ $ticket->chuyenbay->sanbayDiemden->ten }}</span>
                            </div>
                        </div>
                        <p><strong>Thời gian: </strong> {{ date('H:i', strtotime($ticket->chuyenbay->giobay)) }} -
                            {{ date('H:i', strtotime($ticket->chuyenbay->gioden)) }}</p>
                        <p><strong>Ngày: </strong>{{ date('d-m-Y', strtotime($ticket->chuyenbay->ngaybay)) }}</p>
                        <p><strong>Mã chuyến bay: </strong>{{ $ticket->chuyenbay->machuyenbay }}</p>
                        <div class="price text-center">
                            <h4>{{ number_format($ticket->gia) }} VND</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nút gửi form chính -->
        <div class="text-center my-4">
            <button type="submit" class="btn btn-submit">Đặt vé</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
