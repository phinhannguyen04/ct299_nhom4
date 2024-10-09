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
            margin-bottom: 20px;
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
        .input-group-text {
            background-color: #2d36ac;
            color: #fff;
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
                    <!-- Điểm khởi hành -->
                    <div class="col-md-3 position-relative">
                        <label for="departure" class="form-label">Departure</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-airplane"></i></span>
                            <input type="text" class="form-control" name="departure" id="departure" placeholder="Enter departure city" oninput="showSuggestions('departure')">
                        </div>
                        <div class="suggestions" id="departure-suggestions" style="display: none;"></div>
                    </div>
    
                    <!-- Điểm đến -->
                    <div class="col-md-3 position-relative">
                        <label for="destination" class="form-label">Destination</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-airplane-fill"></i></span>
                            <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter destination city" oninput="showSuggestions('destination')">
                        </div>
                        <div class="suggestions" id="destination-suggestions" style="display: none;"></div>
                    </div>
    
                    <!-- Ngày đi và ngày về -->
                    <div class="col-md-6">
                        <label for="dates" class="form-label">Dates</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                            <input type="date" class="form-control" name="departure-date" id="departure-date">
                            <input type="date" class="form-control" name="return-date" id="return-date">
                        </div>
                    </div>
                </div>
    
                <div class="row g-3 mt-3">
                    <!-- Adults -->
                    <div class="col-md-4">
                        <label for="adults" class="form-label">Adults (12+)</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary" onclick="Passenger.changeCount('adults', -1); return false;">-</button>
                            <input type="number" class="form-control" name="adults" id="adults" value="1" min="1" readonly>
                            <button type="button" class="btn btn-outline-secondary" onclick="Passenger.changeCount('adults', 1); return false;">+</button>
                        </div>
                    </div>

                    <!-- Children -->
                    <div class="col-md-4">
                        <label for="children" class="form-label">Children (2-11)</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary" onclick="Passenger.changeCount('children', -1); return false;">-</button>
                            <input type="number" class="form-control" name="children" id="children" value="0" min="0" readonly>
                            <button type="button" class="btn btn-outline-secondary" onclick="Passenger.changeCount('children', 1); return false;">+</button>
                        </div>
                    </div>

                    <!-- Class -->
                    <div class="col-md-4">
                        <label for="class" class="form-label">Class</label>
                        <select class="form-select" name="class" id="class">
                            <option value="economy" selected>Economy</option>
                            <option value="business">Business</option>
                            <option value="first-class">First Class</option>
                        </select>
                    </div>
                    
                </div>
                <!-- Nút Đặt vé -->
                <div class="row g-3 mt-3 align-items-end">
                    <button type="submit" class="btn btn-primary btn-lg">Search Flights</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const Passenger = {
        adults: 1,
        children: 0,

            changeCount(type, amount) {
                if (type === 'adults') {
                    this.adults = Math.max(1, this.adults + amount); // Số lượng người lớn không được dưới 1
                    document.getElementById('adults').value = this.adults;
                } else if (type === 'children') {
                    this.children = Math.max(0, this.children + amount); // Số lượng trẻ em không được dưới 0
                    document.getElementById('children').value = this.children;
                }
            }
        };

        // Set default dates when the page loads
        function setDefaultDates() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('departure-date').value = today;
            document.getElementById('return-date').value = today;
        }

        window.onload = setDefaultDates;

        // Function to show suggestions
        const suggestions = {
            departure: ['Hà Nội', 'Hồ Chí Minh', 'Đà Nẵng', 'Nha Trang', 'Phú Quốc'],
            destination: ['Hà Nội', 'Hồ Chí Minh', 'Đà Nẵng', 'Nha Trang', 'Phú Quốc']
        };

        function showSuggestions(inputId) {
            const input = document.getElementById(inputId);
            const suggestionsDiv = document.getElementById(inputId + '-suggestions');
            const inputValue = input.value.toLowerCase();
            
            if (!inputValue) {
                suggestionsDiv.style.display = 'none';
                return;
            }

            let filteredSuggestions = suggestions[inputId].filter(city => city.toLowerCase().startsWith(inputValue));
            suggestionsDiv.innerHTML = '';
            
            if (filteredSuggestions.length > 0) {
                filteredSuggestions.forEach(city => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.innerText = city;
                    suggestionItem.onclick = () => selectSuggestion(city, inputId);
                    suggestionsDiv.appendChild(suggestionItem);
                });
                suggestionsDiv.style.display = 'block';
            } else {
                suggestionsDiv.style.display = 'none';
            }
        }

        function selectSuggestion(city, inputId) {
            const input = document.getElementById(inputId);
            input.value = city;
            document.getElementById(inputId + '-suggestions').style.display = 'none';
        }
    </script>
</body>
</html>
