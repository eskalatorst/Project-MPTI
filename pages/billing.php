<?php
include '../includes/koneksi.php';

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
    <title>Display Tenants</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .installment-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .installment-checkbox {
            margin-right: 5px;
        }
        .form-label {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <?php include '../includes/nav.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-end"> <!-- Adjusts content to the right -->
            <div class="col-md-8">
                <h2 class="text-center pb-4">Daftar Penghuni dan Cicilan</h2>
                <form action="update-installments.php" method="post">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <?php
                            $monthlyInstallment = $row['totalprice'] / $row['installments'];
                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="installment-row">
                                    <div>
                                        <strong><?php echo htmlspecialchars($row['fullname']); ?></strong>
                                    </div>
                                    <div>
                                        <input type="checkbox" class="form-check-input installment-checkbox" name="tenant_id[]" value="<?php echo $row['id']; ?>" data-price="<?php echo $monthlyInstallment; ?>">
                                        <label class="form-check-label" for="installment">Bayar Cicilan</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="remaining-payment-<?php echo $row['id']; ?>" class="form-label">Sisa Pembayaran</label>
                                    <input type="text" class="form-control remaining-payment" id="remaining-payment-<?php echo $row['id']; ?>" value="<?php echo htmlspecialchars(number_format($row['totalprice'], 2, ',', '.')); ?>" readonly>
                                    <input type="hidden" name="remaining_payment[]" id="input-remaining-payment-<?php echo $row['id']; ?>" value="<?php echo $row['totalprice']; ?>">
                                    <input type="hidden" name="installment_price[]" id="installment-price-<?php echo $row['id']; ?>" value="<?php echo $monthlyInstallment; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cicilan Per Bulan</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(number_format($monthlyInstallment, 2, ',', '.')); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cicilan Tersisa</label>
                                    <input type="text" class="form-control" id="remaining-installments-<?php echo $row['id']; ?>" value="<?php echo $row['installments']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Cicilan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($koneksi);
?>

