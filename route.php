<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    // Halaman utama
    case 'home':
        include "src/view/home.php";
        break;

    // Authentication
    case 'login':
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
        include "src/view/user/dashboard.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/dashboard.css">';
        echo '<script src="src/view/user/userJs/dashboard.js"></script>';
        break;
    case 'tandai':
        include "src/view/user/tandai.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/tandai.css">';
        echo '<script src="src/view/user/userJs/tandai.js"></script>';
        break;
    case 'riwayat':
        include "src/view/user/riwayat.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/riwayat.css">';
        echo '<script src="src/view/user/userJs/riwayat.js"></script>';
        break;
    case 'profil':
        include "src/controllers/userControllers/profilController.php";
        include "src/view/user/profile.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/profil.css">';
        echo '<script src="src/view/user/userJs/profil.js"></script>';
        break;
    case 'langganan':
        include "src/controllers/userControllers/langgananController.php";
        include "src/view/user/langganan.php";
        echo '<link rel="stylesheet" href="src/view/user/userCss/langganan.css">';
        echo '<script src="src/view/user/userJs/langganan.js"></script>';
        break;

    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}