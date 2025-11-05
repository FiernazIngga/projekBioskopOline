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

    $page = $_GET['page'] ?? "asd";

    function ambilSemuaFilm() {
        global $connect, $page;
        $ambil = $connect->prepare("SELECT id, thumbnail, judul, rating, durasi, role FROM video");
        $ambil->execute();
        $cek = $ambil->get_result();
        $tampil = "";
        if ($cek->num_rows === 0) {
            $tampil = "<h1>Belum ada video</h1>";
        } else {
            while ($hasil = $cek->fetch_assoc()) {
                $tampil .= '
                    <a href="?page=detail&id='.$hasil['id'].'&dari='.$page.'" class="cardImg">
                        <div class="image">
                            <img src="src/uploads/thumbnail/'.$hasil["thumbnail"].'" alt="">
                        </div>
                        <div class="keterangan">
                            <h2 class="judulImg">'.$hasil["judul"].'</h2>
                            <p>Durasi : '.$hasil["durasi"].'</p>
                            <p class="rating">Rating : '.$hasil["rating"].'</p>
                            <div class="role">'.$hasil["role"].'</div>
                        </div>
                    </a>
                ';
            }
        }
        $ambil->close();
        return $tampil;
    }

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
                            <a class="nav-link tautanNavigasi" href="#">
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
                        </div>
                    </div>
                </div>
                <div class="carousel-item active ">
                    <img src="https://deras.id/wp-content/uploads/2023/04/desktop-cropped-v2.jpg" class="d-block w-100"
                        alt="Cars 3">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
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

    <section id="video">
        <h1 class="judulSF">Nikmati Film Terbaru dan Keren</h1>
        <div class="containerFilm">
            <?= ambilSemuaFilm(); ?>
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