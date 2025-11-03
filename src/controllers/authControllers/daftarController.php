<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $konfirmasi_password = $_POST['konfirmasi_password'] ?? '';
    
    $errors = [];
    
    if (empty($nama)) {
        $errors[] = 'Nama lengkap harus diisi';
    }
    if (empty($username)) {
        $errors[] = 'Username harus diisi';
    }
    if (empty($email)) {
        $errors[] = 'Email harus diisi';
    }
    if (empty($password)) {
        $errors[] = 'Password harus diisi';
    } elseif (strlen($password) < 3) {
        $errors[] = 'Password minimal 3 karakter';
    }
    if ($password !== $konfirmasi_password) {
        $errors[] = 'Konfirmasi password tidak cocok';
    }

    if (!empty($errors)) {
        $_SESSION['error'] = $errors;
        $_SESSION['success'] = false;
        $connect->close(); 
        header('Location: ?page=daftar');
        exit;
    }

    $queryCheck = $connect->prepare("SELECT id_user FROM users WHERE username = ?");
    $queryCheck->bind_param("s", $username);
    $queryCheck->execute();
    $result = $queryCheck->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = ['Username sudah dipakai, silakan pilih yang lain'];
        $_SESSION['success'] = false;
        $queryCheck->close(); 
        $connect->close();    
        header('Location: ?page=daftar');
        exit;
    }
    $queryCheck->close();

    $id_user = 'usr_' . uniqid() . '_' . date('Ymd');
    $foto_profile = 'default.png';

    $queryInsert = $connect->prepare("INSERT INTO users (id_user, nama, username, password, email, foto_profil) VALUES (?, ?, ?, ?, ?, ?)");
    $queryInsert->bind_param("ssssss", $id_user, $nama, $username, $password, $email, $foto_profile);

    $queryRole = $connect->prepare("INSERT INTO role (id_user) VALUE (?)");
    $queryRole->bind_param("s", $id_user);

    if ($queryInsert->execute() && $queryRole->execute()) {
        $_SESSION['success'] = true;
    } else {
        $_SESSION['error'] = ['Terjadi kesalahan saat menyimpan data: ' . $connect->error];
        $_SESSION['success'] = false;
    }

    $queryInsert->close();
    $queryRole->close();
    $connect->close();

    header('Location: ?page=daftar');
    exit;
}
