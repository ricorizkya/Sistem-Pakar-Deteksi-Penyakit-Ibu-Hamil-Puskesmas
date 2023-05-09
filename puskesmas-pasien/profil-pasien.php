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
                                
                                        // $tgl_sekarang = $_GET['tgl'];
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
                            <h7><?php echo $username; ?></h7>
                            <span>Administrator</span>
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
                <a class="nav-link collapsed" href="riwayat.php">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat</span>
                </a>
            </li>

            <li class="nav-heading">Profil</li>

            <li class="nav-item">
                <a class="nav-link " href="profil-pasien.php">
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
            <h1>Profil Saya</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
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
                                    <br>
                                    <span class="badge bg-success text-light" style="width: 100%;">
                                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            </svg>
                                            Data Diri Pasien</h5>
                                    </span><br>
                                    <div class="row">
                                        <div class="col">
                                            <table>
                                                <tr>
                                                    <td><b>NIK</b></td>
                                                    <td>: <?= $rowID['nik']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Pasien</b></td>
                                                    <td>: <?= $rowID['nama_pasien']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tempat & Tanggal Lahir</b></td>
                                                    <td>: <?= $rowID['tempat_lahir']; ?>,
                                                        <?= $rowID['tgl_lahir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Umur</b></td>
                                                    <td>: <?= $rowID['umur']; ?> Tahun</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nomor Telepon</b></td>
                                                    <td>: <?= $rowID['nomor_hp']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Usia Kehamilan</b></td>
                                                    <td>: <?= $rowID['usia_kehamilan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pendidikan Terakhir</b></td>
                                                    <td>: <?= $rowID['pendidikan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan</b></td>
                                                    <td>: <?= $rowID['pekerjaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat Lengkap</b></td>
                                                    <td>: <?= $rowID['alamat_pasien']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Username</b></td>
                                                    <td>: <?= $rowID['username_pasien']; ?></td>
                                                </tr>
                                            </table><br>
                                        </div>
                                        <div class="col">
                                            <br>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered" style="width: 100%;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                                Edit Profil
                                            </button>
                                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Profil
                                                                <?= $rowID['nama_pasien']; ?>
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                                                <!-- Email input -->
                                                                <div class="form-outline mb-4">
                                                                    <label class="form-label"
                                                                        for="form3Example3"><b>Nama
                                                                            Lengkap</b></label>
                                                                    <input type="text" id="form3Example3"
                                                                        class="form-control" name="nama_lengkap"
                                                                        value="<?= $rowID['nama_pasien']; ?>"
                                                                        required />
                                                                </div>
                                                                <div class="form-outline mb-4">
                                                                    <label class="form-label"
                                                                        for="form3Example3"><b>NIK</b></label>
                                                                    <input type="number" id="form3Example3"
                                                                        class="form-control" name="nik"
                                                                        value="<?= $rowID['nik']; ?>" required />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example1"><b>Tempat
                                                                                Lahir</b></label>
                                                                        <div class="form-outline">
                                                                            <input type="text" id="form3Example1"
                                                                                class="form-control" name="tempat_lahir"
                                                                                value="<?= $rowID['tempat_lahir']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example1"><b>Tanggal
                                                                                Lahir</b></label>
                                                                        <div class="form-outline">
                                                                            <input type="date" id="form3Example1"
                                                                                class="form-control" name="tgl_lahir"
                                                                                value="<?= $rowID['tgl_lahir']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example1"><b>Umur</b></label>
                                                                        <div class="form-outline">
                                                                            <input type="number" id="form3Example1"
                                                                                class="form-control" name="usia"
                                                                                value="<?= $rowID['umur']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example2"><b>Usia
                                                                                Kehamilan</b></label>
                                                                        <div class="form-outline">
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="usia_hamil">
                                                                                <option selected></option>
                                                                                <option value="Trimester 1">Trimester 1
                                                                                </option>
                                                                                <option value="Trimester 2">Trimester 2
                                                                                </option>
                                                                                <option value="Trimester 3">Trimester 3
                                                                                </option>
                                                                                <option value="Trimester 4">Trimester 4
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example2"><b>Pendidikan
                                                                                Terakhir</b></label>
                                                                        <div class="form-outline">
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="pendidikan">
                                                                                <option value=""
                                                                                    <?php echo ($rowID['pendidikan'] == "") ? "selected" : ""; ?>>
                                                                                </option>
                                                                                <option value="SD/MI"
                                                                                    <?php echo ($rowID['pendidikan'] == "SD/MI") ? "selected" : ""; ?>>
                                                                                    SD/MI</option>
                                                                                <option value="SMP/MTS/SLTP"
                                                                                    <?php echo ($rowID['pendidikan'] == "SMP/MTS/SLTP") ? "selected" : ""; ?>>
                                                                                    SMP/MTS/SLTP</option>
                                                                                <option value="SMA/SLTA"
                                                                                    <?php echo ($rowID['pendidikan'] == "SMA/SLTA") ? "selected" : ""; ?>>
                                                                                    SMA/SMKA/MA/SLTA</option>
                                                                                <option value="D3"
                                                                                    <?php echo ($rowID['pendidikan'] == "D3") ? "selected" : ""; ?>>
                                                                                    D3</option>
                                                                                <option value="D4"
                                                                                    <?php echo ($rowID['pendidikan'] == "D4") ? "selected" : ""; ?>>
                                                                                    D4</option>
                                                                                <option value="S1"
                                                                                    <?php echo ($rowID['pendidikan'] == "S1") ? "selected" : ""; ?>>
                                                                                    S1</option>
                                                                                <option value="S2"
                                                                                    <?php echo ($rowID['pendidikan'] == "S2") ? "selected" : ""; ?>>
                                                                                    S2</option>
                                                                                <option value="S3"
                                                                                    <?php echo ($rowID['pendidikan'] == "S3") ? "selected" : ""; ?>>
                                                                                    S3</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example1"><b>Pekerjaan</b></label>
                                                                        <div class="form-outline">
                                                                            <input type="text" id="form3Example1"
                                                                                class="form-control" name="pekerjaan"
                                                                                value="<?= $rowID['pekerjaan']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-outline mb-4">
                                                                    <label class="form-label"
                                                                        for="form3Example3"><b>Nomor
                                                                            HP</b></label>
                                                                    <input type="number" id="form3Example3"
                                                                        class="form-control" name="nomor_hp"
                                                                        value="<?= $rowID['nomor_hp']; ?>" required />
                                                                </div>
                                                                <div class="form-outline mb-4">
                                                                    <label class="form-label"
                                                                        for="form3Example3"><b>Alamat
                                                                            Lengkap</b></label>
                                                                    <textarea id="form3Example3" class="form-control"
                                                                        name="alamat"
                                                                        required><?= $rowID['alamat_pasien']; ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label class="form-label"
                                                                            for="form3Example1"><b>Username</b></label>
                                                                        <div class="form-outline">
                                                                            <input type="text" id="form3Example1"
                                                                                class="form-control" name="username"
                                                                                value="<?= $rowID['username_pasien']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-outline"><label
                                                                                class="form-label"
                                                                                for="form3Example2"><b>Password</b></label>
                                                                            <input type="password" id="form3Example2"
                                                                                class="form-control" name="password"
                                                                                value="<?= $rowID['password_pasien']; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Submit button -->
                                                                <!-- <button type="submit" class="btn btn-primary btn-block"
                                                                    name="register">
                                                                    Register
                                                                </button> -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan
                                                                Perubahan</a>
                                                        </div>
                                                        </form>
                                                    </div>
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