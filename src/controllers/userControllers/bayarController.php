<?php 

include __DIR__ . "/../../databases/koneksi.php";

$idUser = $_SESSION['id_user'];
$dataUser = $connect->prepare("SELECT * FROM role WHERE id_user = ?");
$dataUser->bind_param("s", $idUser);
$dataUser->execute();
$hasilData = $dataUser->get_result();
$dataArray = $hasilData->fetch_assoc();
$hariIni = new DateTime();
$expired = $dataArray['expired_at'] ? new DateTime($dataArray['expired_at']) : null;

function cekDanMasukan($cekBayar, $role, $uangLebih) {
    global $connect, $idUser, $expired;
    $catatanKembali = "";
    if (!$cekBayar) {
        $catatanKembali = ". Sisa uang anda Rp. " . $uangLebih;
    }
    $kembalikan = new stdClass();
    if ($_SESSION['role_user'] === "Free") {
        global $hariIni;
        $newExpired = $hariIni->modify('+1 month')->format('Y-m-d H:i:s');

        $updateRole = $connect->prepare("UPDATE role SET role_user = ?, expired_at = ? WHERE id_user = ?");
        $updateRole->bind_param("sss", $role, $newExpired, $idUser);
        $updateRole->execute();

        $ambilDataBaru = $connect->prepare("SELECT * FROM role WHERE id_user = ?");
        $ambilDataBaru->bind_param("s", $idUser);
        $ambilDataBaru->execute();
        $hasilUpdate = $ambilDataBaru->get_result();
        $roleBaru = $hasilUpdate->fetch_assoc();
        $_SESSION['role_user'] = $roleBaru['role_user'];

        $kembalikan->sukses = true;
        $kembalikan->catatan = "Anda berhasil berlangganan paket " . $roleBaru['role_user'] . $catatanKembali;
    } else if ($_SESSION['role_user'] === $role) {
        $expiredBaru = (clone $expired)->modify('+1 month')->format('Y-m-d H:i:s');
        $updateRole = $connect->prepare("UPDATE role SET expired_at = ? WHERE id_user = ?");
        $updateRole->bind_param("ss", $expiredBaru, $idUser);
        $updateRole->execute();

        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di perpanjang" . $catatanKembali;
    } else {
        global $hariIni;
        $newExpired = $hariIni->modify('+1 month')->format('Y-m-d H:i:s');

        $ubahRole = $connect->prepare("UPDATE role SET role_user = ?, expired_at = ? WHERE id_user = ?");
        $ubahRole->bind_param("sss", $role, $newExpired, $idUser);
        $ubahRole->execute();

        $gantiPaket = $connect->prepare("SELECT * FROM role WHERE id_user = ?");
        $gantiPaket->bind_param("s", $idUser);
        $gantiPaket->execute();
        $hasilGanti = $gantiPaket->get_result();
        $paketBaru = $hasilGanti->fetch_assoc();
        $_SESSION['role_user'] = $paketBaru['role_user'];

        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di ubah" . $catatanKembali;
    }
    return $kembalikan;
}