<?php 

include __DIR__ . "/../databases/koneksi.php";

$video = $connect->prepare("SELECT id, thumbnail, judul, rating FROM video ORDER BY id DESC LIMIT 4");
$video->execute();
$videos = $video->get_result();

$tampilVideo = "";
$page = $_GET['page'] ?? "home";

if ($videos->num_rows === 0) {
    $tampilVideo = "<h2 style='color: white;'>Film segera menyusul</h2>";
} else {
    while ($dataVideo = $videos->fetch_assoc()) {
        $file = htmlspecialchars($dataVideo['thumbnail']);
        $path = 'src/uploads/thumbnail/' . $file;
        $tampilVideo .= '
            <div class="col-6 col-md-3">
                <a href="route.php?page=detail&id=' . $dataVideo['id'] . '" class="card movie-card" style="text-decoration:none; color:inherit;">
                    <img src="' . $path . '" alt="' . $dataVideo["judul"] . '" />
                    <div class="card-body text-center">
                        <h5 class="card-title">' . $dataVideo["judul"] . '</h5>
                        <p class="card-text">Rating: ' . $dataVideo["rating"] . '</p>
                    </div>
                </a>
            </div>
        ';
    }
}
$connect->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bioskop Online | MovieUPN</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/css/themes/bootstrap/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="route.php?page=home" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark wadahNavbar fixed-top navbar">
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
                    <li class="nav-item"><a class="nav-link tautanNavigasi menuNav aktif" href="#"><i
                                class="fas fa-home me-1"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link tautanNavigasi" href="#showVideo"><i
                                class="fas fa-film me-1"></i> Jelajahi</a></li>
                    <li class="nav-item"><a class="nav-link tautanNavigasi" href="#tentangKami"><i
                                class="fas fa-bookmark me-1"></i> About Us</a></li>
                </ul>

                <div class="d-flex">
                    <a href="?page=daftar" class="btn btn-outline-danger me-2">Sign In</a>
                    <a href="?page=login" class="btn btn-outline-light">Log In</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="selamatdatang">
        <div class="isiSelamat">
            <h1 class="display-5 fw-bold">Selamat Datang</h1>
            <h3>Temukan film terbaru saat ini, di MovieUPN</h3>
            <a href="#showVideo" class="jelajahi">Jelajahi</a>
        </div>
    </section>

    <section class="tranding" id="showVideo">
        <div class="containerTre">
            <h2>Sedang Trending</h2>
            <div class="row justify-content-center g-4">
            <?= $tampilVideo; ?>
            </div>
        </div>
        </div>
    </section>

    <section id="tentangKami" class="sectionTentangKami">
        <div class="kontainerTentangKami">
            <div class="headerTentangKami">
                <h2>Tentang Kami</h2>
                <p>Kami adalah tim pengembang MovieUPN yang berdedikasi, bertujuan untuk menghadirkan pengalaman menonton film terbaik bagi pengunjung. Di sini, kamu bisa menemukan berbagai informasi tentang film terbaru, ulasan, trailer, dan rekomendasi film yang sedang tren. Tim kami selalu berusaha menyajikan konten yang akurat, menarik, dan up-to-date, agar pecinta film dapat menikmati hiburan berkualitas kapan pun mereka mau.</p>
            </div>

            <div class="daftarAnggota">
                <!-- Anggota 1 -->
                <div class="kartuAnggota">
                    <img src="https://i.pravatar.cc/150?img=1" alt="Affan Fiernaz" class="fotoAnggota">
                    <h3>Abyaz AffanZaky S</h3>
                    <p>Frontend Developer</p>
                </div>

                <div class="kartuAnggota">
                    <img src="https://i.pravatar.cc/150?img=2" alt="Rekan Tim 2" class="fotoAnggota">
                    <h3>Fiernaz Ingga Pratama</h3>
                    <p>Backend Developer</p>
                </div>
            </div>
        </div>
    </section>


    <footer class="sikil py-5" id="contact">
        <div class="containerS">
                <div class="footerAsik">
                    <div>
                        <h5>Footer</h5>
                        <p>Proyek praktikum Pemrograman Web Semester 3 - Informatika UPN</p>
                    </div>
                    <div>
                        <h5>Hubungi Kami</h5>
                        <p>📞 0851-2345-6789</p>
                    </div>
                </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>