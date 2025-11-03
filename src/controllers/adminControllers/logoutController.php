<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['adminLogin']);
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
header("Location: " . $base_url . "route.php?page=logout");