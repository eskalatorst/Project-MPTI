<?php
include 'koneksi.php';

$tenant_id = $_GET['tenant_id'];
$installments = $_GET['installments'];
$total_price = $_GET['total_price'];
$installment_amount = $total_price / $installments;

$query = "SELECT fullname FROM tenant WHERE id = $tenant_id";
$result = mysqli_query($koneksi, $query);
$tenant = mysqli_fetch_assoc($result);

$remaining_installments = $installments;
$remaining_price = $total_price;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $remaining_installments = $_POST['remaining_installments'];
    $remaining_price = $_POST['remaining_price'];

    // Here you can update the database with the remaining installments and price
    // Example: UPDATE tenant SET remaining_installments = $remaining_installments, remaining_price = $remaining_price WHERE id = $tenant_id;

    echo "Remaining Installments and Price Updated!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Installments for <?= $tenant['fullname'] ?></h2>
    <form method="post" action="cicilan.php?tenant_id=<?= $tenant_id ?>&installments=<?= $installments ?>&total_price=<?= $total_price ?>">
        <?php for ($i = 1; $i <= $installments; $i++) { ?>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" id="installment_<?= $i ?>" name="installment_<?= $i ?>" value="<?= $installment_amount ?>">
                <label class="form-check-label" for="installment_<?= $i ?>">Installment <?= $i ?> (<?= $installment_amount ?>)</label>
            </div>
        <?php } ?>
        <input type="hidden" name="remaining_installments" id="remaining_installments" value="<?= $remaining_installments ?>">
        <input type="hidden" name="remaining_price" id="remaining_price" value="<?= $remaining_price ?>">
        <div class="mb-3">
            <label for="total_remaining_price" class="form-label">Total Remaining Price</label>
            <input type="text" class="form-control" id="total_remaining_price" value="<?= $remaining_price ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update Installments</button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const remainingInstallmentsInput = document.getElementById('remaining_installments');
    const remainingPriceInput = document.getElementById('remaining_price');
    const totalRemainingPriceInput = document.getElementById('total_remaining_price');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            let remainingInstallments = parseInt(remainingInstallmentsInput.value);
            let remainingPrice = parseFloat(remainingPriceInput.value);

            if (this.checked) {
                remainingInstallments--;
                remainingPrice -= parseFloat(this.value);
            } else {
                remainingInstallments++;
                remainingPrice += parseFloat(this.value);
            }

            remainingInstallmentsInput.value = remainingInstallments;
            remainingPriceInput.value = remainingPrice;
            totalRemainingPriceInput.value = remainingPrice.toFixed(2);
        });
    });
});
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
