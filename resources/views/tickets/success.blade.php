<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Vé Thành Công</title>
    <!-- Link Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center p-5" role="alert">
            <h1 class="alert-heading">Đặt Vé Thành Công!</h1>
            <p class="fs-5">Cảm ơn bạn đã đặt vé với chúng tôi. Thông tin vé của bạn đã được gửi đến email của bạn.</p>
            <hr>
            <p class="mb-4">Vui lòng kiểm tra email để biết thêm chi tiết. Chúc bạn có một chuyến đi an toàn và vui vẻ!</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Quay Về Trang Chủ</a>
            {{-- <a href="/my-tickets" class="btn btn-secondary">Xem Vé Của Tôi</a> --}}
        </div>
    </div>

    <!-- Link Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
