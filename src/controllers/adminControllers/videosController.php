<?php 

include __DIR__ . "/../../databases/koneksi.php";

function ambilVideo() {
    global $connect;

    $konekDb = $connect->prepare("SELECT * FROM video");
    $konekDb->execute();
    $hasil = $konekDb->get_result();

    if ($hasil->num_rows === 0) {
        $konekDb->close(); 
        return '
        <div class="alert alert-warning text-center mt-4">
            Belum ada video yang diupload.
        </div>';
    }

    $html = '
    <div class="containerTampil mt-4">
        <h3 class="mb-3 text-center">Daftar Video</h3>
        <table class="table-hover">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Video</th>
                    <th>Tanggal Upload</th>
                    <th>Role</th>
                    <th>Jumlah View</th>
                    <th>Jumlah Like</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';

    $no = 1;
    while ($video = $hasil->fetch_assoc()) {
        $id = $video['id'];
        $judul = htmlspecialchars($video["judul"]);
        $tanggal = date("d M Y", strtotime($video["tanggal_upload"]));
        $role = htmlspecialchars($video["role"]);
        $view = number_format($video["jumlah_view"]);
        $like = number_format($video["jumlah_like"]);
        $rating = $video["rating"];
        $file = htmlspecialchars($video["file_video"]);

        $videoPath = "src/uploads/videos/" . $file;

        $html .= "
            <tr>
                <td class='text-center'>{$no}</td>
                <td>{$judul}</td>
                <td>
                    <video width='200' height='120' controls>
                        <source src='{$videoPath}' type='video/mp4'>
                        Browser Anda tidak mendukung pemutar video.
                    </video>
                </td>
                <td class='text-center'>{$tanggal}</td>
                <td class='text-center'>{$role}</td>
                <td class='text-center'>{$view}</td>
                <td class='text-center'>{$like}</td>
                <td class='text-center'>{$rating}/5</td>
                <td class='text-center'>
                    <a class='buttonHapus' href='?adminPage=hapusVideo&video={$id}'>Hapus</a>
                </td>
            </tr>";
        $no++;
    }

    $html .= '
            </tbody>
        </table>
    </div>';

    $konekDb->close();

    return $html;
}

function tambahVideo()
{
    $form = '
    <div class="container mt-4">
        <h3 class="text-center mb-4">Tambah Video Baru</h3>
        <form method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light" action="?adminPage=tambahVideo">
            <div class="mb-3">
                <label>Judul Video</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Sinopsis</label>
                <textarea name="sinopsis" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>File Video Utama (MP4, MKV, dsb)</label>
                <input type="file" name="video" class="form-control" accept="video/*" required>
            </div>

            <div class="mb-3">
                <label>Thumbnail (Gambar)</label>
                <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Durasi (contoh: 12:45)</label>
                <input type="text" name="durasi" class="form-control">
            </div>

            <div class="mb-3">
                <label>Role Akses</label>
                <select name="role" class="form-select">
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Trailer (opsional, video pendek)</label>
                <input type="file" name="trailer" class="form-control" accept="video/*">
            </div>

            <button type="submit" name="tambahVideo" class="btn btn-primary w-100">Tambah Video</button>
        </form>
    </div>';
    
    return $form;
}
