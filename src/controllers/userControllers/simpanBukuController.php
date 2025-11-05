<?php 
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

if (isset($_GET['page']) && $_GET['page'] === 'simpan' && isset($_GET['idBukuDiSimpan'])) {
    $id = $_GET['idBukuDiSimpan'];
    $simpan = $connect->prepare("INSERT INTO simpan_film (id_film, id_user) VALUES (?, ?)");
    $simpan->bind_param("ss", $id, $_SESSION['id_user']);

    if ($simpan->execute()) {
        $_SESSION['message'] = "Berhasil menyimpan buku";
    } else {
        $_SESSION['message'] = "Gagal menyimpan buku";
    }

    header("Location: route.php?page=detail&id=" . urlencode($id));
    exit();
}

ob_end_flush();
