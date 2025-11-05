<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . "/../../databases/koneksi.php";

$id = $_GET['id'] ?? '';

$stmt = $connect->prepare("SELECT * FROM video WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<h2 style='text-align:center; margin-top:100px;'>Film tidak ditemukan.</h2>";
    exit;
}

$thumbnailPath = 'src/uploads/thumbnail/' . $data['thumbnail'];
$trailerPath = 'src/uploads/trailer/' . $data['trailer'];
$videoPath = 'src/uploads/videos/' . $data['file_video'];

$stmt->close();

if (isset($_SESSION['message'])) {
    echo '
        <script>
        alert("'.$_SESSION['message'].'");
        </script>
    ';
    unset($_SESSION['message']);
}

if (isset($_GET['kembali']) && $_GET['kembali'] === "cek") {
    if (isset($_SESSION['username'])) {
        header("Location: ?page=dashboardUser");
        exit;
    } else {
        header("Location: ?page=home");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film | <?= htmlspecialchars($data['judul']); ?></title>
    <link rel="stylesheet" href="?page=detail">
</head>
<body>

    <div class="containerUtama">
        <div class="gambarFilm">
            <video controls
                poster="<?= $thumbnailPath ?>" 
                controlsList="nodownload" 
                disablePictureInPicture>
                <source src="<?= $trailerPath ?>" type="video/mp4">
                Browser Anda tidak mendukung pemutaran video.
            </video>
        </div>

        <div class="infoFilm">
            <h1 class="judulFilm"><?= htmlspecialchars($data['judul']); ?></h1>
            <div class="ratingFilm">⭐ Rating: <?= htmlspecialchars($data['rating']); ?></div>

            <div class="infoTambahan">
                <p><strong>Durasi:</strong> <?= htmlspecialchars($data['durasi']); ?> menit</p>
                <p><strong>Genre:</strong> <?= htmlspecialchars($data['genre']); ?></p>
                <p><strong>Role:</strong> <?= htmlspecialchars($data['role']); ?></p>
                <p><strong>Jumlah Penonton:</strong> <?= htmlspecialchars($data['jumlah_view'] ?? 0); ?></p>
            </div>

            <p class="deskripsiFilm">
                <?= htmlspecialchars($data['sinopsis'] ?? 'Belum ada sinopsis untuk film ini.'); ?>
            </p>

            <a href="route.php?page=detail&kembali=cek&id=<?= $id; ?>" class="tombolKembali">← Kembali ke Beranda</a>
            <a href="?page=nonton&id=<?= $id ?>" class="tombolTonton" target="_blank">🎬 Tonton Sekarang</a>
            <a href="?page=simpan&idBukuDiSimpan=<?= $id ?>" class="tombolSimpan">
                Simpan
                <img src="src/uploads/icon/bookmarkwhite.png" alt="Bookmark Icon">
            </a>
        </div>
    </div>

    <footer>
        <p>© 2025 MovieUPN | Semua hak cipta dilindungi.</p>
    </footer>

</body>
</html>
