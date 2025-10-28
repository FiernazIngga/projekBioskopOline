<?php 

include __DIR__ . "/../../databases/koneksi.php";

function cekData($idUser) {

    if (!$idUser) {
        return false;
    }

    global $connect;
    $cekData = $connect->prepare("SELECT id_user FROM role WHERE id_user = ?");
    $cekData->bind_param("s", $idUser);
    $cekData->execute();
    $hasil = $cekData->get_result();
    if ($hasil->num_rows === 0) {
        return false;
    }
    return true;
}