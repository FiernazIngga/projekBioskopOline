<?php 

include __DIR__ . "/../../databases/koneksi.php";

if (isset($_GET['adminPage']) && $_GET['adminPage'] === 'hapusUser' && isset($_GET['user'])) {
    $idUser = $_GET['user'];
    
    $hapusUser = $connect->prepare("DELETE FROM users WHERE id_user = ?");
    $hapusUser->bind_param("s", $idUser);
    $hapusUser->execute();

    $hapusUserRole = $connect->prepare("DELETE FROM role WHERE id_user = ?");
    $hapusUserRole->bind_param("s", $idUser);
    $hapusUserRole->execute();

    if ($hapusUser->affected_rows > 0 && $hapusUserRole->affected_rows > 0) {
        $hapusUserRole->close();
        $hapusUser->close();
        $connect->close();
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Data user berhasil dihapus!",
                        icon: "success"
                    }).then((result) => {
                        window.location.href="?adminPage=users";
                    });
                });
            </script>
            ';
        exit;
    }
    $hapusUserRole->close();
    $hapusUser->close();
    $connect->close();
    echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        text: "Data user tidak berhasil dihapus!",
                        icon: "error"
                    }).then((result) => {
                        window.location.href="?adminPage=users";
                    });
                });
            </script>
            ';
    exit;
}