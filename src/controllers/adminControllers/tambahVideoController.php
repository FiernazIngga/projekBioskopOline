<?php 

include __DIR__ . "/../../databases/koneksi.php";

function folder($folder) {
    $targetDir = __DIR__ . "/../../uploads/" . $folder . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); 
    }
    return $targetDir;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambahVideo'])) {
    $videoM = false; 
    $tum = false; 
    $trailerM = false;

    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $role = $_POST['role'];
    $indexPencarian = $_POST['indexPencarian'];

    $letakVideo = folder("videos");
    $videoName = null;
    if (!empty($_FILES['video']['name'])) {
        $videoName = time() . "_" . basename($_FILES['video']['name']);
        $videoName = str_replace(' ', '', time() . "_" . basename($_FILES['video']['name']));
        $videoPath = $letakVideo . $videoName;
        $videoM = move_uploaded_file($_FILES['video']['tmp_name'], $videoPath);
    }

    $letakThumbnail = folder("thumbnail");
    $thumbnailName = null;
    if (!empty($_FILES['thumbnail']['name'])) {
        $thumbnailName = time() . "_" . basename($_FILES['thumbnail']['name']);
        $thumbnailName = str_replace(' ', '', time() . "_" . basename($_FILES['thumbnail']['name']));
        $thumbnailPath = $letakThumbnail . $thumbnailName;
        $tum = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
    }

    $letakTrailer = folder("trailer");
    $trailerName = null;
    if (!empty($_FILES['trailer']['name'])) {
        $trailerName = time() . "_" . basename($_FILES['trailer']['name']);
        $trailerName = str_replace(' ', '', time() . "_" . basename($_FILES['trailer']['name']));
        $trailerPath = $letakTrailer . $trailerName;
        $trailerM = move_uploaded_file($_FILES['trailer']['tmp_name'], $trailerPath);
    }

    $queryMasukinVideo = $connect->prepare("
        INSERT INTO video 
        (judul, sinopsis, genre, durasi, role, file_video, thumbnail, trailer, indexPencarian)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $queryMasukinVideo->bind_param(
        "sssssssss", 
        $judul, $sinopsis, $genre, $durasi, $role, 
        $videoName, $thumbnailName, $trailerName, $indexPencarian
    );

    $success = $queryMasukinVideo->execute() && $trailerM && $videoM && $tum;

    $queryMasukinVideo->close();
    $connect->close();

    if ($success) {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Video berhasil ditambahkan",
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
                        text: "Video gagal ditambahkan!",
                        icon: "error"
                    }).then((result) => {
                        window.location.href="?adminPage=videos&aksi=tambah";
                    });
                });
            </script>
            ';
        exit;
    }
}
