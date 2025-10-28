<?php 

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
header("Location: " . $base_url . "route.php?page=logout");