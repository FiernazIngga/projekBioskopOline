<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Sistem Kami</title>
</head>

<body>
    <div class="kotakDaftar">
        <h1 class="judulHalaman">Buat Akun Baru</h1>

        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!empty($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $err) {
                echo "<div class='pesanError'>$err</div>";
            }
        }
        if (isset($_SESSION['success']) && $_SESSION['success']) {
            echo "<script>
                    alert('Berhasil mendaftar');
                    window.location.href = '?page=login';
                </script>";
            unset($_SESSION['success']);
        }
        unset($_SESSION['error']); 
        ?>

        <form method="POST" action="?page=daftar">
            <div class="kelompokInput">
                <label class="labelInput" for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="inputText" placeholder="Masukkan nama lengkap Anda"
                    value="<?php echo isset($_GET['nama']) ? $_GET['nama'] : ''; ?>" required>
            </div>

            <div class="kelompokInput">
                <label class="labelInput" for="username">Username</label>
                <input type="text" id="username" name="username" class="inputText" placeholder="Masukkan username"
                    value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>" required>
            </div>

            <div class="kelompokInput">
                <label class="labelInput" for="email">Email</label>
                <input type="email" id="email" name="email" class="inputText" placeholder="Masukkan email Anda"
                    value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
            </div>

            <div class="kelompokInput">
                <label class="labelInput" for="password">Password</label>
                <input type="password" id="password" name="password" class="inputText"
                    placeholder="Buat password minimal 3 karakter" required>
            </div>

            <div class="kelompokInput">
                <label class="labelInput" for="konfirmasi_password">Konfirmasi Password</label>
                <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="inputText"
                    placeholder="Ulangi password Anda" required>
            </div>

            <button type="submit" class="tombolSubmit">Daftar</button>

            <p class="teksKecil">
                Sudah punya akun?
                <a href="?page=login" class="linkTeks">Login di sini</a>
            </p>
            <p class="teksKecil">
                <a href="?page=home" class="linkTeks">Kembali</a>
            </p>
            <p class="syaratKetentuan">
                Dengan mendaftar, Anda menyetujui Syarat & Ketentuan yang berlaku
            </p>
        </form>
    </div>
</body>

</html>