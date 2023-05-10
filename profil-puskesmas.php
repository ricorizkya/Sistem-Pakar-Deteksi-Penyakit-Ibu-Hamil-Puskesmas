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
                <a class="nav-link collapsed" href="data-admin.php">
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
                <a class="nav-link " href="profil-puskesmas.php">
                    <i class="bi bi-hospital-fill"></i>
                    <span>Profil Puskesmas</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profil Puskesmas</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Profil Puskesmas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <center>
                                            <img src="assets/img/foto-puskesmas.jpeg" alt="" style="width: 75%;"><br>
                                        </center><br>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-6">
                                            <center>
                                                <h4>Visi</h4>
                                                <h7>KUDUS BANGKIT MENUJU KABUPATEN MODERN, RELIGUS, CERDAS DAN SEJAHTERA
                                                </h7>
                                            </center>
                                            <br>
                                            <center>
                                                <h4>Misi</h4>
                                            </center>
                                            <ul style="list-style-type: circle; list-style-color: #4154f1;">
                                                <li>
                                                    <h7>MEWUJUDKAN MASYARAKAT KUDUSYANG BERKUALITAS, KREATIF, INOVATIF
                                                        DENGAN
                                                        MEMANFAATKAN TEKNOLOGI DAN MULTIMEDIA</h7>
                                                </li>
                                                <li>
                                                    <h7>MEWUJUDKAN PEMERINTAHAN YANG SEMAKIN HANDAL UNTUK MENINGKATKAN
                                                        PELAYANAN
                                                        PUBLIK</h7>
                                                </li>
                                                <li>
                                                    <h7>MEWUJUDKAN KEHIDUPAN YANG TOLERAN DAN KONDUSIF</h7>
                                                </li>
                                                <li>
                                                    <h7>MEMPERKUAT EKONOMI KERAKYATAN YANG BERBASIS KEUNGGULAN LOKAL DAN
                                                        MEMBANGUN IKLIM USAHA YANG BERDAYA SAING</h7>
                                                </li>
                                            </ul><br>
                                            <center>
                                                <h4>Lokasi</h4>
                                            </center>
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5052719456257!2d110.89742101487167!3d-6.82985596870731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c57f021f72ad%3A0x3d0c94a7bd7c6c26!2sPuskesmas%20Mejobo!5e0!3m2!1sen!2sid!4v1680798342591!5m2!1sen!2sid"
                                                width="100%" height="450" style="border:0;" allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>
                                            <center>
                                                <h4>Kontak Person</h4>
                                            </center>
                                            <div class="row justify-content-center">
                                                <div class="col style=" width: 40px;">
                                                    <b>
                                                        <h7>Whatsapp</h7>
                                                    </b><br>
                                                    <img src="assets/img/whatsapp.png" style="width: 30px;">&nbsp;
                                                    0876-3632-63
                                                </div>
                                                <div class="col style=" width: 40px; ">
                                                    <b>
                                                        <h7>Telepon</h7>
                                                    </b><br>
                                                    <img src=" assets/img/telephone.png" style="width: 30px;">&nbsp;
                                                    0291-431051
                                                </div>
                                                <div class="col style=" width: 40px; ">
                                                    <b>
                                                        <h7>Fax</h7>
                                                    </b><br>
                                                    <img src=" assets/img/fax-machine.png" style="width: 30px;">&nbsp;
                                                    0291-4247447
                                                </div>
                                                <div class="col col-4">
                                                    <b>
                                                        <h7>E-Mail</h7>
                                                    </b><br>
                                                    <img src="assets/img/gmail.png" style="width: 30px;">&nbsp;
                                                    pusk.mejobo@kuduskab.go.id
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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