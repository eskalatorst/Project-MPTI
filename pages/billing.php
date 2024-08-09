<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['log'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika tidak terautentikasi
    exit();
}

include '../includes/koneksi.php';

// Query untuk mendapatkan tenant dan informasi cicilan
$sql = "SELECT id, fullname, installments, totalprice FROM tenant WHERE installments > 0";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghuni dan Cicilan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table thead th {
            background-color: #BC9940;
            color: white;
        }
        .form-check-input {
            margin: 0 auto;
            display: block;
            width: 2em; /* Ukuran checkbox diperbesar */
            height: 2em; /* Ukuran checkbox diperbesar */
            background-color: #ffffff; /* Warna latar checkbox putih */
            border: 2px solid #BC9940; /* Garis tepi checkbox dengan warna header tabel */
            border-radius: 0.25em; /* Sudut checkbox sedikit melengkung */
        }
        .form-check-input:checked {
            background-color: #BC9940; /* Warna latar checkbox yang dicentang */
            border-color: #BC9940; /* Warna garis tepi saat dicentang */
        }
        .form-check-input:focus {
            border-color: #BC9940; /* Warna garis tepi saat fokus */
            box-shadow: 0 0 0 0.2rem rgba(188, 153, 64, 0.25); /* Bayangan saat fokus */
        }
        .btn-primary {
            background-color: #BC9940; /* Warna tombol */
            border-color: #BC9940; /* Warna border tombol */
        }
        .btn-primary:hover {
            background-color: #9f7d40; /* Warna tombol saat hover */
            border-color: #9f7d40; /* Warna border tombol saat hover */
        }
        .main-content {
            padding: 20px; /* Padding di sekitar konten utama */
        }
    </style>
</head>
<body>
    <?php include '../includes/nav.php'; ?>
    <div class="container mt-5">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pb-4">Daftar Penghuni dan Cicilan</h2>
                    <form id="billingForm" action="update-installments.php" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Nama Penghuni</th>
                                        <th>Sisa Pembayaran</th>
                                        <th>Cicilan Per Bulan</th>
                                        <th>Cicilan Tersisa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <?php
                                            $monthlyInstallment = $row['totalprice'] / $row['installments'];
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="tenant_id[]" value="<?php echo $row['id']; ?>" data-price="<?php echo $monthlyInstallment; ?>">
                                            </td>
                                            <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(number_format($row['totalprice'], 2, ',', '.')); ?>" readonly>
                                                <input type="hidden" name="remaining_payment[]" value="<?php echo $row['totalprice']; ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(number_format($monthlyInstallment, 2, ',', '.')); ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['installments']; ?>" readonly>
                                                <input type="hidden" name="installment_price[]" value="<?php echo $monthlyInstallment; ?>">
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update Cicilan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmUpdate() {
            if (confirm('Apakah Anda yakin ingin memperbarui cicilan?')) {
                document.getElementById('billingForm').submit();
            }
        }
    </script>
</body>
</html>

<?php
mysqli_close($koneksi);
?>
