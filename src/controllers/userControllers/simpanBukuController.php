<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

if (isset($_GET['page']) && $_GET['page'] === 'simpan' && isset($_GET['idBukuDiSimpan'])) {
    $idFilm = $_GET['idBukuDiSimpan'];
    $idUser = $_SESSION['id_user'];

    $cek = $connect->prepare("SELECT * FROM simpan_film WHERE id_film = ? AND id_user = ?");
    $cek->bind_param("ss", $idFilm, $idUser);
    $cek->execute();
    $hasil = $cek->get_result();
    $cek->close();

    if ($hasil->num_rows > 0) {
        $hapus = $connect->prepare("DELETE FROM simpan_film WHERE id_film = ? AND id_user = ?");
        $hapus->bind_param("ss", $idFilm, $idUser);
        $hapus->execute();
        $hapus->close();

        $_SESSION['message'] = "removed";
    } else {
        $simpan = $connect->prepare("INSERT INTO simpan_film (id_film, id_user) VALUES (?, ?)");
        $simpan->bind_param("ss", $idFilm, $idUser);
        if ($simpan->execute()) {
            $_SESSION['message'] = "saved";
        } else {
            $_SESSION['message'] = "error";
        }
        $simpan->close();
    }

    header("Location: route.php?page=detail&id=" . urlencode($idFilm));
    exit();
}

