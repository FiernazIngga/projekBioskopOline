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
        <table class="table table-striped-columns table-hover">
            <thead class="table-info text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
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

        $html .= "
            <tr>
                <td class='text-center'>{$no}</td>
                <td>{$judul}</td>
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