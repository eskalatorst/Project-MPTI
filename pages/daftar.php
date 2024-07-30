<?php
include_once '../includes/koneksi.php';

// Jika form pendaftaran dikirim
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO login (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($koneksi, $query)) {
        echo '<script>alert("Pendaftaran berhasil! Silakan login."); window.location="login.php";</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan: ' . mysqli_error($koneksi) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #2a2a72, #009ffd);
            font-family: 'Public Sans', sans-serif;
        }
        .authentication-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .authentication-inner {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .app-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #009ffd;
            margin-bottom: 2rem;
        }
        .btn-primary {
            background-color: #009ffd;
            border-color: #009ffd;
        }
        .btn-primary:hover {
            background-color: #007bbd;
            border-color: #007bbd;
        }
    </style>
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">Register</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
