<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/css/themes/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-2N+IHl7TflsBD/9pe1QB8uLoBoE7kIODejp9eye2tfbvhuO+EiyissU8aWDbzxjJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="?page=home">
    <title>Bioskop Online</title>
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
                        <a class="nav-link tautanNavigasi" href="#sikil">
                            <i class="fas fa-film me-1"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="#sikil">
                            <i class="fas fa-bookmark me-1"></i> Contact Us
                        </a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="?page=daftar" class="btn btn-outline-danger me-md-2" type="button">Sign In</a>
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
            <div class="pt-5">
                <h3>Sedang Tren</h3>
                <div id="carouselTranding" class="carousel slide p-5" data-bs-wrap="false">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTranding"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselTranding"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
            <div class>
                <h3>Terbaru</h3>
                <div id="carouselTerbaru" class="carousel slide p-5" data-bs-wrap="false">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTerbaru"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselTerbaru"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </section>

    <section class="sikil" id="sikil" data-bs-theme="dark">
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    
                    <div class="col-6 col-md-6 mb-3">
                        <h5>Tentang Kami</h5>
                        <p>Ini adalah tugas projek paraktikum pemrograman WEB semester 3</p>
                        <h5>Hubungi Kami</h5>
                        <p>085123456</p>
                    </div>
            
                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2"> <label for="newsletter1"
                                    class="visually-hidden">Email address</label> <input id="newsletter1" type="email"
                                    class="form-control" placeholder="Email address"> <button class="btn btn-danger"
                                    type="button">Subscribe</button> </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>© 2025 AffanFiernaz, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex" data>
                        <li><a class="link-body-emphasis me-3" href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
                        <li><a class="link-body-emphasis me-3" href="#"><i class="fab fa-facebook fa-lg"></i></a></li>
                        <li><a class="link-body-emphasis" href="#"><i class="fab fa-github fa-lg"></i></i></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </section>
   <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Hlm5ZxJ1/czt1YRCXG/419o5s8Nvmvwhc0V7MzaQENhYOs5fsXdrvglp+kr+JYYq" crossorigin="anonymous"></script>
    <script src="?page=home"></script>
</body>

</html>