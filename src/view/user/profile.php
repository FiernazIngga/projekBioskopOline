<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: ?page=login');
    exit;
}

$username = $_SESSION['username'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$fotoVal = $_SESSION['foto_profil'];
$foto = dirname($_SERVER['SCRIPT_NAME']) . '/src/uploads/poto_profil/' . $_SESSION['foto_profil'];
$id = $_SESSION['id_user'];

?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="?page=profil">
</head>

<body style="background-color: #1a1a1a;">

	<form action="?page=profil" method="post" enctype="multipart/form-data"
		class="p-4 shadow rounded-4 bg-light mx-auto" style="max-width: 600px; margin-top: 3em;">
		<h3 class="text-center mb-4 fw-bold">Profil Saya</h3>

		<!-- Foto Profil -->
		<div class="text-center mb-4">
			<img src="<?= $foto; ?>" alt="Foto Profil" class="rounded-circle shadow-sm" width="120" height="120"
				style="object-fit: cover;">
			<div class="mt-3">
				<input type="file" name="fotoProfil" id="fotoProfil" accept="image/*"
					class="form-control form-control-sm" style="max-width: 300px; margin: 0 auto;">
			</div>
		</div>

		<!-- Nama -->
		<div class="mb-3">
			<label for="namaLengkap" class="form-label fw-semibold">Nama Lengkap</label>
			<input type="text" class="form-control" id="namaLengkap" name="namaLengkap"
				placeholder="Masukkan nama lengkap Anda" value="<?= $nama ?? '' ?>" required>
		</div>

		<!-- Username -->
		<div class="mb-3">
			<label for="username" class="form-label fw-semibold">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Anda"
				value="<?= $username ?? '' ?>" required>
		</div>

		<!-- Email -->
		<div class="mb-3">
			<label for="email" class="form-label fw-semibold">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda"
				value="<?= $email ?? '' ?>" required>
		</div>

		<!-- Password -->
		<div class="mb-3">
			<label for="password" class="form-label fw-semibold">Password Baru</label>
			<input type="password" class="form-control" id="password" name="password"
				placeholder="Kosongkan jika tidak ingin mengubah password">
		</div>

		<div class="d-flex gap-2">
			<button type="button" id="btnKembali" class="btn btn-secondary w-50 fw-bold">Kembali</button>
			<button type="submit" class="btn btn-primary w-50 fw-bold">Simpan Perubahan</button>
		</div>
	</form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script src="?page=profil"></script>
</body>

</html>