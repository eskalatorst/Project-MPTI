<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('Location: login.php'); // Ganti dengan path ke halaman login Anda
    exit();
}
?>
<?php
include '../includes/koneksi.php'; // Ensure this file contains your database connection logic

// Check if a delete action is requested
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete query
    $delete_query = "DELETE FROM tenant WHERE id = $delete_id";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
        echo '<script>alert("Penghuni berhasil dihapus.");</script>';
    } else {
        echo '<script>alert("Gagal menghapus penghuni.");</script>';
    }
}

// Query to select all tenants if no search input is provided
$sql = "SELECT * FROM tenant";

// Check if there's a search input
if (isset($_POST['searchInput']) && !empty($_POST['searchInput'])) {
    $search = mysqli_real_escape_string($koneksi, $_POST['searchInput']);
    $sql = "SELECT * FROM tenant WHERE fullname LIKE '%$search%' OR address LIKE '%$search%' OR roomtype LIKE '%$search%' OR paymentstatus LIKE '%$search%' OR phone LIKE '%$search%' OR rentalduration LIKE '%$search%' OR entrydate LIKE '%$search%' OR roomnumber LIKE '%$search%'";
}

$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghuni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        th {
            color: white !important;
            text-align: center !important;
        }

        td {
            text-align: center !important;
        }

        .table thead th {
            background-color: #BC9940;
            color: white;
        }

        .btn-primary {
            background-color: #EBAF14;
            border-color: #EBAF14;
        }

        .btn-primary:hover {
            background-color: #d99c0f;
            border-color: #d99c0f;
        }
    </style>
</head>

<body>
    <?php
    include '../includes/nav.php';
    ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="main-content col">
                <div class="container mt-4">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <form action="./tambah-penghuni.php" method="post">
                                <button type="submit" class="btn btn-daftar me-4 fw-bold">Tambah Penghuni</button>
                            </form>
                        </div>
                        <div class="col-auto">
                            <form action="./logout.php" method="post">
                                <button type="submit" class="btn btn-daftar me-4 fw-bold">Keluar</button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-4">
                        <div class="col-md-10">
                            <form class="d-flex" method="post">
                                <input class="form-control me-2" type="search" placeholder="Cari Penghuni" aria-label="Search" name="searchInput">
                                <button class="btn btn-outline-success" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="form-outline mb-4" data-mdb-input-init>
                        <div id="datatable">
                        </div>
                        <div class="container mt-5">
                            <h2 class="text-center mb-4">Daftar Penghuni</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="penghuniTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Alamat Rumah</th>
                                            <th scope="col">Tipe Kamar</th>
                                            <th scope="col">Nomor Kamar</th>
                                            <th scope="col">Status Pembayaran</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Durasi Sewa</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Check if there are any rows returned
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>{$no}</td>";
                                                echo "<td>{$row['fullname']}</td>";
                                                echo "<td>{$row['address']}</td>";
                                                echo "<td>{$row['roomtype']}</td>";
                                                echo "<td>{$row['roomnumber']}</td>";
                                                echo "<td>{$row['paymentstatus']}</td>";
                                                echo "<td>{$row['phone']}</td>";
                                                echo "<td>{$row['rentalduration']}</td>";
                                                echo "<td>{$row['entrydate']}</td>";
                                                echo "<td>
                                                        <a href='edit-tenant.php?id={$row['id']}' class='btn btn-warning btn-sm me-1'>Edit</a>
                                                        <a href='lihat_penghuni.php?delete_id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin untuk menghapus penghuni ini?');\">Hapus</a>
                                                      </td>";
                                                echo "</tr>";
                                                $no++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='10' class='text-center'>Tidak ada data penghuni.</td>";
                                        }

                                        // Close the database connection
                                        mysqli_close($koneksi);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
