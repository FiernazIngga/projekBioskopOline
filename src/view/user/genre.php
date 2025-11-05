<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include __DIR__ . "/../../controllers/userControllers/cekAuth.php";

    $idUser = $_SESSION['id_user'] ?? null;
    
    if ($idUser && !cekData($idUser)) {
        header('Location: ?page=login');
        exit;
    }

    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
    $foto = dirname($_SERVER['SCRIPT_NAME']) . '/src/uploads/poto_profil/' . $_SESSION['foto_profil'];
    $id = $_SESSION['id_user'];
    $role = $_SESSION['role_user'];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Streaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="?page=tandai">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark wadahNavbar">
        <div class="container">
            <a class="navbar-brand logoAplikasi" href="#">
                <i class="fas fa-play-circle me-2"></i>MovieUPN
            </a>
            <button class="navbar-toggler tombolToggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuUtama">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="?page=dashboardUser">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi menuNav" href="?page=genre">
                            <i class="fas fa-film me-1"></i> Genre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="?page=tandai">
                            <i class="fas fa-bookmark me-1"></i> Tandai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="?page=riwayat">
                            <i class="fas fa-history me-1"></i> Riwayat
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="kotakPencarian me-3">
                        <i class="fas fa-search ikonPencarian"></i>
                        <input type="text" class="form-control inputPencarian" placeholder="Cari film atau serial...">
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="<?= $foto; ?>" alt="Profil" class="gambarProfil">
                            </a>
                        <ul class="dropdown-menu dropdown-menu-end menuDropdown">
                            <li><span class="headerDropdown">AKUN ANDA</span></li>
                                <li><a class="dropdown-item itemDropdown" href="?page=profil">
                                        <i class="fas fa-user me-2"></i> Profil (<?= $role; ?> Plan)
                                    </a></li>
                            <li><a class="dropdown-item itemDropdown" href="#">
                                    <i class="fas fa-user me-2"></i> Profil Saya
                                </a></li>
                            <li><a class="dropdown-item itemDropdown" href="#">
                                    <i class="fas fa-credit-card me-2"></i> Langganan
                                </a></li>
                            <li>
                                <hr class="pemisahDropdown">
                            </li>
                            <li><a class="dropdown-item itemDropdown" href="?page=logout"
                                        onclick="return confirm('Apakah kamu yakin ingin logout?');">
                                        <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                    </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="kartu">
        <div class="container">
            <div class="pt-5">
                <h3>Action</h3>
                <div id="carouselTranding" class="carousel slide p-5" data-bs-wrap="false">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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
                <h3>Thriller</h3>
                <div id="carouselTerbaru" class="carousel slide p-5" data-bs-wrap="false">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center g-4 gx-5">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://lumiere-a.akamaihd.net/v1/images/p_cars3_19643_3ab8aca1.jpeg"
                                            class="card-img-top" alt="Cars 3">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
                                        <img src="https://m.media-amazon.com/images/M/MV5BMTQ2NTMxODEyNV5BMl5BanBnXkFtZTcwMDgxMjA0MQ@@._V1_.jpg"
                                            class="card-img-top" alt="Movie">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block">
                                    <div class="card kartuFilm text-bg-dark border-0 rounded-4 shadow-lg overflow-hidden">
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

    <section class="sikil" data-bs-theme="dark">
        <div class="container">
            <footer class="py-5">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="userJs/dashboard.js"></script>
</body>

</html>