<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('Location: login.php');
    exit();
}
?>
<?php
include '../includes/koneksi.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
    $sql = "SELECT ih.payment_date, ih.payment_amount, ih.installment_number, t.fullname 
            FROM installment_history ih 
            INNER JOIN tenant t ON ih.tenant_id = t.id
            WHERE t.fullname LIKE '%$search%'
            ORDER BY ih.payment_date DESC";
    $result = mysqli_query($koneksi, $sql);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    }
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran Cicilan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #EBAF14;
            color: #ffffff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .main-content {
            margin-left: 200px;
        }
        .btn-search {
            background-color: #EBAF14;
            border-color: #EBAF14;
            color: #ffffff;
        }
        .btn-search:hover {
            background-color: #d49a11;
            border-color: #d49a11;
        }
    </style>
</head>
<body>
    <?php include '../includes/nav.php'; ?>
    <div class="main-content container">
        <h2 class="text-center pb-4">Riwayat Pembayaran Cicilan</h2>
        
        <!-- Formulir Pencarian -->
        <form method="GET" action="">
            <div class="row mb-4">
                <div class="col-md-8 offset-md-2">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama penghuni..." value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-search">Cari</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penghuni</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($search) && $result && mysqli_num_rows($result) > 0): ?>
                            <?php $no = 1; ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                    <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['payment_date']))); ?></td>
                                    <td><?php echo htmlspecialchars(number_format($row['payment_amount'], 0, ',', '.')); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($koneksi);
?>
