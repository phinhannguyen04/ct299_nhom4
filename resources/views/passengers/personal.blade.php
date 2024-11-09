<style>
    body {
        /* background-color: #eef2f7; */
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
<x-flight>
        <!-- Form chính bao tất cả thông tin hành khách -->
        <form method="POST" action="" style="margin-top: 7%">
            @csrf
            <div class="container my-5" style="padding-top: 5%">
                <div class="row">
                    @php
                        $total_tickets_price = 0;    
                    @endphp
                    <!-- Cột hiển thị form nhập thông tin hành khách -->
                    <div class="col-lg-8 col-md-6 mb-4">
                        @for ($i = 1; $i <= session('totalPassengers'); $i++)
                            {{-- input ẩn --}}
                            @php 
                                $ticket = session('ticket');
                                
                                $total_tickets_price += $ticket->gia;
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
                        {{-- @php
                            $ticket = session('ticket');
                        @endphp --}}
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
                                <h4>{{ number_format($total_tickets_price) }} VND</h4>
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
</x-flight>

