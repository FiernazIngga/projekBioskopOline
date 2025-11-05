<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['adminPage']) ? $_GET['adminPage'] : 'login';

switch ($page) {
    case 'admin123':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/view/admin/dashboardAdmin.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/dashboard.css">';
        echo '<script src="src/view/admin/adminJs/dashboard.js"></script>';
        break;
    case 'videos':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/view/admin/videos.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/videos.css">';
        echo '<script src="src/view/admin/adminJs/videos.js"></script>';
        break;
    case 'users':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/view/admin/users.php";
        echo '<link rel="stylesheet" href="src/view/admin/adminCss/users.css">';
        echo '<script src="src/view/admin/adminJs/users.js"></script>';
        break;
    case 'hapusUser':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/controllers/adminControllers/hapusUserController.php";
        break;
    case 'hapusVideo':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/controllers/adminControllers/hapusController.php";
        break;
    case 'tambahVideo':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/controllers/adminControllers/tambahVideoController.php";
        break;
    case 'editVideoControllers':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/controllers/adminControllers/editControllers.php";
        break;
    case 'editVideo':
        if (!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin']) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "route.php?page=login");
            break;
        }
        include "src/view/admin/editVideo.php";
        break;
    case 'logout':
        include "src/controllers/adminControllers/logoutController.php";
        break;
    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}