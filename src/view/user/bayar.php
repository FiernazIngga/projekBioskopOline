<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['username'])) {
        header('Location: ?page=login');
        exit;
    }

    include __DIR__ . "/../../databases/koneksi.php";
    include __DIR__ . "/../../controllers/userControllers/bayarController.php";

    $id_user = $_GET['root'] ?? null;
    $role = $_GET['paket'];
    $harga = ($role === "Basic") ? 100000 : 200000;

    $error = "";
    $catatan = "";
    $succes = null;
    $result = null;

    $pwd = $connect->prepare("SELECT password FROM users WHERE id_user = ?");
    $pwd->bind_param("s", $_SESSION['id_user']);
    $pwd->execute();
    $hasil = $pwd->get_result();
    $data = $hasil->fetch_assoc();
    $pwd->close();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nominalUang = $_POST['nominalUang'] ?? 0;
        $passwordUser = $_POST['passwordUser'] ?? "";

        if ($passwordUser !== $data['password']) {
            $succes = false;
            $error = "Password yang anda masukkan tidak sama";
        } else {
            if ($nominalUang === $harga) {
                $result = cekDanMasukan(true, $role, 0);
            } elseif ($nominalUang < $harga) {
                $succes = false;
                $error = "Uang anda kurang Rp. " . ($harga - $nominalUang);
            } else { 
                $result = cekDanMasukan(false, $role, $nominalUang - $harga);
            }
            if (isset($result)) {
                $succes = $result->sukses;
                $catatan = $result->catatan;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Bayar Paket</title>
    <link rel="stylesheet" href="?page=bayar">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <section id="bayar">
        <form method="post" action="?page=bayar&paket=<?= urlencode($role); ?>&root=<?= urlencode($id_user); ?>">
            <?php if (!$succes && $error) : ?>
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "<?= $error; ?>",
                        text: "Something went wrong!"
                    });
                </script>
            <?php elseif($succes && $catatan): ?>
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "<?= $catatan; ?>"
                    }).then(() => {
                        window.location.href = "?page=langganan";
                    });
                </script>
            <?php endif; ?>
            <h1>Paket : <?= $role; ?></h1>
            <div class="mb-3">
                <label for="nominalUang" class="form-label">Harga Paket</label>
                <input type="number" class="form-control" name="nominalUang" id="nominalUang" aria-describedby="emailHelp" placeholder="Rp. <?= number_format($harga,0,',','.'); ?>" required>
                <div id="catatan" class="form-text">Pastikan masukan nominal uang dengan pas.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password Movie UPN Mu</label>
                <input type="password" class="form-control" name="passwordUser" id="exampleInputPassword1" required>
                <div id="catatan" class="form-text">Pastikan masukan password dengan benar.</div>
            </div>
            <button type="submit" class="btn btn-primary">Bayar</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="?page=bayar"></script>
</body>
</html>