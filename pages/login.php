<?php
session_start();
include_once '../includes/koneksi.php';

if (isset($_SESSION['log'])) {
    header('location:dasss.php');
    exit();
}

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);

    $queryuser = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$user'");
    if ($queryuser && mysqli_num_rows($queryuser) > 0) {
        $cariuser = mysqli_fetch_assoc($queryuser);

        if (password_verify($pass, $cariuser['password'])) {
            $_SESSION['userid'] = $cariuser['id'];
            $_SESSION['username'] = $cariuser['username'];
            $_SESSION['log'] = 'login';

            echo '<script>alert("Anda berhasil login sebagai ' . $cariuser['username'] . '"); window.location="dasss.php";</script>';
        } else {
            echo '<script>alert("Data yang anda masukan salah"); history.go(-1);</script>';
        }
    } else {
        echo '<script>alert("Data yang anda masukan salah"); history.go(-1);</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
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

        .form-label {
            font-weight: bold;
        }

        .input-group-text {
            background-color: #f0f0f0;
        }

        .input-group-text i {
            color: #009ffd;
        }
        /* Custom Login Styles */
body {
  background-color: #f4f1e8; /* Light background color */
}

.card {
  background-color: #ffffff; /* White background for the card */
  border: 1px solid #dcdcdc; /* Light border for the card */
  border-radius: 8px; /* Rounded corners for the card */
}

.card-body {
  padding: 2rem;
}

.app-brand-text {
  color: #5E4608; /* Dark brown color for the brand text */
  font-size: 1.5rem;
  font-weight: 700;
}

.form-label {
  color: #5E4608; /* Dark brown color for the labels */
}

.form-control {
  border-color: #dcdcdc; /* Light border color for the input fields */
}

.form-control:focus {
  border-color: #5E4608; /* Dark brown border color on focus */
  box-shadow: 0 0 0 0.2rem rgba(94, 70, 8, 0.25); /* Shadow effect on focus */
}

.btn-primary {
  background-color: #5E4608; /* Dark brown color for the button */
  border-color: #5E4608; /* Dark brown border color for the button */
}

.btn-primary:hover {
  background-color: #4b3a03; /* Slightly darker shade on hover */
  border-color: #4b3a03; /* Slightly darker border on hover */
}

.form-check-label {
  color: #5E4608; /* Dark brown color for the checkbox label */
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
                                <span class="app-brand-text demo text-body fw-bolder">ADMIN</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
