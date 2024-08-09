<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['log'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika tidak terautentikasi
    exit();
}

// Cek jika form password disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../includes/koneksi.php';

    $password = $_POST['password'];

    // Verifikasi password
    if (password_verify($password, $_SESSION['hashed_password'])) {
        // Password benar, arahkan ke halaman cicilan
        header('Location: billing.php');
        exit();
    } else {
        $error = "Password salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center">Verifikasi Password</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
