<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
    </style>

  </head>

  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4" href="#">Perpustakaan</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?menu=dashboard">
                    <i class="fas fa-home me-1"></i>
                    Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?menu=tambah">
                    <i class="fas fa-users"></i>
                    Tambah Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?menu=lihat">
                    <i class="far fa-file me-2"></i>
                    Daftar Buku
                    </a>
                </li>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted border-bottom"></h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                    <i class="fas fa-sign-out-alt"></i>
                    Sign Out
                    </a>
                </li>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Guru</h1>
            </div>
            
            <?php 
                switch(@$_GET['menu']){
                    case 'tambah';
                    include 'tambahBuku.php';
                    break;

                    case 'lihat';
                    include 'lihatBuku.php';
                    break;

                    case 'edit';
                    include 'edit.php';
                    break;

                    case 'dashboard';
                    include 'dashboard.php';
                    break;
                }
            ?>
            <canvas class="my-4 w-100" width="900" height="400"></canvas>
            </div>
            </main>
    </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/ec3a5c99d2.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
  </body>
</html>