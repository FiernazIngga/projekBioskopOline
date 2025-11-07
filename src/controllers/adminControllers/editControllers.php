<?php 
include __DIR__ . "/../../databases/koneksi.php";

function folder($folder) {
    $targetDir = __DIR__ . "/../../uploads/" . $folder . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); 
    }
    return $targetDir;
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $idVideo = $_GET['idVideo'] ?? "";
    if ($idVideo === "") {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Tidak ada id video, silahkan ulangi",
                        icon: "error"
                    }).then((result) => {
                        window.location.href="?adminPage=videos";
                    });
                });
            </script>
            ';
    } else {
        $judul     = $_POST['judul'] ?? '';
        $sinopsis  = $_POST['sinopsis'] ?? '';
        $genre     = $_POST['genre'] ?? '';
        $durasi    = $_POST['durasi'] ?? 0;
        $role      = $_POST['role'] ?? 'Basic';
        $indexPencarian = $_POST['indexPencarian'] ?? '';

        $fileVideoUtama = $_FILES['fileVideoUtama'] ?? null;
        $fileThumbnail  = $_FILES['fileThumbnail'] ?? null;
        $trailer        = $_FILES['trailer'] ?? null;

        $ambilData = $connect->prepare("SELECT * FROM video WHERE id = ?");
        $ambilData->bind_param("i", $idVideo);
        $ambilData->execute();
        $dataLama = $ambilData->get_result()->fetch_assoc();

        if ($fileVideoUtama && $fileVideoUtama['error'] === 0) {
            $namaVideoBaru = time() . "_" . basename($fileVideoUtama['name']);
            move_uploaded_file($fileVideoUtama['tmp_name'], folder("videos") . $namaVideoBaru);
            if (file_exists(folder("videos") . $dataLama['file_video'])) {
                unlink(folder("videos") . $dataLama['file_video']);
            }
        } else {
            $namaVideoBaru = $dataLama['file_video'];
        }
        if ($fileThumbnail && $fileThumbnail['error'] === 0) {
            $namaThumbnailBaru = time() . "_" . basename($fileThumbnail['name']);
            move_uploaded_file($fileThumbnail['tmp_name'], folder("thumbnail") . $namaThumbnailBaru);
            if (file_exists(folder("thumbnail") . $dataLama['thumbnail'])) {
                unlink(folder("thumbnail") . $dataLama['thumbnail']);
            }
        } else {
            $namaThumbnailBaru = $dataLama['thumbnail'];
        }
        if ($trailer && $trailer['error'] === 0) {
            $namaTrailerBaru = time() . "_" . basename($trailer['name']);
            move_uploaded_file($trailer['tmp_name'], folder("trailer") . $namaTrailerBaru);
            if (file_exists(folder("trailer") . $dataLama['trailer'])) {
                unlink(folder("trailer") . $dataLama['trailer']);
            }
        } else {
            $namaTrailerBaru = $dataLama['trailer'];
        }

        $update = $connect->prepare("UPDATE video SET judul=?, sinopsis=?, file_video=?, thumbnail=?, genre=?, durasi=?, role=?, trailer=?, indexPencarian=? WHERE id=?");
        $update->bind_param("sssssssssi", $judul, $sinopsis, $namaVideoBaru, $namaThumbnailBaru, $genre, $durasi, $role, $namaTrailerBaru, $indexPencarian, $idVideo);
        $update->execute();

        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Data video berhasil diperbarui",
                        icon: "success"
                    }).then((result) => {
                        window.location.href="?adminPage=videos";
                    });
                });
            </script>
            ';

    }
}