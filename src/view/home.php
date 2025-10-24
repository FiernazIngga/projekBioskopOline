<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="?page=home">
    <title>Ticket Online</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark wadahNavbar">
        <div class="container">
            <a class="navbar-brand logoAplikasi" href="?page=dashboardUser">
                <i class="fas fa-play-circle me-2"></i>MovieUPN
            </a>
            <button class="navbar-toggler tombolToggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuUtama">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi aktif menuNav" href="?page=dashboardUser">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="#">
                            <i class="fas fa-film me-1"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tautanNavigasi" href="?page=tandai">
                            <i class="fas fa-bookmark me-1"></i> Contact Us
                        </a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-outline-danger me-md-2" type="button">Sign In</button>
                    <a href="?page=login"><button class="btn btn-outline-light" type="button">Log In</button></a>   
                </div>
            </div>
        </div>
    </nav>

    <section class="selamatdatang">
        <div class="container">
            <div class="TulisanCenter">
                <h1>Selamat Datang</h1>
                <h1>Temukan film terbaru saat ini</h1>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="?page=home"></script>
</body>

</html>