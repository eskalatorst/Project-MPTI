<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('Location: login.php'); // Ganti dengan path ke halaman login Anda
    exit();
}

// Include the database connection file
include '../includes/koneksi.php';

// Check if ID parameter is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query to select tenant data by ID
    $sql = "SELECT * FROM tenant WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['fullname'];
        $address = $row['address'];
        $roomtype = $row['roomtype'];
        $paymentstatus = $row['paymentstatus'];
        $phone = $row['phone'];
        $rentalduration = $row['rentalduration'];
        $entrydate = $row['entrydate'];
        $totalprice = $row['totalprice'];
        $installments = $row['installments'];
        $roomnumber = $row['roomnumber'];

        // Query to get occupied rooms
        $occupiedSql = "SELECT roomnumber FROM tenant WHERE roomtype = '$roomtype' AND id != '$id'";
        $occupiedResult = mysqli_query($koneksi, $occupiedSql);
        $occupiedRooms = [];
        while ($rowOccupied = mysqli_fetch_assoc($occupiedResult)) {
            $occupiedRooms[] = $rowOccupied['roomnumber'];
        }
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $roomtype = $_POST['roomtype'];
    $paymentstatus = $_POST['paymentstatus'];
    $phone = $_POST['phone'];
    $rentalduration = $_POST['rentalduration'];
    $entrydate = $_POST['entrydate'];
    $totalprice = $_POST['totalprice'];
    $installments = $_POST['installments'] ?? 0;
    $roomnumber = $_POST['roomnumber'];

    $updateSql = "UPDATE tenant SET fullname='$fullname', address='$address', roomtype='$roomtype', paymentstatus='$paymentstatus', phone='$phone', rentalduration='$rentalduration', entrydate='$entrydate', totalprice='$totalprice', installments='$installments', roomnumber='$roomnumber' WHERE id='$id'";

    if (mysqli_query($koneksi, $updateSql)) {
        header("Location: lihat_penghuni.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penghuni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
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
            <div class="col-md-2">
                <!-- Include your navbar code here -->
            </div>

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
                    <h2 class="text-center pb-4">Form Edit Penghuni</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Rumah</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomtype" class="form-label">Tipe Kamar</label>
                            <select class="form-select" id="roomtype" name="roomtype" required>
                                <option value="A" <?php if ($roomtype == 'A') echo 'selected'; ?>>A</option>
                                <option value="B" <?php if ($roomtype == 'B') echo 'selected'; ?>>B</option>
                                <option value="C" <?php if ($roomtype == 'C') echo 'selected'; ?>>C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="roomnumber" class="form-label">Nomor Kamar</label>
                            <select class="form-select" id="roomnumber" name="roomnumber" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rentalduration" class="form-label">Durasi Sewa</label>
                            <select class="form-select" id="rentalduration" name="rentalduration" required>
                                <option value="1 bulan" <?php if ($rentalduration == '1 bulan') echo 'selected'; ?>>1 Bulan</option>
                                <option value="1 tahun" <?php if ($rentalduration == '1 tahun') echo 'selected'; ?>>1 Tahun</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="totalprice" class="form-label">Total Harga Kos</label>
                            <input type="text" class="form-control" id="totalprice" name="totalprice" value="<?php echo htmlspecialchars($totalprice); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paymentstatus" class="form-label">Status Pembayaran</label>
                            <select class="form-select" id="paymentstatus" name="paymentstatus" required>
                                <option value="lunas" <?php if ($paymentstatus == 'lunas') echo 'selected'; ?>>Lunas</option>
                                <option value="belum_lunas" <?php if ($paymentstatus == 'belum_lunas') echo 'selected'; ?>>Belum Lunas</option>
                            </select>
                        </div>
                        <div class="mb-3 <?php if ($paymentstatus != 'belum_lunas') echo 'd-none'; ?>" id="installment-div">
                            <label for="installments" class="form-label">Jumlah Cicilan</label>
                            <input type="number" class="form-control" id="installments" name="installments" value="<?php echo htmlspecialchars($installments); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="entrydate" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="entrydate" name="entrydate" value="<?php echo htmlspecialchars($entrydate); ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <button type="submit" class="btn btn-daftar me-4 fw-bold mb-4">Simpan Perubahan</button>
                        <a href="lihat_penghuni.php" class="btn btn-secondary">Batal</a>
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
            const roomNumberSelect = document.getElementById('roomnumber');

            // Daftar kamar yang terisi dari server-side (misalnya dalam format JSON)
            const occupiedRooms = <?php echo json_encode($occupiedRooms); ?>;

            function calculateTotalPrice() {
                const roomType = roomTypeSelect.value;
                const rentalDuration = rentalDurationSelect.value;

                let totalPrice = 0;

                if (roomType === 'A') {
                    totalPrice = rentalDuration === '1 tahun' ? 7500000 : 650000;
                } else if (roomType === 'B') {
                    totalPrice = rentalDuration === '1 tahun' ? 4500000 : 500000;
                } else if (roomType === 'C') {
                    totalPrice = rentalDuration === '1 tahun' ? 4300000 : 500000;
                }

                totalPriceInput.value = totalPrice;
            }

            function updateRoomNumbers() {
                const roomType = roomTypeSelect.value;
                let options = '';

                const occupiedSet = new Set(occupiedRooms);

                if (roomType === 'A') {
                    for (let i = 1; i <= 10; i++) {
                        if (!occupiedSet.has(i.toString())) {
                            options += `<option value="${i}">Kamar ${i}</option>`;
                        }
                    }
                } else if (roomType === 'B') {
                    for (let i = 11; i <= 19; i++) {
                        if (!occupiedSet.has(i.toString())) {
                            options += `<option value="${i}">Kamar ${i}</option>`;
                        }
                    }
                } else if (roomType === 'C') {
                    for (let i = 20; i <= 30; i++) {
                        if (!occupiedSet.has(i.toString())) {
                            options += `<option value="${i}">Kamar ${i}</option>`;
                        }
                    }
                }

                roomNumberSelect.innerHTML = options;
            }

            roomTypeSelect.addEventListener('change', function() {
                updateRoomNumbers();
                calculateTotalPrice();
            });

            rentalDurationSelect.addEventListener('change', calculateTotalPrice);
            paymentStatusSelect.addEventListener('change', function() {
                installmentDiv.classList.toggle('d-none', paymentStatusSelect.value !== 'belum_lunas');
            });

            // Initial call to populate the room numbers based on the default room type
            updateRoomNumbers();
            calculateTotalPrice();
        });
    </script>
</body>
</html>
