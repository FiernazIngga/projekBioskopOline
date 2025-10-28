<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

function cekExpired($idUser) {
    global $connect;
    $cek = $connect->prepare("SELECT * FROM role WHERE id_user = ?");
    $cek->bind_param("s", $idUser);
    $cek->execute();
    $hasil = $cek->get_result();
    $rolePengguna = $hasil->fetch_assoc();
    if ($rolePengguna["role_user"] !== "Free" && $rolePengguna["expired_at"] && new DateTime($rolePengguna["expired_at"]) < new DateTime()) {
        $update = $connect->prepare("UPDATE role SET role_user = 'Free', expired_at = NULL WHERE id_user = ?");
        $update->bind_param("s", $idUser);
        $update->execute();
    }
}

function admin($username, $password) {
    global $connect;
    $dataAdmin = $connect->prepare("SELECT * FROM admin_data WHERE username = ? AND password = ?");
    $dataAdmin->bind_param("ss", $username, $password);
    $dataAdmin->execute();
    $hasilDataAdmin = $dataAdmin->get_result();
    if ($hasilDataAdmin->num_rows !== 0) {
        $dataAdminAssoc = $hasilDataAdmin->fetch_assoc();
        if ($username === $dataAdminAssoc['username'] && $password === $dataAdminAssoc['password']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Username dan password harus diisi';
    }
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        header('Location: ?page=login');
        exit;
    }
    $query = $connect->prepare("SELECT id_user, username, password, nama, email, foto_profil FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows === 0) {
        $cekLoginAdmin = admin($username, $password);
        if ($cekLoginAdmin) {
            $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/projekBioskop/";
            header("Location: " . $base_url . "routeAdmin.php?adminPage=admin123");
            exit;
        } else {
            $_SESSION['error'] = ['Username tidak ditemukan'];
            header('Location: ?page=login');
            exit;
        }
    }
    $user = $result->fetch_assoc();
    if ($password !== $user['password']) {
        $_SESSION['error'] = ['Password salah'];
        header('Location: ?page=login');
        exit;
    }
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $password;
    $_SESSION['foto_profil'] = $user['foto_profil'];
    $_SESSION['id_user'] = $user['id_user'];
    cekExpired($user['id_user']);
    
    $queryRole = $connect->prepare("SELECT id_role, id_user, role_user, expired_at FROM role WHERE id_user = ?");
    $queryRole->bind_param("s", $user['id_user']);
    $queryRole->execute();
    $resultRole = $queryRole->get_result();
    $user_role = $resultRole->fetch_assoc();
    $_SESSION['id_role'] = $user_role['id_role'];
    $_SESSION['role_user'] = $user_role['role_user'];

    header('Location: ?page=dashboardUser');
    exit;
}
?>