<?php

include __DIR__ . "/../../databases/koneksi.php";
$id;
if (isset($_GET['idVideo'])) {
    $id = $_GET['idVideo'];
}

function dataAwal()
{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4 text-white">Edit Video</h1>
        <div class="p-4 mb-4 border rounded-2 shadow-sm bg-light">
            <form action="?adminPage=editVideoControllers&idVideo=<?= $id; ?>" method="post"
                enctype="multipart/form-data">
                <label>Judul Video:</label><br>
                <input class="form-control" name="judul" value="<?= htmlspecialchars(dataAwal()['judul']) ?>"><br><br>
                <label>Sinopsis Video:</label><br>
                <textarea class="form-control" name="sinopsis" rows="3"><?= htmlspecialchars(dataAwal()['sinopsis']) ?></textarea><br><br>
                <label>File Video Utama (kosongkan jika tidak ingin ganti):</label><br>
                <input class="form-control" type="file" name="fileVideoUtama" accept="video/*"><br>
                <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['file_video'])) ?></small><br><br>
                <label>Thumbnail Video (kosongkan jika tidak ingin ganti):</label><br>
                <input class="form-control" type="file" name="fileThumbnail" accept="image/*"><br>
                <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['thumbnail'])) ?></small><br><br>
                <label>Genre:</label><br>
                <input class="form-control" type="text" name="genre" value="<?= htmlspecialchars(dataAwal()['genre']) ?>"><br><br>
                <label>Durasi (menit):</label><br>
                <input class="form-control" type="text" name="durasi" value="<?= htmlspecialchars(dataAwal()['durasi']) ?>"><br><br>
                <label>Role Akses:</label><br>
                <select class="form-select" name="role">
                    <option value="Basic" <?= dataAwal()['role'] === 'Basic' ? 'selected' : '' ?>>Basic</option>
                    <option value="Premium" <?= dataAwal()['role'] === 'Premium' ? 'selected' : '' ?>>Premium</option>
                </select><br><br>
                <label>Trailer (kosongkan jika tidak ingin ganti):</label><br>
                <input class="form-control" type="file" name="trailer" accept="video/*"><br>
                <small>File saat ini: <?= htmlspecialchars(basename(dataAwal()['trailer'])) ?></small><br><br>
                <textarea class="form-control" name="indexPencarian" rows="3"><?= htmlspecialchars(dataAwal()['indexPencarian']) ?></textarea><br><br>
                <button class='btn btn-outline-primary'type="submit">Simpan Perubahan</button>
                <a href="?adminPage=videos" class='btn btn-outline-danger'>Batal</a>
            </form>
            <br>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    
</body>

</html>