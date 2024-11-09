<section class="product_d_info">
    <div class="row justify-content-right">
        <div class="col-12 col-md-6">
            <div class="product_d_inner">
                <div class="product_info_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#info" role="tab"
                                aria-controls="info" aria-selected="false">khứ hồi</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                aria-selected="false">một chiều</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_d_table">
                            <form action="#" method="get">
                                <div class="form-row">
                                    <div class="form-group col-4 col-md-3">
                                        <select id="ticket-class" name="ticket-class" class="form-control"
                                            required>
                                            <option value="economy">Phổ thông</option>
                                            <option value="business">Thương gia</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-4 col-md-3">
                                        <select id="passenger-count" name="passenger-count"
                                            class="form-control" required>
                                            <option value="1">1 người lớn</option>
                                            <option value="2">2 người lớn</option>
                                            <option value="3">3 người lớn</option>
                                            <option value="4">4 người lớn</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <select id="passenger-count" name="passenger-count"
                                            class="form-control" required>
                                            <option value="1">1 trẻ em</option>
                                            <option value="2">2 trẻ em</option>
                                            <option value="3">3 trẻ em</option>
                                            <option value="4">4 trẻ em</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-12 col-md-6">
                                        <input list="departure-options" id="from" name="departure"
                                            class="form-control" placeholder="Chọn điểm khởi hành" required>
                                        <datalist id="departure-options">
                                            <option value="Cần Thơ">
                                        </datalist>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input list="destination-options" id="to" name="destination"
                                            class="form-control" placeholder="Chọn điểm đến" required>
                                        <datalist id="destination-options">
                                            <option value="Hà Nội">
                                            <option value="TP. Hồ Chí Minh">
                                            <option value="Đà Nẵng">
                                            <option value="Nha Trang">
                                            <option value="Phú Quốc">
                                            <option value="Đà Lạt">
                                        </datalist>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input type="date" id="departure-date" name="departure-date"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input type="date" id="return-date" name="return-date"
                                            class="form-control">
                                    </div>

                                    <!-- Nút button -->
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn-search">Tìm chuyến bay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                        <div class="product_d_table">
                            <form action="#" method="get">
                                <div class="form-row">
                                    <div class="form-group col-4 col-md-3">
                                        <select id="ticket-class" name="ticket-class" class="form-control"
                                            required>
                                            <option value="economy">Phổ thông</option>
                                            <option value="business">Thương gia</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-4 col-md-3">
                                        <select id="passenger-count" name="passenger-count"
                                            class="form-control" required>
                                            <option value="1">1 người lớn</option>
                                            <option value="2">2 người lớn</option>
                                            <option value="3">3 người lớn</option>
                                            <option value="4">4 người lớn</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <select id="passenger-count" name="passenger-count"
                                            class="form-control" required>
                                            <option value="1">1 trẻ em</option>
                                            <option value="2">2 trẻ em</option>
                                            <option value="3">3 trẻ em</option>
                                            <option value="4">4 trẻ em</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-12 col-md-6">
                                        <input list="departure-options" id="from" name="departure"
                                            class="form-control" placeholder="Chọn điểm khởi hành" required>
                                        <datalist id="departure-options">
                                            <option value="Cần Thơ">
                                        </datalist>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input list="destination-options" id="to" name="destination"
                                            class="form-control" placeholder="Chọn điểm đến" required>
                                        <datalist id="destination-options">
                                            <option value="Hà Nội">
                                            <option value="TP. Hồ Chí Minh">
                                            <option value="Đà Nẵng">
                                            <option value="Nha Trang">
                                            <option value="Phú Quốc">
                                            <option value="Đà Lạt">
                                        </datalist>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input type="date" id="departure-date" name="departure-date"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                    </div>

                                    <!-- Nút button -->
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn-search">Tìm chuyến bay</button>
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