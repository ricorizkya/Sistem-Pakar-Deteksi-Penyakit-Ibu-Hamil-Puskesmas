<?php
    require('koneksi.php');

    session_start();
    $username = $_SESSION['username_pasien'];

    if($_SESSION['username_pasien'] != $username) {
        header('location: login.php');
    }

    $queryPenyakit = "SELECT COUNT(*) AS total FROM penyakit";
    $resultPenyakit = mysqli_query($conn, $queryPenyakit);

    // Memeriksa apakah query berhasil dijalankan
    if($resultPenyakit) {
        // Mengambil data total dari hasil query
        $rowPenyakit = mysqli_fetch_assoc($resultPenyakit);
        $total_penyakit = $rowPenyakit['total'];

        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
    }

    $queryGejala = "SELECT COUNT(*) AS total FROM gejala";
    $resultGejala = mysqli_query($conn, $queryGejala);

    // Memeriksa apakah query berhasil dijalankan
    if($resultGejala) {
        // Mengambil data total dari hasil query
        $rowGejala = mysqli_fetch_assoc($resultGejala);
        $total_Gejala = $rowGejala['total'];

        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
    }

    $queryPengetahuan = "SELECT COUNT(*) AS total FROM basis_pengetahuan";
    $resultPengetahuan = mysqli_query($conn, $queryPengetahuan);

    // Memeriksa apakah query berhasil dijalankan
    if($resultPengetahuan) {
        // Mengambil data total dari hasil query
        $rowPengetahuan = mysqli_fetch_assoc($resultPengetahuan);
        $total_Pengetahuan = $rowPengetahuan['total'];

        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
    }

    $queryAdmin = "SELECT COUNT(*) AS total FROM admin";
    $resultAdmin = mysqli_query($conn, $queryAdmin);

    // Memeriksa apakah query berhasil dijalankan
    if($resultAdmin) {
        // Mengambil data total dari hasil query
        $rowAdmin = mysqli_fetch_assoc($resultAdmin);
        $total_Admin = $rowAdmin['total'];

        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
    }

    $queryDokter = "SELECT COUNT(*) AS total FROM dokter";
    $resultDokter = mysqli_query($conn, $queryDokter);

    // Memeriksa apakah query berhasil dijalankan
    if($resultDokter) {
        // Mengambil data total dari hasil query
        $rowDokter = mysqli_fetch_assoc($resultDokter);
        $total_Dokter = $rowDokter['total'];

        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
    }

    $queryPasien = "SELECT COUNT(*) AS total FROM pasien";
    $resultPasien = mysqli_query($conn, $queryPasien);

    // Memeriksa apakah query berhasil dijalankan
    if($resultPasien) {
        // Mengambil data total dari hasil query
        $rowPasien = mysqli_fetch_assoc($resultPasien);
        
        $total_Pasien = 0;
        if($total_Pasien === 0 || $total_Pasien === NULL) {
            $total_Pasien = 0;
        }else {
            $total_Pasien = $rowPasien['total'];
        }
        // Menampilkan total data
        // echo "Total data dalam tabel: " . $total_data;
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Terjadi kesalahan dalam menghitung total data: " . mysqli_error($conn);
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
                <a class="nav-link " href="index.html">
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
                <a class="nav-link collapsed" href="riwayat.php">
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
            <h1>Dashboard</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Penyakit</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bug-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_penyakit; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Gejala</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-heart-pulse-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_Gejala; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Pengetahuan</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-database-fill-gear"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_Pengetahuan; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Admin</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-bounding-box"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_Admin; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Dokter</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-vcard-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_Dokter; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Pasien</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $total_Pasien; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                    </div>
                </div><!-- End Left side columns -->
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