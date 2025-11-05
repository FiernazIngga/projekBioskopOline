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
    <title>Home User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="?page=dashboard">
</head>

<body>
    <header>
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
                            <a class="nav-link tautanNavigasi" href="?page=genre">
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
                            <input type="text" class="form-control inputPencarian"
                                placeholder="Cari film atau serial...">
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
                                <li><a class="dropdown-item itemDropdown" href="?page=langganan">
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
    </header>

    <section class="banner">
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators"> <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0"
                    class="" aria-label="Slide 1"></button> <button type="button" data-bs-target="#myCarousel"
                    data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button> <button
                    type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                    class=""></button> </div>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img src="https://i0.wp.com/2.bp.blogspot.com/-UQUJKUj3SIc/UYj6MV2tK0I/AAAAAAAAASc/x16Cc_TSZ-g/s1600/FF6%2BDurtch%2BPoster.jpg"
                        class="d-block w-100" alt="Cars 3">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the
                                carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active ">
                    <img src="https://deras.id/wp-content/uploads/2023/04/desktop-cropped-v2.jpg" class="d-block w-100"
                        alt="Cars 3">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Saksikan Fast And Furious X.</h1>
                            <p>Film Action terbaru dan terbaik</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Tonton</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="https://images.squarespace-cdn.com/content/v1/57d4cbcb9f7456b185ce057b/1508820292576-QZ5YO8C2JPEZ6M8K1YQO/C3_banner.jpg"
                        class="d-block w-100" alt="Cars 3">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div> <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                    class="visually-hidden">Previous</span> </button> <button class="carousel-control-next"
                type="button" data-bs-target="#myCarousel" data-bs-slide="next"> <span
                    class="carousel-control-next-icon" aria-hidden="true"></span> <span
                    class="visually-hidden">Next</span> </button>
        </div>
    </section>

    <section class="kartu">
        <div class="container">
            <div class="pt-5">
                <h3>Sedang Tren</h3>
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
                <h3>Terbaru</h3>
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

    <section class="berita">
        <div class="container">
            <h3>Berita Terkini</h3>
            <div class="row pt-2">
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static"> <strong
                                class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                            <h3 class="mb-0">Featured post</h3>
                            <div class="mb-1 text-body-secondary">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p> <a href="#"
                                class="icon-link gap-1 icon-link-hover stretched-link">
                                Continue reading
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#chevron-right"></use>
                                </svg> </a>
                        </div>
                        <div class="col-auto d-none d-lg-block"> <svg aria-label="Placeholder: Thumbnail"
                                class="bd-placeholder-img " height="250" preserveAspectRatio="xMidYMid slice" role="img"
                                width="200" xmlns="http://www.w3.org/2000/svg">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                    fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static"> <strong
                                class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                            <h3 class="mb-0">Post title</h3>
                            <div class="mb-1 text-body-secondary">Nov 11</div>
                            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p> <a href="#"
                                class="icon-link gap-1 icon-link-hover stretched-link">
                                Continue reading
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#chevron-right"></use>
                                </svg> </a>
                        </div>
                        <div class="col-auto d-none d-lg-block"> <svg aria-label="Placeholder: Thumbnail"
                                class="bd-placeholder-img " height="250" preserveAspectRatio="xMidYMid slice" role="img"
                                width="200" xmlns="http://www.w3.org/2000/svg">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                    fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg> </div>
                    </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>

    <script src="?page=dashboardUser"></script>
</body>

</html>