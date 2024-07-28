<?php
include '../includes/koneksi.php'; // Pastikan file ini berisi logika koneksi database Anda

// Mengambil data tenant dari database yang masih memiliki cicilan
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
    <div class="container mt-5">
        <h2 class="text-center pb-4">Daftar Penghuni dan Cicilan</h2>
        <form action="update-installments.php" method="post">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="installment-row">
                            <div>
                                <strong><?php echo htmlspecialchars($row['fullname']); ?></strong>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input installment-checkbox" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['totalprice'] / $row['installments']; ?>">
                                <label class="form-check-label" for="installment">Bayar Cicilan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="remaining-payment-<?php echo $row['id']; ?>" class="form-label">Sisa Pembayaran</label>
                            <input type="text" class="form-control remaining-payment" id="remaining-payment-<?php echo $row['id']; ?>" value="<?php echo htmlspecialchars(number_format($row['totalprice'], 2, ',', '.')); ?>" readonly>
                            <input type="hidden" name="tenant_id[]" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="remaining_payment[]" id="input-remaining-payment-<?php echo $row['id']; ?>" value="<?php echo $row['totalprice']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Cicilan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.installment-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const tenantId = this.getAttribute('data-id');
                const installmentPrice = parseFloat(this.getAttribute('data-price'));
                const remainingPaymentField = document.getElementById(`remaining-payment-${tenantId}`);
                const inputRemainingPaymentField = document.getElementById(`input-remaining-payment-${tenantId}`);

                let remainingPayment = parseFloat(remainingPaymentField.value.replace(/\./g, '').replace(',', '.'));

                if (this.checked) {
                    remainingPayment -= installmentPrice;
                } else {
                    remainingPayment += installmentPrice;
                }

                remainingPaymentField.value = remainingPayment.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                inputRemainingPaymentField.value = remainingPayment;
            });
        });
    </script>
</body>
</html>

<?php
mysqli_close($koneksi);
?>
