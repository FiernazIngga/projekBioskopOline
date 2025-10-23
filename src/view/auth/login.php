<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="kotakLogin">
        <h1 class="judulHalaman">Masuk ke Akun</h1>

        <?php 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['error'])) {
                echo "<div class='pesanError'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
        ?>

        <form method="POST" action="?page=login">
            <div class="kelompokInput">
                <label class="labelInput" for="username">Username</label>
                <input type="text" id="username" name="username" class="inputText" placeholder="Masukkan username Anda" required>
            </div>
            <div class="kelompokInput">
                <label class="labelInput" for="password">Password</label>
                <input type="password" id="password" name="password" class="inputText"
                    placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" class="tombolSubmit">Masuk</button>
            <p class="teksKecil">
                Belum punya akun?
                <a href="?page=daftar" class="linkTeks">Daftar di sini</a>
            </p>
        </form>
    </div>
</body>

</html>