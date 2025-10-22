<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include "src/view/user/home.php";
        break;
    case 'login':
        include "src/view/auth/login.php";
        break;

    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}