<?php 

include __DIR__ . "/../../databases/koneksi.php";

function cekDanMasukan($cekBayar, $role, $uangLebih) {
    $catatanKembali = "";
    if (!$cekBayar) {
        $catatanKembali = ". Sisa uang anda Rp. " . $uangLebih;
    }
    $kembalikan = new stdClass();
    if ($_SESSION['role_user'] === "Free") {
        $kembalikan->sukses = true;
        $kembalikan->catatan = "Anda berhasil berlangganan paket" . $catatanKembali;
    } else if ($_SESSION['role_user'] === $role) {
        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di perpanjang" . $catatanKembali;
    } else {
        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di ubah" . $catatanKembali;
    }
    return $kembalikan;
}