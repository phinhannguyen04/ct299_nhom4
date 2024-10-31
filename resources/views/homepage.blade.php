<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f5f9;
        }

        .booking-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #2d36ac;
        }

        .btn-primary {
            background-color: #2d36ac;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2d36ac;
        }

        .suggestions {
            border: 1px solid #ccc;
            background-color: #fff;
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="booking-container">
            <h2 class="form-title">Flight Booking</h2>
            <form method="POST" action="">
                @csrf
                <div class="row g-3">
                    <!-- Departure -->
                    <div class="col-md-3 position-relative">
                        <label for="departure" class="form-label">Từ</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-airplane-fill"></i></span>
                            <select class="form-select" name="departure" id="departure">
                                {{-- <option value="">Chọn sân bay...</option> --}}
                                @foreach ($sanbays as $sanbay)
                                    <option value="{{ $sanbay->id }}">{{ $sanbay->ten }} - {{ $sanbay->thanhpho }}
                                    </option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                    <!-- Destination -->
                    <div class="col-md-3 position-relative">
                        <label for="destination" class="form-label">Đến</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-airplane-fill"></i></span>
                            {{-- <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter destination city" oninput="showSuggestions('destination')"> --}}
                            <select class="form-select" name="destination" id="destination">
                                @foreach ($sanbays as $sanbay)
                                    <option value="{{ $sanbay->id }}">{{ $sanbay->ten }} - {{ $sanbay->thanhpho }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Dates -->
                    <div class="col-md-6">
                        <label for="departure-date" class="form-label">Ngày bay</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                            <input type="date" class="form-control" name="departure-date" id="departure-date">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <!-- Adults -->
                    <div class="col-md-4">
                        <label for="adults" class="form-label">Người lớn (12+)</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="changeCount('adults', -1);">-</button>
                            <input type="number" class="form-control" name="adults" id="adults" value="1"
                                min="1" readonly>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="changeCount('adults', 1);">+</button>
                        </div>
                    </div>
                    <!-- Children -->
                    <div class="col-md-4">
                        <label for="children" class="form-label">Trẻ em (2-11)</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="changeCount('children', -1);">-</button>
                            <input type="number" class="form-control" name="children" id="children" value="0"
                                min="0" readonly>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="changeCount('children', 1);">+</button>
                        </div>
                    </div>
                    <!-- Class -->
                    <div class="col-md-4">
                        <label for="children" class="form-label">Tìm kiếm</label>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-m">Search Flights</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const passengers = {
            adults: 1,
            children: 0
        };

        function changeCount(type, amount) {
            if (type === 'adults') {
                passengers.adults = Math.max(1, passengers.adults + amount);
                document.getElementById('adults').value = passengers.adults;
            } else if (type === 'children') {
                passengers.children = Math.max(0, passengers.children + amount);
                document.getElementById('children').value = passengers.children;
            }
        }

        window.onload = () => {
            document.getElementById('departure-date').value = new Date().toISOString().split('T')[0];
        };
    </script>
</body>

</html>
