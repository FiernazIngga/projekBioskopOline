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

?> 

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="?page=langganan">
    <!-- <link rel="stylesheet" href="userCss/langganan.css"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark wadahNavbar">
        <div class="container">
            <a class="navbar-brand logoAplikasi" href="?page=dashboardUser"> Kembali</a>
            <button class="navbar-toggler tombolToggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuUtama">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <h1 class="tautanNavigasi"> Paket Langganan </h1>
                    </li>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="<?= $foto; ?>" alt="Profil" class="gambarProfil">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end menuDropdown">
                            <li><span class="headerDropdown">AKUN ANDA</span></li>
                            <li><a class="dropdown-item itemDropdown" href="?page=profil">
                                    <i class="fas fa-user me-2"></i> Profil (<?= $_SESSION['role_user']; ?> Plan)
                                </a></li>
                            <li><a class="dropdown-item itemDropdown" href="?page=langganan">
                                    <i class="fas fa-credit-card me-2"></i> Langganan
                                </a></li>
                            <li>
                                <hr class="pemisahDropdown">
                            </li>
                            <li><a class="dropdown-item itemDropdown" onclick="confirmLogout()">
                                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section id="isi">
        <h1>Pilih Paket</h1>
        <div class="paket">
            <div class="card" style="width: 18rem;">
                <div class="keterangan">
                <i class="fa fa-film fa-3x" aria-hidden="true"></i>
                BASIC</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. 100.000,00 / Month</h5>
                    <p class="card-text">
                        <span>✅ Akses video umum terbatas</span><br>
                    </p>
                    <div class="tombolPaket">
                        <button onclick="langganan('Basic', '<?= $_SESSION['id_user']; ?>')" class="btn btn-primary">Langganan</button>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="keterangan">
                  <i class="fa fa-film fa-3x" aria-hidden="true"></i>    
                PREMIUM</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. 200.000,00 / Month</h5>
                    <p class="card-text">
                        <span>✅ Akses video tanpa batas</span><br>
                    </p>
                    <div class="tombolPaket">
                        <button onclick="langganan('Premium', '<?= $_SESSION['id_user']; ?>')" class="btn btn-primary">Langganan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="?page=langganan"></script>
    <!-- <script src="userJs/langganan.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmLogout() {
        Swal.fire({
            title: "Apakah kamu yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, logout",
            cancelButtonText: "Batal",
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            theme : "dark"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?page=logout";
            }
        });
    }
    </script>
</body>

</html>