<?php 

$hostname = "localhost"; // Network Layer
$port = 3306; // Transport Layer
$username = "root"; // Username dari database
$password = ""; // Password dari database
$database = "bioskopweb"; // Nama database

$conect = null;

try {
    $connect = new mysqli($hostname, $username, $password, $database, $port);
} catch(Exception $e) {
    echo "<script>
            alert('Terjadi Kesalahan');
            window.location.href = '?page=home';
        </script>";
}