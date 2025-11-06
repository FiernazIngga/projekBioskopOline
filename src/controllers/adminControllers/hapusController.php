<?php 

include __DIR__ . "/../../databases/koneksi.php";

if (isset($_GET['adminPage']) && $_GET['adminPage'] === 'hapusVideo' && isset($_GET['video'])) {
    $id = $_GET['video'];

    $ambil = $connect->prepare("SELECT file_video, thumbnail, trailer FROM video WHERE id = ?");
    $ambil->bind_param("i", $id);
    $ambil->execute();
    $result = $ambil->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        $pathVideo = __DIR__ . "/../../uploads/videos/" . $data['file_video'];
        $pathThumb = __DIR__ . "/../../uploads/thumbnail/" . $data['thumbnail'];
        $pathTrailer = __DIR__ . "/../../uploads/trailer/" . $data['trailer'];

        $hapusVideo = $connect->prepare("DELETE FROM video WHERE id = ?");
        $hapusVideo->bind_param("i", $id);
        $hapusVideo->execute();

        if ($hapusVideo->affected_rows > 0) {
            if (file_exists($pathVideo)) unlink($pathVideo);
            if (file_exists($pathThumb)) unlink($pathThumb);
            if (!empty($data['trailer']) && file_exists($pathTrailer)) unlink($pathTrailer);

            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Anda berhasil menghapus video",
                        icon: "success"
                    }).then((result) => {
                        window.location.href="?adminPage=videos";
                    });
                });
            </script>
            ';
            exit;
        } else {
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Anda gagal menghapus video",
                        icon: "error"
                    }).then((result) => {
                        window.location.href="?adminPage=videos";
                    });
                });
            </script>
            ';
            exit;
        }
    } else {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Data video tidak ditemukan",
                        icon: "error"
                    }).then((result) => {
                        window.location.href="?adminPage=videos";
                    });
                });
            </script>
            ';
        exit;
    }
    $ambil->close();
}
$connect->close();