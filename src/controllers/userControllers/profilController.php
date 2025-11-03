<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['id_user'];
    $nama = trim($_POST['namaLengkap']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $fotoBaru = $_FILES['fotoProfil']['name'] ?? '';
    $uploadDir = __DIR__ . '/../../uploads/poto_profil/';
    $fotoSekarang = $_SESSION['foto_profil'];

    if (!empty($fotoBaru) && $_FILES['fotoProfil']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($fotoBaru, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed)) {
            echo "<script>alert('Format file tidak didukung!'); window.location='?page=profil';</script>";
            exit;
        }

        if ($fotoSekarang && $fotoSekarang !== 'default.png') {
            $fotoLama = $uploadDir . $fotoSekarang;
            if (file_exists($fotoLama)) {
                unlink($fotoLama);
            }
        }

        $namaFileBaru = $id . '_' . time() . '.' . $ext;
        $pathTujuan = $uploadDir . $namaFileBaru;

        if (!move_uploaded_file($_FILES['fotoProfil']['tmp_name'], $pathTujuan)) {
            echo "<script>alert('Gagal mengunggah foto.'); window.location='?page=profil';</script>";
            exit;
        }

        $fotoProfil = $namaFileBaru;
    } else {
        $fotoProfil = $fotoSekarang;
    }

    if (!empty($password)) {
        $stmt = $connect->prepare("UPDATE users SET nama = ?, username = ?, email = ?, password = ?, foto_profil = ? WHERE id_user = ?");
        $stmt->bind_param("ssssss", $nama, $username, $email, $password, $fotoProfil, $id);
    } else {
        $stmt = $connect->prepare("UPDATE users SET nama = ?, username = ?, email = ?, foto_profil = ? WHERE id_user = ?");
        $stmt->bind_param("sssss", $nama, $username, $email, $fotoProfil, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['foto_profil'] = $fotoProfil;

        echo "<script>alert('Profil berhasil diperbarui!'); window.location='?page=dashboardUser';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan perubahan.'); window.location='?page=profil';</script>";
    }

    $stmt->close(); 
}
?>
