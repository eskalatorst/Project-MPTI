<?php
include '../includes/koneksi.php';

// Fungsi untuk memformat angka menjadi rupiah
function format_rupiah($angka) {
    return number_format($angka, 0, ',', '.');
}

// Periksa jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tenant_ids = isset($_POST['tenant_id']) ? $_POST['tenant_id'] : [];
    $installment_prices = isset($_POST['installment_price']) ? $_POST['installment_price'] : [];

    // Ambil data tenant dari database
    $tenants_data = [];
    if (!empty($tenant_ids)) {
        $ids = implode(',', array_map('intval', $tenant_ids));
        $sql_fetch = "SELECT id, roomtype, totalprice, installments FROM tenant WHERE id IN ($ids)";
        $result_fetch = mysqli_query($koneksi, $sql_fetch);

        if ($result_fetch) {
            while ($row = mysqli_fetch_assoc($result_fetch)) {
                $tenants_data[$row['id']] = [
                    'roomtype' => $row['roomtype'],
                    'totalprice' => $row['totalprice'],
                    'installments' => $row['installments']
                ];
            }
        } else {
            die("Error Query: " . mysqli_error($koneksi));
        }
    }

    // Loop melalui data yang disubmit dan perbarui cicilan
    foreach ($tenant_ids as $index => $tenant_id) {
        if (isset($tenants_data[$tenant_id])) {
            $roomtype = $tenants_data[$tenant_id]['roomtype'];
            $totalprice = $tenants_data[$tenant_id]['totalprice'];
            $current_installments = $tenants_data[$tenant_id]['installments'];
            $paid_installment = isset($installment_prices[$index]) ? floatval($installment_prices[$index]) : 0;

            // Validasi data input
            if ($paid_installment <= 0) {
                echo "Harga cicilan harus lebih dari 0 untuk tenant ID: $tenant_id<br>";
                continue; // Lanjutkan ke tenant berikutnya
            }

            // Hitung harga cicilan per unit berdasarkan total harga sewa dan jumlah cicilan
            $price_per_installment = $totalprice / $current_installments;

            // Hitung sisa harga setelah mengurangi cicilan yang dibayar
            $remaining_payment = max(0, $totalprice - $paid_installment);

            // Hitung jumlah cicilan yang tersisa (sesuaikan dengan aturan pembulatan)
            $new_installments = ceil($remaining_payment / $price_per_installment);

            // Update informasi cicilan tenant
            $sql_update = "UPDATE tenant SET totalprice = $remaining_payment, installments = $new_installments WHERE id = $tenant_id";
            if (mysqli_query($koneksi, $sql_update)) {
                echo "Data tenant dengan ID $tenant_id berhasil diperbarui.<br>";
            } else {
                echo "Gagal memperbarui data tenant dengan ID $tenant_id: " . mysqli_error($koneksi) . "<br>";
            }
        } else {
            echo "Data tidak ditemukan untuk tenant ID: $tenant_id<br>";
        }
    }

    // Redirect atau tampilkan pesan sukses
    header("Location: billing.php"); // Redirect ke halaman tampilan tenant
    exit();
}

mysqli_close($koneksi);
?>
