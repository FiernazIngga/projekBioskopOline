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
    <title>Your Mark</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="?page=tandai">
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
                        <a class="nav-link tautanNavigasi" href="?page=dashboardUser">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi menuNav" href="?page=tandai">
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
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <li><a class="dropdown-item itemDropdown" href="?page=logout" onclick="return confirm('Apakah kamu yakin ingin logout?');"">
                                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="?page=tandai"></script>
</body>

</html>