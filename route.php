<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    // Halaman utama
    case 'home':
        include "src/view/home.php";
        echo '<link rel="stylesheet" href="src/view/home.css">';
        break;

    // Authentication
    case 'login':
        if (isset($_SESSION['userLogin'])) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            $path = $base_url . "route.php?page=dashboardUser";
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        title: "Anda sudah login",
                        text: "Pilih aksi Anda:",
                        icon: "question",
                        showDenyButton: true,
                        confirmButtonText: "Logout",
                        denyButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "?page=logout";
                        } else if (result.isDenied) {
                            window.location.href = "'.$path.'";
                        }
                    });
                });
            </script>
            ';
            exit();
        }
        if (isset($_SESSION['adminLogin'])) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            $path = $base_url . "routeAdmin.php?adminPage=admin123";
            $logout = $base_url . "routeAdmin.php?adminPage=logout";
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        title: "Anda sudah login",
                        text: "Pilih aksi Anda:",
                        icon: "question",
                        showDenyButton: true,
                        confirmButtonText: "Logout",
                        denyButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "'.$logout.'";
                        } else if (result.isDenied) {
                            window.location.href = "'.$path.'";
                        }
                    });
                });
            </script>
            ';
            break;
        }
        include "src/controllers/authControllers/loginController.php";
        include "src/view/auth/login.php";
        echo '<link rel="stylesheet" href="src/view/auth/authCss/login.css">';
        break;
    case 'daftar':
        include "src/controllers/authControllers/daftarController.php";
        include "src/view/auth/daftar.php";
        echo '<link rel="stylesheet" href="src/view/auth/authCss/daftar.css">';
        break;
    case 'logout':
        include "src/controllers/authControllers/logoutController.php";
        break;
            
    // Halaman User
    case 'dashboardUser':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/dashboard.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/dashboard.css">';
        echo '<script src="src/view/user/userJs/dashboard.js"></script>';
        break;
    case 'tandai':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/tandai.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/tandai.css">';
        echo '<script src="src/view/user/userJs/tandai.js"></script>';
        break;
    case 'genre':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/genre.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/genre.css">';
        echo '<script src="src/view/user/userJs/genre.js"></script>';
        break;
    case 'riwayat':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/riwayat.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/riwayat.css">';
        echo '<script src="src/view/user/userJs/riwayat.js"></script>';
        break;
    case 'profil':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/controllers/userControllers/profilController.php";
        include "src/view/user/profile.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/profil.css">';
        echo '<script src="src/view/user/userJs/profil.js"></script>';
        break;
    case 'langganan':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/controllers/userControllers/langgananController.php";
        include "src/view/user/langganan.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/langganan.css">';
        echo '<script src="src/view/user/userJs/langganan.js"></script>';
        break;
    case 'bayar':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/bayar.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/bayar.css">';
        echo '<script src="src/view/user/userJs/bayar.js"></script>';
        break;
    case 'nonton':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/view/user/nonton.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/nonton.css">';
        echo '<script src="src/view/user/userJs/nonton.js"></script>';
        break;
    case 'detail':
        include "src/view/user/detail.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/detail.css">';
        echo '<script src="src/view/user/userJs/detail.js"></script>';
        break;
    case 'simpan':
        if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            exit();
        }
        include "src/controllers/userControllers/simpanBukuController.php";
        break;
    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}