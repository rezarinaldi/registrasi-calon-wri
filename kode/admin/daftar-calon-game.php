<?php
session_start();
// ob_start();

require 'functions/functions.php';

if (empty($_SESSION['username']) or empty($_SESSION['password'])) {
    echo "<script>
          alert('Anda belum login!');
          document.location.href = 'index.php';
          </script>
          ";
} else {
    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM pendaftar
                                INNER JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi 
                                WHERE divisi.iddivisi = '5'"));
    $jumlahHalaman =  ceil($jumlahData / $jumlahDataPerHalaman);

    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $query = "SELECT * FROM pendaftar 
                INNER JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
            WHERE divisi.iddivisi = '5' LIMIT $dataAwal, $jumlahDataPerHalaman";
    $peserta = query($query);

    $peserta = query($query);
    if (isset($_POST["cari"])) {
        $peserta = cariPendaftarGame($_POST["keyword"]);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Calon WRI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="dist/img/favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="dist/img/wri.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-bold">WRI POLINEMA</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Beranda </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p> Data Pendaftar <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="daftar-calon-web.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi Web</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="daftar-calon-android.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi Android</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="daftar-calon-iot.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi IoT</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="daftar-calon-uiux.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi UI/UX</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="daftar-calon-game.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi Game</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p> Data Divisi</i>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="daftar-divisi.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Daftar Divisi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p> Data Admin</i>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="daftar-admin.php" class="nav-link">
                                        <i class="fas fa-users-cog nav-icon"></i>
                                        <p>Daftar Admin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Divisi Game</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Divisi Game</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftar Divisi Game</h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col">
                                <form class="form-inline d-flex flex-row-reverse" action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm border-success"
                                            id="cari-pendaftar" placeholder="Cari Nama Pendaftar" name="keyword"
                                            autofocus autocomplete="off">
                                        <button type="submit" class="btn btn-success btn-sm ml-2" name="cari"> <i
                                                class="fa fa-search"></i> Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <table class="table table-bordered table-sm">
                                    <th style="width: 30px">#</th>
                                    <th style="width: 100px">NIM</th>
                                    <th>Nama</th>
                                    <th style="width: 100px">No. WA</th>
                                    <th style="width: 150px">Program Studi</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 180px">Aksi</th>


                                    <?php $i = 1; ?>
                                    <?php foreach($peserta as $dt) : ?>
                                    <tr>
                                        <td><?= $i  ?></td>
                                        <td><?= $dt["nim"]  ?></td>
                                        <td><?= $dt["nama"]  ?></td>
                                        <td><?= $dt["nowa"]  ?></td>
                                        <td><?= $dt["programstudi"]  ?></td>
                                        <td><?php cekStatus($dt["status"])   ?></td>
                                        <td>
                                            <a href="detil-calon-game.php?id=<?= $dt["idpendaftar"]; ?>"><button
                                                    class="btn btn-info btn-sm" type="submit" name="detail-divisi"> <i
                                                        class="fas fa-book"></i>
                                                    Rincian </button></a>
                                            <a href="hapus-calon-game.php?id=<?= $dt["idpendaftar"]; ?>">
                                                <button class="btn btn-danger btn-sm" type="submit" name="hapus-divisi">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        $i++; 
                                        endforeach; 
                                    ?>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <div class="pagination justify-content-end">
                                        <?php if ($halamanAktif > 1) : ?>
                                            <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>" aria-disabled="true">&laquo;</a>
                                        <?php endif ?>
                                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                            <?php if($i == $halamanAktif) : ?>
                                                <a class="page-link font-weight-bold" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a>
                                            <?php else:?>
                                                <a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a>
                                            <?php endif?>
                                        <?php endfor ?>
                                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                            <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo;</a>
                                        <?php endif ?>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="#">Registrasi Calon WRI</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>