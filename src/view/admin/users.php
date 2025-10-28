<<<<<<< HEAD
<?php 

    include __DIR__ . "/../../controllers/adminControllers/usersController.php";

    $isi = "";
    $isi = ambilUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="?adminPage=users">
</head>

<body>
	<section id="navbar">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>User</title>
</head>
<body>
    	<section id="navbar">
		<nav class="navbar navbar-expand-lg">
>>>>>>> 4e5e489047ab09d61eab6ddd24799bc7fe6e1cbc
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
<<<<<<< HEAD
							<a class="nav-link" aria-current="page" href="?adminPage=admin123">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?adminPage=videos">Add Video</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="?adminPage=users">Users</a>
=======
							<a class="nav-link" aria-current="page" href="?page=admin123">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="?page=videos">Add Video</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="?page=users">Users</a>
>>>>>>> 4e5e489047ab09d61eab6ddd24799bc7fe6e1cbc
						</li>
					</ul>
					<div class="d-flex" role="search">
						<a class="btn btn-outline-danger" href="?page=login">Logout</a>
					</div>
				</div>
			</div>
		</nav>
	</section>

<<<<<<< HEAD
    <section id="isi">
        <div class="tampilan">
            <?= $isi; ?>
        </div>
    </section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
		crossorigin="anonymous"></script>
</body>

=======
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
		crossorigin="anonymous"></script>

</body>
>>>>>>> 4e5e489047ab09d61eab6ddd24799bc7fe6e1cbc
</html>