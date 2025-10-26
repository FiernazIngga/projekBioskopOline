<?php 

    include __DIR__ . "/../../controllers/adminControllers/videosController.php";

    $isi = "";
    $page = $_GET['page'];
    $aksi = $_GET['aksi'] ?? '';
    if ($aksi === '') {
        $isi = ambilVideo();
    } else if ($aksi === 'lihat') {
        $isi = ambilVideo();
    } else if ($aksi === 'tambah') {
        $isi = tambahVideo();
    } else if ($aksi === 'simpan') {
    $isi = prosesUploadVideo();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="?page=videos">
</head>

<body>
	<section id="navbar">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="?page=admin123">Admin Page</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="?page=admin123">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="?page=videos">Add Video</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?page=users">Users</a>
						</li>
					</ul>
					<div class="d-flex" role="search">
						<a class="btn btn-outline-danger" href="?page=login">Logout</a>
					</div>
				</div>
			</div>
		</nav>
	</section>

    <section id="isi">
        <div class="button">
            <a href="?page=videos&aksi=lihat">Lihat Semua</a>
            <a href="?page=videos&aksi=tambah">Tambah Video</a>
        </div>
        <div class="tampilan">
            <?= $isi; ?>
        </div>
    </section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
		crossorigin="anonymous"></script>
</body>

</html>