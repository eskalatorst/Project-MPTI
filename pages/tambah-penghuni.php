<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Penghuni</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Custom styles */
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php include "../includes/nav.php" ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Navbar Column -->
            <div class="col-md-2">
                <!-- Include your navbar code here -->
                
            </div>

            <!-- Main Content Column -->
            <div class="col-md-10">
                <div class="container mt-5">
                    <div class="container-lg">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <form action="./logout.php" method="post">
                                    <button type="submit" class="btn btn-daftar me-4 fw-bold">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-center pb-4">Form Tambah Penghuni</h2>
                    <form action="submit-tenant.php" method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Rumah</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomtype" class="form-label">Tipe Kamar</label>
                            <select class="form-select" id="roomtype" name="roomtype" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rentalduration" class="form-label">Durasi Sewa</label>
                            <select class="form-select" id="rentalduration" name="rentalduration" required>
                                <option value="1 bulan">1 Bulan</option>
                                <option value="1 tahun">1 Tahun</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="totalprice" class="form-label">Total Harga Kos</label>
                            <input type="text" class="form-control" id="totalprice" name="totalprice" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paymentstatus" class="form-label">Status Pembayaran</label>
                            <select class="form-select" id="paymentstatus" name="paymentstatus" required>
                                <option value="lunas">Lunas</option>
                                <option value="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                        <div class="mb-3 d-none" id="installment-div">
                            <label for="installments" class="form-label">Jumlah Cicilan</label>
                            <input type="number" class="form-control" id="installments" name="installments">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="entrydate" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="entrydate" name="entrydate" required>
                        </div>
                        <input type="hidden" name="redirect" value="lihat_penghuni.php">
                        <button type="submit" class="btn btn-daftar me-4 fw-bold mb-4">Tambah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roomTypeSelect = document.getElementById('roomtype');
            const rentalDurationSelect = document.getElementById('rentalduration');
            const totalPriceInput = document.getElementById('totalprice');
            const paymentStatusSelect = document.getElementById('paymentstatus');
            const installmentDiv = document.getElementById('installment-div');

            function calculateTotalPrice() {
                const roomType = roomTypeSelect.value;
                const rentalDuration = rentalDurationSelect.value;

                let totalPrice = 0;

                if (roomType === 'A') {
                    totalPrice = rentalDuration === '1 bulan' ? 650000 : 7500000;
                } else if (roomType === 'B') {
                    totalPrice = rentalDuration === '1 bulan' ? 500000 : 4500000;
                } else if (roomType === 'C') {
                    totalPrice = rentalDuration === '1 bulan' ? 500000 : 4300000;
                }

                totalPriceInput.value = totalPrice;
            }

            function toggleInstallmentDiv() {
                const paymentStatus = paymentStatusSelect.value;
                if (paymentStatus === 'belum_lunas') {
                    installmentDiv.classList.remove('d-none');
                } else {
                    installmentDiv.classList.add('d-none');
                }
            }

            roomTypeSelect.addEventListener('change', calculateTotalPrice);
            rentalDurationSelect.addEventListener('change', calculateTotalPrice);
            paymentStatusSelect.addEventListener('change', toggleInstallmentDiv);

            calculateTotalPrice();
            toggleInstallmentDiv();
        });
    </script>
</body>
</html>
