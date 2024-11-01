<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tìm Vé Máy Bay</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            /* Bo góc cho thẻ div */
            .border-container {
                border: 1px solid #ccc;
                border-radius: 10px;
                /* Bo góc cho thẻ div */
                padding: 20px;
                background-color: #fff;
                /* Màu nền cho div */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Đổ bóng */
            }
        </style>
    </head>

    <body class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Vé Máy Bay</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarNav"
                >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="#"
                                >Trang Chủ</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vé</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chuyến bay</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a
                        class="btn btn-outline-primary me-2"
                        href="#"
                        role="button"
                        >Đăng Nhập</a
                    >
                    <a class="btn btn-primary" href="#" role="button"
                        >Đăng Ký</a
                    >
                </div>
            </div>
        </nav>

        <div
            class="container my-4 d-flex justify-content-center align-items-center"
            style="min-height: 80vh"
        >
            <!-- Thẻ div có border chứa form tìm vé -->
            <div
                class="border border-secondary rounded p-4 shadow"
                style="max-width: 500px; width: 100%"
            >
                <form id="ticketSearchForm">
                    <h4 class="mb-3">Tìm Vé Máy Bay</h4>
                    <div class="mb-3">
                        <label for="ticketCode" class="form-label"
                            >Nhập mã vé:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="ticketCode"
                            placeholder="Nhập mã vé"
                            required
                        />
                    </div>
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                        >
                            Tìm vé
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Thông tin vé máy bay
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <p>
                                <strong>Mã vé:</strong>
                                <span id="modalTicketCode"
                                    >Mã vé của bạn sẽ được hiển thị ở đây</span
                                >
                            </p>
                            <p><strong>Chuyến bay:</strong> HAN ⟶ SGN</p>
                            <p><strong>Ngày:</strong> 12/12/2024</p>
                            <p><strong>Giá:</strong> 1,200,000 VND</p>
                            <p><strong>Loại vé:</strong> Economy</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
