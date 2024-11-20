<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán VNPay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow" style="width: 24rem;">
            <div class="card-header bg-primary text-white text-center">
                <h4>Thông Tin Thanh Toán</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('vnpay.create') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Số tiền (VND):</label>
                        <input type="number" class="form-control" name="amount" value="{{ $total_price }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="bank_code" class="form-label">Ngân hàng:</label>
                        <input type="text" class="form-control" name="bank_code" value="NCB" placeholder="Nhập mã ngân hàng">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Thanh Toán</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</small>
            </div>
        </div>
    </div>
</body>
</html>
