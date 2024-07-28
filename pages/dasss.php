<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Grid Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php include "../includes/nav.php" ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Navbar Column -->
            <div class="col-md-2">
                <!-- Include your navbar code here if necessary -->
            </div>

            <!-- Main Content Column -->
            <div class="col-md-10">
                <div class="container mt-5">
                    <div class="container-lg">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <form action="./logout.php" method="post">
                                    <button type="submit" class="btn btn-daftar me-4 fw-bold">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-center pb-4">Selamat Datang di Kos Putra Suharjiyono</h2>
                    <div class="row justify-content-center">
                        <!-- First Row -->
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal1.png" class="card-img-top" alt="Image 1">
                                <div class="card-body">
                                    <h6 class="fw-bold">Tampak Depan</h6>
                                    <p class="card-text fs-6">Lingkungan yang asri dan sejuk yang bikin kamu makin nyaman</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal2.png" class="card-img-top" alt="Image 2">
                                <div class="card-body">
                                    <h6 class="fw-bold">Lantai 1</h6>
                                    <p class="card-text fs-6">Lantai 1 yang terpapar sinar matahari bikin kamar nggak lembab</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal3.png" class="card-img-top" alt="Image 3">
                                <div class="card-body">
                                    <h6 class="fw-bold">Halaman Parkir Luas</h6>
                                    <p class="card-text fs-6">Buat kamu yang takut motor lecet, tenang disini parkiran sangat luas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal.4png" class="card-img-top" alt="Image 4">
                                <div class="card-body">
                                    <h6 class="fw-bold">Halaman Luas</h6>
                                    <p class="card-text fs-6">Ini juga bisa buat tempat parkir loh sob</p>
                                </div>
                            </div>
                        </div>

                    <div class="row justify-content-center">
                        <!-- Second Row -->
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal5.png" class="card-img-top" alt="Image 6">
                                <div class="card-body">
                                    <h6 class="fw-bold">Lantai 2</h6>
                                    <p class="card-text fs-6">Ada lantai 2 juga nih sob dan yang pastinya nggak lembab</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal7.png" class="card-img-top" alt="Image 7">
                                <div class="card-body">
                                    <h6 class="fw-bold">Kamar Mandi</h6>
                                    <p class="card-text fs-6">Kamar mandi yang bersih bikin kamu makin nyaman</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal8.png" class="card-img-top" alt="Image 8">
                                <div class="card-body">
                                    <h6 class="fw-bold">Lapangan Badminton</h6>
                                    <p class="card-text fs-6">Lapangan badminton yang luas buat kamu yang suka main badminton</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 animate__animated animate__fadeIn">
                            <div class="card h-100">
                                <img src="../assets/img/hal9.png" class="card-img-top" alt="Image 9">
                                <div class="card-body">
                                    <h6 class="fw-bold">Tampak Dalam Kamar</h6>
                                    <p class="card-text fs-6">Kamar kosongan jadi kamu bisa custom kamar sesukamu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
