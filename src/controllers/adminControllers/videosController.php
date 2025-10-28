<?php 

include __DIR__ . "/../../databases/koneksi.php";

function ambilVideo() {
    global $connect;
    $konekDb = $connect->prepare("SELECT * FROM video");
    $konekDb->execute();
    $hasil = $konekDb->get_result();

    if ($hasil->num_rows === 0) {
        return '
        <div class="alert alert-warning text-center mt-4">
            Belum ada video yang diupload.
        </div>';
    }

    $html = '
    <div class="containerTampil mt-4">
        <h3 class="mb-3 text-center">Daftar Video</h3>
        <table class="table table-dark table-striped-columns table-hover">
            <thead class="table text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Video</th>
                    <th>Tanggal Upload</th>
                    <th>Role</th>
                    <th>Jumlah View</th>
                    <th>Jumlah Like</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>';
    
    $no = 1;
    while ($video = $hasil->fetch_assoc()) {
        $judul = $video["judul"];
        $tanggal = date("d M Y", strtotime($video["tanggal_upload"]));
        $role = $video["role"];
        $view = number_format($video["jumlah_view"]);
        $like = number_format($video["jumlah_like"]);
        $rating = $video["rating"];
        $file = htmlspecialchars($video["nama_file"]);

        $videoPath = "src/uploads/videos/" . $file;

        $html .= "
            <tr>
                <td class='text-center'>{$no}</td>
                <td>{$judul}</td>
                <td> <video width='200' height='120' controls>
                        <source src='{$videoPath}' type='video/mp4'>
                        Browser Anda tidak mendukung pemutar video.
                    </video></td>
                <td class='text-center'>{$tanggal}</td>
                <td class='text-center'>{$role}</td>
                <td class='text-center'>{$view}</td>
                <td class='text-center'>{$like}</td>
                <td class='text-center'>{$rating}/5</td>
            </tr>";
        $no++;
    }

    $html .= '
            </tbody>
        </table>
    </div>';

    return $html;
}

function tambahVideo(){
    return '
    <div class="container">
        <h3>Upload Video Baru</h3>
        <form action="?page=videos&aksi=simpan" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Video</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Pilih thumbnail Video</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="picture/*" required>
            </div>
            <div class="mb-3">
                <label for="video_file" class="form-label">Pilih File Video</label>
                <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role Pengunggah</label>
                <select name="role" id="role" class="form-select">
                    <option value="standart">Standart</option>
                    <option value="premium">Premium</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Upload Video</button>
            <a href="?page=videos" class="btn btn-secondary">Kembali</a>
        </form>
    </div>';
}

function prosesUploadVideo() {
    global $connect;

    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'] ?? '';
    $role = $_POST['role'];

    $targetDir = __DIR__ . "/../../uploads/videos/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $namaFileAsli = $_FILES["video_file"]["name"];
    $namaSementara = $_FILES["video_file"]["tmp_name"];
    $ekstensi = pathinfo($namaFileAsli, PATHINFO_EXTENSION);
    $namaUnik = uniqid("vid_") . "." . $ekstensi;
    $targetFile = $targetDir . $namaUnik;
    
    
    // Validasi ukuran (maks 100MB)
    if ($_FILES["video_file"]["size"] > 100 * 1024 * 1024) {
        return '<div class="alert alert-danger mt-3 text-center">Ukuran file terlalu besar (maksimal 100MB)</div>';
    }

    // Upload file
    if (move_uploaded_file($namaSementara, $targetFile)) {
        $stmt = $connect->prepare("INSERT INTO video (judul, deskripsi, nama_file, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $judul, $deskripsi, $namaUnik, $role);
        $stmt->execute();

        return '<div class="alert alert-success mt-3 text-center">Video berhasil diupload!</div>
                <div class="text-center mt-3">
                    <a href="?page=videos&aksi=lihat" class="btn btn-success">Lihat Daftar Video</a>
                </div>';
    } else {
        return '<div class="alert alert-danger mt-3 text-center">Gagal mengupload video.</div>';
    }
}
?>


