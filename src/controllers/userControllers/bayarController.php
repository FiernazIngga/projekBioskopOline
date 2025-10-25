<?php 

include __DIR__ . "/../../databases/koneksi.php";

$idUser = $_SESSION['id_user'];
$stmt = $connect->prepare("SELECT * FROM role WHERE id_user = ?");
$stmt->bind_param("s", $idUser);
$stmt->execute();
$data = $stmt->get_result();
$result = $data->fetch_assoc();
$hariIni = new DateTime();
$expired = $result['expired_at'] ? new DateTime($result['expired_at']) : null;

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
        $kembalikan->catatan = "Anda berhasil berlangganan paket" . $catatanKembali . $roleBaru;
    } else if ($_SESSION['role_user'] === $role) {
        $expiredBaru = (clone $expired)->modify('+1 month')->format('Y-m-d H:i:s');
        $updateRole = $connect->prepare("UPDATE role SET expired_at = ? WHERE id_user = ?");
        $updateRole->bind_param("ss", $expiredBaru, $idUser);
        $updateRole->execute();

        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di perpanjang" . $catatanKembali;
    } else {
        $kembalikan->sukses = true;
        $kembalikan->catatan = "Paket anda berhasil di ubah" . $catatanKembali;
    }
    return $kembalikan;
}