<?php 

$page = isset($_GET['adminPage']) ? $_GET['adminPage'] : 'login';

switch ($page) {
    case 'admin123':
        include "src/view/admin/dashboardAdmin.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/dashboard.css">';
        echo '<script src="src/view/admin/adminJs/dashboard.js"></script>';
        break;
    case 'videos':
        include "src/view/admin/videos.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/videos.css">';
        echo '<script src="src/view/admin/adminJs/videos.js"></script>';
        break;
    case 'users':
        include "src/view/admin/users.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/users.css">';
        echo '<script src="src/view/admin/adminJs/users.js"></script>';
        break;
    case 'hapusUser':
        include "src/controllers/adminControllers/hapusUserController.php";
        break;
    case 'hapusVideo':
        include "src/controllers/adminControllers/hapusController.php";
        break;
    case 'tambahVideo':
        include "src/controllers/adminControllers/tambahVideoController.php";
        break;
    case 'logout':
        include "src/controllers/adminControllers/logoutController.php";
        break;
    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}