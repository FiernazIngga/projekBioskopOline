<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../databases/koneksi.php";

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo "<h2 style='text-align:center; margin-top:100px; color:#fff;'>ID film tidak diberikan.</h2>";
    exit;
}

$stmt = $connect->prepare("SELECT * FROM video WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if ($_SESSION['role_user'] === "Free" || $_SESSION['role_user'] === "Basic" && $data['role'] === "Premium") {
    echo 'a
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                Swal.fire({
                    title: "Wah Paket Anda Berbeda😥",
                    text: "Paket anda sekarang '.$_SESSION['role_user'].' sedangkan video membutuhkan paket '.$data['role'].', apakah anda mau meningkatkan langganan?",
                    icon: "question",
                    showDenyButton: true,
                    confirmButtonText: "Iyanih😃",
                    denyButtonText: "Engga e🤧"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "?page=langganan";
                    } else if (result.isDenied) {
                        window.location.href = "?page=detail&id='.$id.'";
                    }
                });
            });
        </script>
    ';
    exit;
}

if (!$data) {
    echo "<h2 style='text-align:center; margin-top:100px; color:#fff;'>Film tidak ditemukan.</h2>";
    exit;
}

$thumbnailPath = 'src/uploads/thumbnail/' . htmlspecialchars($data['thumbnail']);
$videoPath = 'src/uploads/videos/' . htmlspecialchars($data['file_video']);

$updateView = $connect->prepare("UPDATE video SET jumlah_view = COALESCE(jumlah_view,0) + 1 WHERE id = ?");
$updateView->bind_param("s", $id);
$updateView->execute();
$updateView->close();

$id_user = $_SESSION['id_user'] ?? '';
$cekRiwayat = $connect->prepare("SELECT * FROM riwayat WHERE id_user = ? AND id_video = ?");
$cekRiwayat->bind_param("ss", $id_user, $id);
$cekRiwayat->execute();
$resultRiwayat = $cekRiwayat->get_result();
$tanggalSekarang = date('Y-m-d H:i:s');

if ($resultRiwayat->num_rows === 0) {
    $insertRiwayat = $connect->prepare("INSERT INTO riwayat (id_user, id_video, tanggal) VALUES (?, ?, ?)");
    $insertRiwayat->bind_param("sss", $id_user, $id, $tanggalSekarang);
    $insertRiwayat->execute();
    $insertRiwayat->close();
} else {
    $updateRiwayat = $connect->prepare("UPDATE riwayat SET tanggal = ? WHERE id_user = ? AND id_video = ?");
    $updateRiwayat->bind_param("sss", $tanggalSekarang, $id_user, $id);
    $updateRiwayat->execute();
    $updateRiwayat->close();
}

$cekRiwayat->close();

$thumbnailPath = 'src/uploads/thumbnail/' . htmlspecialchars($data['thumbnail']);
$videoPath = 'src/uploads/videos/' . htmlspecialchars($data['file_video']);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Tonton | <?= htmlspecialchars($data['judul']); ?> - MovieUPN</title>
    <link rel="stylesheet" href="?page=nonton">
</head>
<body>

    <h1 class="judulFilm"><?= htmlspecialchars($data['judul']) ?></h1>

    <video class="video-player" controls 
        poster="<?= $thumbnailPath ?>" 
        controlsList="nodownload" 
        disablePictureInPicture>
        <source src="<?= $videoPath ?>" type="video/mp4">
        Browser Anda tidak mendukung pemutaran video.
    </video>

    <a href="route.php?page=detail&id=<?= urlencode($id) ?>" class="tombolKembali">🔙 Kembali ke Detail Film</a>

</body>
</html>
