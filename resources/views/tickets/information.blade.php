<x-flight>
@isset($ticket)
<section class="container" style="margin-top: 7%">
    <h1 class="text-bold mt-4 p-4">Thông tin vé máy bay</h1>
    <div class="card mb-4 shadow-sm">
        {{-- <div class="card-header bg-primary text-white">
            <h5 class="card-title">Thông Tin Vé Máy Bay</h5>
        </div> --}}
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Mã Vé:</strong> {{ $ticket->mavemaybay }}
                </li>
                <li class="list-group-item">
                    <strong>Mã Chuyến Bay:</strong> {{ $ticket->chuyenbay_id }}
                </li>
                <li class="list-group-item">
                    <strong>Mã Chỗ Ngồi:</strong> {{ $ticket->chongoi_id }}
                </li>
                <li class="list-group-item">
                    <strong>Người Dùng:</strong> {{ $ticket->user_id ? 'ID: ' . $ticket->user_id : 'Khách' }}
                </li>
                <li class="list-group-item">
                    <strong>Ngày Mua:</strong> {{ \Carbon\Carbon::parse($ticket->ngaymua)->format('d/m/Y') }}
                </li>
                <li class="list-group-item">
                    <strong>Loại Vé:</strong> {{ $ticket->loaive === 'economy' ? 'Phổ Thông' : 'Thương Gia' }}
                </li>
                <li class="list-group-item">
                    <strong>Khối Lượng Hành Lý:</strong> {{ $ticket->khoiluong }} kg
                </li>
                <li class="list-group-item">
                    <strong>Giá Vé:</strong> {{ number_format($ticket->gia, 0, ',', '.') }} VND
                </li>
                <li class="list-group-item">
                    <strong>Mã Khách:</strong> {{ $ticket->guest_code }}
                </li>
            </ul>
        </div>
    </div>
</section>
@else
    <p class="text-danger">Không có thông tin vé máy bay.</p>
@endisset
</x-flight>