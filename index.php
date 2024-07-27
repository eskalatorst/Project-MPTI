<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Putra Suharjoyono</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <img src="./assets/img/logo1.png" class="img-logo me-3" alt="">
                <h3 class="koszahra">Kos Putra Suharjoyono</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="#Beranda">Beranda</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#Fasilitas">Fasilitas</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#Tipekamar">Tipe Kamar</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#Lokasi">Lokasi</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#Kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="button-container d-flex justify-content-center mt-1">
                        <form action="./pages/login.php" method="post">
                            <button type="submit" class="btn btn-daftar me-4 fw-bold">Masuk</button>
                        </form>
                    </div>
                    
    </header>

    <section id="Beranda" class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="hero animate__animated animate__fadeInLeft">Buat kamu yang lagi kuliah di jogja,<br>
                        bingung cari kosan deket kampus<br> dan yang pastinya murah<br>
                        <span class="zahra text-warning">KosZahra</span> Solusinya
                    </p>
                    <button type="button" class="btn btn-kontak animate__animated animate__fadeInLeft" onclick="window.location.href='https://api.whatsapp.com/send/?phone=6285658536192&text&type=phone_number&app_absent=0'">Kontak Kami</button>
                </div>
                <div class="col-md-6">
                    <img id="myElement" class="hero-photo animate__animated animate__fadeInLeft" src="./assets/img/hero.png" alt="">
                </div>
            </div>                 
        </div>
        </div>
    </section>

    <section id="Fasilitas">
        <h3 class="text-center fw-bold pt-5 pb-3">Fasilitas</h3>
        <div class="owl-carousel owl-theme">
            <div class="item" id="myElement">
                <img class="img-fluid mx-auto d-block " src="./assets/img/Wifi.png" alt="" style=" width: 40px;">
                <h2 class="text-center pt-2">Free Wi-Fi</h2>
            </div>
            <div class="item" id="myElement">
                <img class="img-fluid mx-auto d-block " src="./assets/img/air.png" alt="" style=" width: 40px;">
                <h2 class="text-center pt-2">Free Air</h2>
            </div>
            <div class="item" id="myElement">
                <img class="img-fluid mx-auto d-block " src="./assets/img/parking.png" alt="" style=" width: 40px;">
                <h2 class="text-center pt-2">Parkir Luas</h2>
            </div>
            <div class="item" id="myElement">
                <img class="img-fluid mx-auto d-block " src="./assets/img/Home.png" alt="" style=" width: 30px;">
                <h2 class="text-center pt-2">Kosongan</h2>
            </div>
        </div>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        </script>
    </section>
    <section id="Tipekamar">
        <div class="container">
            <h3 class="text-center fw-bold pt-5 ">Tipe Kamar</h3>
            <br>
            <div class="card mb-3 border-dark" style="max-width: 1540px;">
                <div class="row g-0">
                    <div class="col-md-4 p-3">
                        <h4 class="text-black">Tipe A</h4>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/img/kamar.jpeg" class="d-block w-100" alt="aku">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai1.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai2.jpeg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kamar_ukuran.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar ukuran 3x4</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Lighting.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">listrik free</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Kamar_mandi.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar mandi dalam</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kosongan.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kosongan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pt-5">
                        <div class="card-body">
                            <div class="container text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tipe Sewa</th>
                                            <th scope="col">Harga Sewa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bulanan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 650.000 <span class="text-muted">/bulan</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahunan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 7.500.000 <span class="text-muted">/tahun</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 border-dark pt-5" style="max-width: 1540px;">
                <div class="row g-0">
                    <div class="col-md-4 p-3">
                        <h4 class="text-black">Tipe B</h4>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/img/kamar.jpeg" class="d-block w-100" alt="aku">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai1.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai2.jpeg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="container mt-3">
                        <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kamar_ukuran.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar ukuran 3x4</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Lighting.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">listrik free</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Kamar_mandi.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar mandi dalam</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kosongan.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kosongan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pt-5">
                        <div class="card-body">
                            <div class="container text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tipe Sewa</th>
                                            <th scope="col">Harga Sewa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bulanan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 500.000 <span class="text-muted">/bulan</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahunan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 4.500.000 <span class="text-muted">/tahun</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mb-3 border-dark" style="max-width: 1540px;">
                <div class="row g-0">
                    <div class="col-md-4 p-3">
                        <h4 class="text-black">Tipe C</h4>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/img/kamar.jpeg" class="d-block w-100" alt="aku">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai1.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/lantai2.jpeg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="container mt-3">
                        <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kamar_ukuran.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar ukuran 3x4</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Lighting.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">listrik free</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/Kamar_mandi.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kamar mandi dalam</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <img src="./assets/img/kosongan.png" class="me-2" alt="icon" style="width: 20px; height: 20px;">
                                    <p class="fw-light text-black mb-0">kosongan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pt-5">
                        <div class="card-body">
                            <div class="container text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tipe Sewa</th>
                                            <th scope="col">Harga Sewa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bulanan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 500.000 <span class="text-muted">/bulan</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahunan</td>
                                            <td class="fw-bold text-warning">
                                                RP. 4.300.000 <span class="text-muted">/tahun</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Lokasi">
        <h3 class="text-center fw-bold p-5">Lokasi</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div id="myElement">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.621799583082!2d110.36856337476634!3d-7.829791792191183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a579eac8fa945%3A0xa27a9a0679dbcbe9!2sskrentalcamera!5e0!3m2!1sid!2sid!4v1711979703048!5m2!1sid!2sid" width="600" height="300" style="border:0; border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6 mb-3 d-flex flex-column justify-content-center">
                    <div class="d-flex align-items-center mb-3">
                        <img src="./assets/img/Univ.png" class="me-3" alt="Location Image" style="width: 50px; height: auto; border-radius: 5px;">
                        <div class="d-flex justify-content-between w-100">
                            <p class="text-black mb-0">Universitas Muhamadiyah Yogyakarta</p>
                            <p class="text-muted mb-0">0.70KM</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="./assets/img/Univ.png" class="me-3" alt="Location Image" style="width: 50px; height: auto; border-radius: 5px;">
                        <div class="d-flex justify-content-between w-100">
                            <p class="text-black mb-0">Universitas Alma Ata Yogyakarta</p>
                            <p class="text-muted mb-0">2.70KM</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="./assets/img/Univ.png" class="me-3" alt="Location Image" style="width: 50px; height: auto; border-radius: 5px;">
                        <div class="d-flex justify-content-between w-100">
                            <p class="text-black mb-0">Unjani Yogyakarta (Kampus 2)</p>
                            <p class="text-muted mb-0">3.30KM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h3 id="Kontak" class="text-center fw-bold p-5">Kontak</h3>
    <footer style="background-color: #8F6F1C;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.621799583082!2d110.36856337476634!3d-7.829791792191183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a579eac8fa945%3A0xa27a9a0679dbcbe9!2sskrentalcamera!5e0!3m2!1sid!2sid!4v1711979703048!5m2!1sid!2sid" width="600" height="616" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" border-radius: "5px;">
                    </iframe>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h2 class="zahra ms-2">KosZahra</h2>
                    <div class="row">
                        <div class="col-1">
                            <img src="./assets/img/lokasi.png" style="width: 30px;" alt="">
                        </div>
                        <div class="col-5 ms-2">
                            <p class="text-white">Kos Bapak Suharjiyono
                                Ngebel, Tamantirto, Kasihan,
                                Bantul, DIY 55184</p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-1">
                            <img src="./assets/img/phone.png" style="width: 30px;" alt="">
                        </div>
                        <div class="col-5 ms-2">
                            <p class="text-white">085228873317</p>
                        </div>
                    </div>
                    <hr style="border: none; border-top: 3px solid white; margin-bottom: 1rem;">

                    <p class="text-white">Beranda</p>
                    <p class="text-white">Fasilitas</p>
                    <p class="text-white">Galeri</p><br>
                    <p class="text-white">Ikuti kami dan dapatkan info menarik</p>

                    <div class="row mt-3">
                        <div class="col-1">
                            <img src="./assets/img/ig.png" class="img-fluid" alt="Gambar 1" height="40px" width="40px">
                        </div>
                        <div class="col-1">
                            <img src="./assets/img/facebook.png" class="img-fluid" alt="Gambar 2" height="40px" width="40px">
                        </div>
                        <div class="col-1">
                            <img src="./assets/img/tuitok.png" class="img-fluid" alt="Gambar 3" height="40px" width="40px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer class="bg-body-tertiary text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center text-white p-3 " style="background-color: #BF9A3A;">
                Copyright KosZahra All Right Reserved
            </div>
            <!-- Copyright -->
        </footer>
    </footer>
    <script src="./assets/js/item.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>