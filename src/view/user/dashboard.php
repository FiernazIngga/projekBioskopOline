<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: ?page=login');
    exit;
}

$nama = $_SESSION['nama'];
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
    <div class="dashboard">
        <!-- <img src="uploads/<?php echo $foto; ?>" alt="Foto Profil"> -->
        <h1>Selamat Datang, <?php echo $nama; ?> 🎟️</h1>
        <p>Selamat menikmati pengalaman menonton terbaik bersama kami!</p>
        <a href="?page=logout">Keluar</a>
    </div>
</body>
</html>
