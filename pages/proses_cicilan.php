<?php
// Ambil nilai total harga dan jumlah cicilan dari parameter GET
$totalHarga = $_GET['total_harga'];
$jumlahCicilan = $_GET['jumlah_cicilan'];

// Fungsi untuk menghitung jumlah cicilan berdasarkan total harga dan jumlah cicilan
function hitungCicilan($totalHarga, $jumlahCicilan) {
    return ceil($totalHarga / $jumlahCicilan);
}

// Cek jika form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses form jika ada data yang dikirimkan
    // Misalnya, simpan data atau lakukan operasi lain sesuai kebutuhan
    // Di sini Anda bisa mengupdate database atau melakukan operasi lainnya
    // Contoh operasi:
    // foreach ($_POST['cicilan'] as $nama => $value) {
    //     echo "Nama: $nama - Cicilan: $value<br>";
    // }
    echo "Proses cicilan telah berhasil diupdate.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Cicilan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Proses Cicilan</h2>
        <p>Total Harga Kos: <?php echo $totalHarga; ?></p>
        <p>Jumlah Cicilan: <?php echo $jumlahCicilan; ?></p>
        <form method="POST">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama Penghuni</th>
                        <?php for ($i = 1; $i <= $jumlahCicilan; $i++) : ?>
                            <th scope="col">Cicilan <?php echo $i; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query untuk mengambil nama penghuni dari database
                    $query = "SELECT fullname FROM tenant";
                    $result = mysqli_query($koneksi, $query);
                    
                    // Tampilkan baris untuk setiap nama penghuni
                    while ($row = mysqli_fetch_assoc($result)) :
                        $namaPenghuni = $row['fullname'];
                    ?>
                        <tr>
                            <td><?php echo $namaPenghuni; ?></td>
                            <?php for ($j = 1; $j <= $jumlahCicilan; $j++) : ?>
                                <td><input type="checkbox" name="cicilan[<?php echo $namaPenghuni; ?>][<?php echo $j; ?>]"> Cicilan <?php echo $j; ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan Cicilan</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
