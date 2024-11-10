<section class="product_d_info">
    <div class="row justify-content-right">
        <div class="col-12 col-md-6">
            <div class="product_d_inner">
                <div class="product_info_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                aria-selected="false">một chiều</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="sheet" role="tabpanel">
                        <div class="product_d_table">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-row mr-4">
                                    <!-- Số lượng người lớn -->
                                    <div class="form-group col-6 col-md-4">
                                        <select id="passenger-count" name="adults" class="form-control" required>
                                            <option value="1">1 người lớn</option>
                                            <option value="2">2 người lớn</option>
                                            <option value="3">3 người lớn</option>
                                            <option value="4">4 người lớn</option>
                                        </select>
                                    </div>
                
                                    <!-- Số lượng trẻ em -->
                                    <div class="form-group col-6 col-md-4">
                                        <select id="passenger-count" name="children" class="form-control" required>
                                            <option value="0">Không có trẻ em</option>
                                            <option value="1">1 trẻ em</option>
                                            <option value="2">2 trẻ em</option>
                                            <option value="3">3 trẻ em</option>
                                            <option value="4">4 trẻ em</option>
                                        </select>
                                    </div>
                
                                    <!-- Điểm khởi hành -->
                                    <div class="form-group col-12 col-md-6">
                                        <label for="departure" class="form-label">Từ</label>
                                        <select class="form-select" name="departure" id="departure">
                                            @foreach ($sanbays as $sanbay)
                                                <option value="{{ $sanbay->id }}">{{ $sanbay->ten }} - {{ $sanbay->thanhpho }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                
                                    <!-- Điểm đến -->
                                    <div class="form-group col-12 col-md-6">
                                        <label for="destination" class="form-label">Đến</label>
                                        <select class="form-select" name="destination" id="destination">
                                            @foreach ($sanbays as $sanbay)
                                                <option value="{{ $sanbay->id }}">{{ $sanbay->ten }} - {{ $sanbay->thanhpho }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                
                                    <!-- Ngày khởi hành -->
                                    <div class="form-group col-12 col-md-6">
                                        <label for="departure-date" class="form-label">Ngày khởi hành</label>
                                        <input type="date" id="departure-date" name="departure-date" class="form-control">
                                    </div>
                
                                    <!-- Nút tìm chuyến bay -->
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-primary btn-search p-4 d-flex align-items-center justify-content-center">Tìm chuyến bay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>