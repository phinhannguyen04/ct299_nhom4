<style>

    /* Thiết kế thẻ vé */
    .ticket-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Thêm đổ bóng */
    }

    .ticket-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        /* Tăng cường đổ bóng khi hover */
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
<x-flight>
    <div class="container my-0">
        @foreach (session('flights') as $flight)
            <div class="row">
                <!-- Danh sách vé -->
                <div class="col-md-8 mx-auto">
                    <div class="row d-flex align-items-center justify-content-center" style="min-height: 120vh">
                        <!-- Vé mẫu Economy -->
                        <div class="col-6">
                            <div class="card ticket-card p-4 shadow-sm">
                                <h2 class="card-title text-center">
                                    Vé máy bay
                                </h2>
                                <div class="ticket-info d-flex justify-content-between mb-3">
                                    <div class="text-center">
                                        <h5>
                                            {{ $flight->sanbayXuatphat->thanhpho }}
                                        </h5>
                                        <span>{{ $flight->sanbayXuatphat->ten }}</span>
                                    </div>
                                    <div class="text-center align-self-center">
                                        <p>⟶</p>
                                    </div>
                                    <div class="text-center">
                                        <h5>
                                            {{ $flight->sanbayDiemden->thanhpho }}
                                        </h5>
                                        <span>{{ $flight->sanbayDiemden->ten }}</span>
                                    </div>
                                </div>
                                <p>
                                    <strong>Thời gian:</strong> {{ $flight->giobay }} - {{ $flight->gioden }}
                                </p>
                                <p>
                                    <strong>Ngày:</strong>
                                    {{ date('d-m-Y', strtotime($flight->ngaybay)) }}
                                </p>
                                <p>
                                    <strong>Máy bay:</strong> {{ $flight->tenmaybay }}
                                </p>
                                <p>
                                    <strong>Mã chuyến bay:</strong> {{ $flight->machuyenbay }}
                                </p>
                                <div class="price text-center">
                                    <h4>{{ number_format($flight->giaghephothong) }} VND</h4>
                                </div>
                                <div class="ticket-type text-center">
                                    Economy
                                </div>

                                <form action="" method="post">
                                    @csrf
                                    <!-- Trường ẩn chứa ID chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_id" 
                                        value="{{ $flight->id }}" 
                                    />
                                    <!-- Trường ẩn chứa mã chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_mavemaybay"
                                        value="{{ $flight->machuyenbay }}" 
                                    />
                                    <!-- Trường ẩn chứa loại vé của chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_price"
                                        value="{{ $flight->giaghephothong }}" 
                                    />
                                    {{-- Trường ấn chứa số lượng hành khách --}}
                                    @php
                                        $totalPassengers = session('totalPassengers')    
                                    @endphp
                                    <input 
                                        type="hidden" 
                                        name="totalPassengers"
                                        value="{{ $totalPassengers }}" 
                                    />
                                    <button 
                                        type="submit"
                                        class="btn btn-primary w-100 mt-3"
                                    >
                                        Đặt vé
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Vé mẫu Business -->
                        <div class="col-6">
                            <div class="card ticket-card p-4 shadow-sm">
                                <h2 class="card-title text-center">
                                    Vé máy bay
                                </h2>
                                <div class="ticket-info d-flex justify-content-between mb-3">
                                    <div class="text-center">
                                        <h5>
                                            {{ $flight->sanbayXuatphat->thanhpho }}
                                        </h5>
                                        <span>{{ $flight->sanbayXuatphat->ten }}</span>
                                    </div>
                                    <div class="text-center align-self-center">
                                        <p>⟶</p>
                                    </div>
                                    <div class="text-center">
                                        <h5>
                                            {{ $flight->sanbayDiemden->thanhpho }}
                                        </h5>
                                        <span>{{ $flight->sanbayDiemden->ten }}</span>
                                    </div>
                                </div>
                                <p>
                                    <strong>Thời gian:</strong> {{ $flight->giobay }} - {{ $flight->gioden }}
                                </p>
                                <p>
                                    <strong>Ngày:</strong>
                                    {{ date('d-m-Y', strtotime($flight->ngaybay)) }}
                                </p>
                                <p>
                                    <strong>Máy bay:</strong> {{ $flight->tenmaybay }}
                                </p>
                                <p>
                                    <strong>Mã chuyến bay:</strong> {{ $flight->machuyenbay }}
                                </p>
                                <div class="price text-center">
                                    <h4>{{ number_format($flight->giaghethuonggia) }} VND</h4>
                                </div>
                                <div class="ticket-type text-center">
                                    Bussiness
                                </div>

                                <form action="" method="post">
                                    @csrf
                                    <!-- Trường ẩn chứa ID chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_id" 
                                        value="{{ $flight->id }}" 
                                    />
                                    <!-- Trường ẩn chứa mã chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_mavemaybay"
                                        value="{{ $flight->machuyenbay }}" 
                                    />
                                    <!-- Trường ẩn chứa loại vé của chuyến bay -->
                                    <input 
                                        type="hidden" 
                                        name="flight_price"
                                        value="{{ $flight->giaghethuonggia }}" 
                                    />
                                    {{-- Trường ấn chứa số lượng hành khách --}}
                                    @php
                                        $totalPassengers = session('totalPassengers')    
                                    @endphp
                                    <input 
                                        type="hidden" 
                                        name="totalPassengers"
                                        value="{{ $totalPassengers }}" 
                                    />
                                    <button type="submit" class="btn btn-primary w-100 mt-3">
                                        Đặt vé
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-flight>


