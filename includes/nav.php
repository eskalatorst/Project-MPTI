<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <nav class="navv col-auto col-md-3 col-xl-2 px-sm-2 px-0 text-white">
                <div class="align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <img src="../assets/img/logo1.png" alt="Logo" style="width: 70px; margin-left: 50px;">
                    <p style="color: white; margin-left: 15px; margin-top: 20px;">Kos Putra Suharjiyono</p>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-left text-left" id="menu">
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-2 pb-1">
                                    <img style="width: 20px;" src="../assets/img/dasboard.png" alt="Dashboard Icon">
                                </div>
                                <div class="col-10">
                                    <a class="nav-menu nav-link text-white" href="dasss.php">Dasboard</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-2 pb-1">
                                    <img style="width: 20px;" src="../assets/img/penghuni.jpg" alt="Penghuni Icon">
                                </div>
                                <div class="col-10">
                                    <a class="nav-menu nav-link text-white" href="lihat_penghuni.php">Penghuni</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-2 pb-1">
                                    <img style="width: 20px;" src="../assets/img/biling.png" alt="Pembayaran Icon">
                                </div>
                                <div class="col-10">
                                    <a class="nav-menu nav-link text-white" href="billing.php">Pembayaran</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-2 pb-1">
                                    <img style="width: 20px;" src="../assets/img/setting.png" alt="Pengaturan Icon">
                                </div>
                                <div class="col-10">
                                    <a class="nav-menu nav-link text-white" href="profile.php">Pengaturan</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
<script>


    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua elemen menu
        const navMenus = document.querySelectorAll('.nav-menu');

        // Tambahkan event listener untuk animasi hover dan status active
        navMenus.forEach(navMenu => {
            navMenu.addEventListener('mouseover', function() {
                this.classList.add('hover');
            });

            navMenu.addEventListener('mouseout', function() {
                this.classList.remove('hover');
            });

            navMenu.addEventListener('click', function() {
                // Hapus kelas active dari semua menu
                navMenus.forEach(menu => menu.classList.remove('active'));

                // Tambahkan kelas active ke menu yang diklik
                this.classList.add('active');
            });
        });
    });



</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
