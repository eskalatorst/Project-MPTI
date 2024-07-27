<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .about-section {
            margin-left: 20px;
        }

        .image-section {
            text-align: center;
        }

        .image-section p {
            margin: 0;
        }

        .image-section .name {
            font-weight: bold;
        }

        .faded-text {
            opacity: 0.7;
        }
    </style>
</head>
<?php
include '../includes/nav.php';
?>

    <class="row flex-nowrap">

        <div class="col-md-100">
            <div class="container-lg">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <form action="./logout.php" method="post">
                            <button type="submit" class="btn btn-daftar me-4 fw-bold">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="main-content col">
            <div class="row justify-content-center">
                <div class="col-auto image-section">
                    <img src="../assets/img/profile.png" alt="Center Image" style="width: 400px;">
                    <p class="name">Zahra</p>
                    <p>Administrator</p>
                </div>
                <div class="col-auto about-section">
                    <h2>About</h2>
                    <p class="faded-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, <br>quibusdam architecto dicta
                        modi autem consectetur inventore? Soluta,<br> unde! Placeat dignissimos qui odio,<br> iure
                        reiciendis suscipit harum corrupti nisi voluptatum maxime.
                    </p>
                </div>
            </div>
        </div>
        </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Ambil semua elemen menu
                const navMenus = document.querySelectorAll('.nav-menu');

                // Tambahkan event listener untuk animasi hover dan status active
                navMenus.forEach(navMenu => {
                    navMenu.addEventListener('mouseover', function () {
                        this.classList.add('hover');
                    });

                    navMenu.addEventListener('mouseout', function () {
                        this.classList.remove('hover');
                    });

                    navMenu.addEventListener('click', function () {
                        // Hapus kelas active dari semua menu
                        navMenus.forEach(menu => menu.classList.remove('active'));

                        // Tambahkan kelas active ke menu yang diklik
                        this.classList.add('active');
                    });
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        </body>

</html>