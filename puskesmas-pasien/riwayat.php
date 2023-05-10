<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require('../koneksi.php');

    session_start();
    if($_SESSION['login'] == true) {
        $is_login = $_SESSION['login'];
        $username = $_SESSION['username'];
    }else {
        header('location: ../login.php');
    }
    
    $queryID = "SELECT * FROM pasien WHERE username_pasien='$username'";
    $resultID = mysqli_query($conn, $queryID);
                                        $rowID = mysqli_fetch_assoc($resultID);
                                        $id_pasien = $rowID['id_pasien'];
                                
                                        $tgl_sekarang = date('Y-m-d');
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
                            <span>Pasien</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profil-pasien.php">
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

            <li class="nav-heading">Diagnosa</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="diagnosa.php">
                    <i class="bi bi-heart-pulse-fill"></i>
                    <span>Diagnosa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="riwayat.php">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat</span>
                </a>
            </li>

            <li class="nav-heading">Profil</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="profil-pasien.php">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span>Profil Saya</span>
                </a>
            </li>

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
            <h1>Riwayat Diagnosa</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Diagnosa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header" style="background-color: #4154f1">
                    <h3 style="color: white"><b>Daftar Riwayat Diagnosa</b></h3>
                </div>
                <div class="card-body">

                    <!-- Bordered Table -->
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Tanggal Diagnosa</center>
                                </th>
                                <th scope="col">
                                    <center>Diagnosa Penyakit</center>
                                </th>
                                <th scope="col">
                                    <center>Probabilitas Penyakit</center>
                                </th>
                                <th scope="col">
                                    <center>Dokter Konsultasi</center>
                                </th>
                                <th scope="col">
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $result = mysqli_query($conn, "SELECT * FROM riwayat LEFT JOIN dokter ON riwayat.id_dokter = dokter.id_dokter LEFT JOIN penyakit ON riwayat.id_penyakit = penyakit.id_penyakit WHERE id_pasien='$id_pasien'");
                                    if(mysqli_num_rows($result) > 0){
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $persentase = $row['hasil'] * 100;
                                ?>
                            <tr>
                                <td>
                                    <center><?= $counter++; ?></center>
                                </td>
                                <td>
                                    <center><?= $row['tgl']; ?></center>
                                </td>
                                <td>
                                    <center>[<?= $row['kode_penyakit']; ?>] - <?= $row['nama_penyakit'];?></center>
                                </td>
                                <td>
                                    <center><?= $persentase; ?>%</center>
                                </td>
                                <td>
                                    <center><?= $row['nama_dokter']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><a href="detail-riwayat.php?tgl=<?= $row['tgl'];?>"
                                            class="btn btn-success"><i class="bi bi-printer-fill"></i>&nbsp; Detail</a>
                                    </center>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>


                </div>
            </div>
            <?php 
        // } 
        ?>
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