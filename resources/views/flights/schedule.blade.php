<style>
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
<x-flight>
    <div class="container my-5">
        <!-- Hiển thị thông tin chuyến bay -->
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Mã Chuyến Bay</th>
                    <th>Xuất Phát</th>
                    <th>Điểm Đến</th>
                    <th>Ngày Bay</th>
                    <th>Ngày Đến</th>
                    <th>Giờ Bay</th>
                    <th>Giờ Đến</th>
                    <th>Sức Chứa</th>
                    <th>Tên Máy Bay</th>
                    <th>Giá Ghế Phổ Thông</th>
                    <th>Giá Ghế Thương Gia</th>
                </tr>
            </thead>
            <tbody>
                <!-- Vòng lặp hiển thị các chuyến bay -->
                @foreach ($flights as $flight)
                    <tr>
                        <td>{{ $flight->machuyenbay }}</td>
                        <td>{{ $flight->sanbayXuatphat->thanhpho }}</td>
                        <td>{{ $flight->sanbayDiemden->thanhpho }}</td>
                        <td>{{ date('d/m/Y', strtotime($flight->ngaybay)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($flight->ngayden)) }}</td>
                        <td>{{ date('H:i', strtotime($flight->giobay)) }}</td>
                        <td>{{ date('H:i', strtotime($flight->gioden)) }}</td>
                        <td>{{ $flight->succhua }}</td>
                        <td>{{ $flight->tenmaybay }}</td>
                        <td>{{ number_format($flight->giaghephothong) }} VND</td>
                        <td>{{ number_format($flight->giaghethuonggia) }} VND</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-flight>
