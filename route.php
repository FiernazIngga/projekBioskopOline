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
            echo '<link rel="stylesheet" href="src/view/auth/authCss/daftar.css">';
            break;

    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}