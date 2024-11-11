<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán VNPay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Thanh Toán VNPay</h2>
        <form action="{{ route('vnpay.create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="amount" class="form-label">Số tiền (VND):</label>
                <input type="number" class="form-control" name="amount" value="{{ $total_price }}" readonly required>
            </div>
            <div class="mb-3">
                <label for="bank_code" class="form-label">Ngân hàng:</label>
                <input type="text" class="form-control" name="bank_code">
            </div>
            <button type="submit" class="btn btn-primary">Thanh Toán</button>
        </form>
    </div>
</body>
</html>
