<?php
    require('koneksi.php');

    session_start();
    if($_SESSION['login'] == true) {
        $is_login = $_SESSION['login'];
        $username = $_SESSION['username'];
    }else {
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Puskesmas Mejobo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Puskesmas Mejobo</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $username; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $username; ?></h6>
                            <span>Administrator</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profil.php">
                                <i class="bi bi-person"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Data Pengguna</li>

            <li class="nav-item">
                <a class="nav-link " href="data-admin.php">
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Data Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="dokter/data-dokter.php">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span>Data Dokter</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="pasien/data-pasien.php">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Pasien</span>
                </a>
            </li>

            <li class="nav-heading">Data Penyakit</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="penyakit/data-penyakit.php">
                    <i class="bi bi-bug-fill"></i>
                    <span>Data Penyakit</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="gejala/data-gejala.php">
                    <i class="bi bi-heart-pulse-fill"></i>
                    <span>Data Gejala</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="pengetahuan/data-pengetahuan.php">
                    <i class="bi bi-database-fill-gear"></i>
                    <span>Data Pengetahuan</span>
                </a>
            </li>

            <li class="nav-heading">Profil Puskesmas</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="profil-puskesmas.php">
                    <i class="bi bi-hospital-fill"></i>
                    <span>Profil Puskesmas</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Admin</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header"><a href="tambah-admin.php" class="btn btn-primary" style="width: 100%;">Tambah
                        Admin</a></div>
                <div class="card-body">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM admin");
                        if(mysqli_num_rows($result) > 0){
                            $counter = 1;
                    ?>
                    <!-- Bordered Table -->
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Admin</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $counter; ?></th>
                                <td><?php echo $row['nama_admin']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td>
                                    <a href="edit-admin.php?nomor=<?php echo $row['id_admin']; ?>"
                                        class="btn btn-success">EDIT</a>
                                    <a href="hapus-admin.php?nomor=<?php echo $row['id_admin']; ?>"
                                        class="btn btn-danger">HAPUS</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            }else {
                                    echo "Tidak ada data yang ditemukan.";
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- End Bordered Table -->
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>