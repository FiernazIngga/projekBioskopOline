<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="?page=home">
    <title>Ticket Online</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark wadahNavbar">
        <div class="container">
            <a class="navbar-brand logoAplikasi" href="?page=dashboardUser">
                <i class="fas fa-play-circle me-2"></i>MovieUPN
            </a>
            <button class="navbar-toggler tombolToggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuUtama">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi aktif menuNav" href="?page=dashboardUser">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="#">
                            <i class="fas fa-film me-1"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="#">
                            <i class="fas fa-bookmark me-1"></i> Contact Us
                        </a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-outline-danger me-md-2" type="button">Sign In</button>
                    <a href="?page=login"><button class="btn btn-outline-light" type="button">Log In</button></a>
                </div>
            </div>
        </div>
    </nav>

    <section class="selamatdatang">
        <div>
            <h1 class="display-5 fw-bold">Selamat Datang</h1>
            <h3>Temukan film terbaru saat ini, di MovieUPN</h3>
        </div>
    </section>

    <section class="tranding">
        <div class="container">
            <div class="p-5">
                <h3>Sedang Tren</h3>
                <div id="carouselExample" class="carousel slide p-5" data-bs-wrap="false">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                 <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie"> 
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                 <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                 <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
            <div>
                <h3>Terbaru</h3>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="?page=home"></script>
</body>

</html>