<?php 

include __DIR__ . "/../../databases/koneksi.php";
$id;
if (isset($_GET['idVideo'])) {
    $id = $_GET['idVideo'];
}

function dataAwal() {
    global $connect, $id;
    $data = $connect->prepare("SELECT * FROM video WHERE id = ?");
    $data->bind_param("s", $id);
    $data->execute();
    $hasil = $data->get_result();
    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $data->close();
        return $row;
    } else {
        $data->close();                                                             
        return "Tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
</head>
<body>
    <h1>Edit Video</h1>
    <form action="?adminPage=editVideoControllers&idVideo=<?= $id; ?>" method="post" enctype="multipart/form-data">
        <label>Judul Video:</label><br>
        <input type="text" name="judul" value="<?= htmlspecialchars(dataAwal()['judul']) ?>"><br><br>
        <label>Sinopsis Video:</label><br>
        <textarea name="sinopsis" rows="3"><?= htmlspecialchars(dataAwal()['sinopsis']) ?></textarea><br><br>
        <label>File Video Utama (kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="fileVideoUtama" accept="video/*"><br>
        <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['file_video'])) ?></small><br><br>
        <label>Thumbnail Video (kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="fileThumbnail" accept="image/*"><br>
        <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['thumbnail'])) ?></small><br><br>
        <label>Genre:</label><br>
        <input type="text" name="genre" value="<?= htmlspecialchars(dataAwal()['genre']) ?>"><br><br>
        <label>Durasi (menit):</label><br>
        <input type="number" name="durasi" value="<?= htmlspecialchars(dataAwal()['durasi']) ?>"><br><br>
        <label>Role Akses:</label><br>
        <select name="role">
            <option value="Basic" <?= dataAwal()['role'] === 'Basic' ? 'selected' : '' ?>>Basic</option>
            <option value="Premium" <?= dataAwal()['role'] === 'Premium' ? 'selected' : '' ?>>Premium</option>
        </select><br><br>
        <label>Trailer (kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="trailer" accept="video/*"><br>
        <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['trailer'])) ?></small><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>

</body>
</html>