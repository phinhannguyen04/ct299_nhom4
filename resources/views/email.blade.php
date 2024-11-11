<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Đặt Vé Thành Công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .email-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header text-center">
            <h2>Đặt Vé Thành Công!</h2>
        </div>
        <div class="email-body mt-4">
            <p>Xin chào <strong>{{ $ticket->passengers->name }}</strong>,</p>
            <p>Chúng tôi xin thông báo rằng bạn đã đặt vé thành công cho chuyến bay. Dưới đây là thông tin chi tiết:</p>
            
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <th>Mã Vé</th>
                        <td>{{ $ticket->mavemaybay }}</td>
                    </tr>
                    <tr>
                        <th>Chuyến Bay</th>
                        <td>{{ $ticket->chuyenbay->machuyenbay ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Ngày Bay</th>
                        <td>{{ \Carbon\Carbon::parse($ticket->chuyenbay->ngaybay)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Giờ Bay</th>
                        <td>{{ \Carbon\Carbon::parse($ticket->chuyenbay->giobay)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Hạng Vé</th>
                        <td>{{ $ticket->loaive === 'economy' ? 'Phổ Thông' : 'Thương Gia' }}</td>
                    </tr>
                    <tr>
                        <th>Khối Lượng Hành Lý</th>
                        <td>{{ $ticket->khoiluong }} kg</td>
                    </tr>
                    <tr>
                        <th>Giá Vé</th>
                        <td>{{ number_format($ticket->gia, 0, ',', '.') }} VND</td>
                    </tr>
                </tbody>
            </table>

            <p>Chúng tôi mong rằng bạn sẽ có một chuyến đi tuyệt vời. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email <a href="mailto:support@yourairline.com">support@yourairline.com</a>.</p>

            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">Xem Chi Tiết Đặt Vé</a>
            </div>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Your Airline. Tất cả các quyền được bảo lưu.</p>
        </div>
    </div>
</body>
</html>
