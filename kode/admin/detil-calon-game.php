<?php
session_start();
require 'functions/functions.php';

if (empty($_SESSION['username']) or empty($_SESSION['password'])) {
    echo "<script>
          alert('Anda belum login!');
          document.location.href = 'index.php';
          </script>
          ";
} else {
    $id = $_GET["id"];
    $peserta = query("SELECT * FROM pendaftar 
    INNER JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
    WHERE divisi.iddivisi = '5' AND pendaftar.idpendaftar = '$id'
    ")[0];

    if (isset($_POST["tidakrekom"])) {
        if (updateStatusTidakRekom($_POST) > 0) {
            echo '<script>
                    alert("Data berhasil diupdate!");
                    document.location.href = "daftar-calon-game.php";
                </script>';
        } else {
            echo '<script>
                    alert("Data gagal update!");
                    document.location.href = "daftar-calon-game.php";
                </script>';
        }
    } elseif (isset($_POST["rekom"])) {
        if (updateStatusRekom($_POST) > 0) {
            echo '<script>
                    alert("Data berhasil diupdate!");
                    document.location.href = "daftar-calon-game.php";
                </script>';
        } else {
            echo '<script>
                    alert("Data gagal update!");
                    document.location.href = "daftar-calon-game.php";
                </script>';
        }
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
                                    <a href="daftar-calon-game.php" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Divisi game</p>
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
                        <h3 class="card-title">Detail Data Pendaftar Divisi game</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-5">
                                <table>
                                    <tr>
                                        <td style="width: 150px">NIM</td>
                                        <td style="width: 50px">:</td>
                                        <td> <b> <?= $peserta["nim"]  ?> </b></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td style="width: 50px">:</td>
                                        <td><b><?= $peserta["nama"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>No. Whatsapp</td>
                                        <td style="width: 50px">:</td>
                                        <td><b> <?= $peserta["nowa"] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td style="width: 50px">:</td>
                                        <td><b> <?= $peserta["programstudi"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td><b><?= $peserta["kelas"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Sekolah</td>
                                        <td>:</td>
                                        <td><b><?= $peserta["asalsekolah"]  ?></b></td>
                                    </tr>
                                </table>
                                <table class="mt-5">
                                    <tr>
                                        <td style="width: 150px">Hard Skill</td>
                                        <td style="width: 50px">:</td>
                                        <td> <b><?= $peserta["hardskill"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Soft Skill</td>
                                        <td style="width: 50px">:</td>
                                        <td><b><?= $peserta["softskill"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Link Sosmedia</td>
                                        <td style="width: 50px">:</td>
                                        <td><b> <?= $peserta["sosmed"]  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Divisi pilihan</td>
                                        <td style="width: 50px">:</td>
                                        <td><b> Divisi game </b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-7">
                                <div class="row">
                                    <div class="col">
                                        <p> Hal yang dinginkan setelah gabung WRI : <br>
                                            <b><?= $peserta["halperoleh"]  ?></b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p> Kontribusi : <br>
                                            <b><?= $peserta["kontribusi"] ?></b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p> Karya : </p>
                                        <p><b><?= $peserta["karya"]  ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col d-flex flex-row-reverse">


                                <form action="" method="post">
                                    <input type="hidden" class="form-control form-control-sm col-3" id="id-admin"
                                        name="id" value="<?= $peserta["idpendaftar"] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="tidakrekom">
                                        <i class="fa fa-times">
                                            Tidak Direkomendasikan
                                        </i>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-sm mr-2" name="rekom">
                                        <i class="fa fa-check">
                                            Rekomendasikan
                                        </i>
                                    </button>
                                </form>

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