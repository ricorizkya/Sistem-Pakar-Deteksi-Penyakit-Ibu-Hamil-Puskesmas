<?php
    require('../koneksi.php');

    session_start();
    if($_SESSION['login'] == true) {
        $is_login = $_SESSION['login'];
        $username = $_SESSION['username'];
    }else {
        header('location: ../login.php');
    }

    $id_pasien = $_GET['nomor'];
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
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

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
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Puskesmas Mejobo</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
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
                <a class="nav-link collapsed" href="../index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Data Pengguna</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../data-admin.php">
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Data Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../dokter/data-dokter.php">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span>Data Dokter</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="data-pasien.php">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Pasien</span>
                </a>
            </li>

            <li class="nav-heading">Data Penyakit</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../penyakit/data-penyakit.php">
                    <i class="bi bi-bug-fill"></i>
                    <span>Data Penyakit</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../gejala/data-gejala.php">
                    <i class="bi bi-heart-pulse-fill"></i>
                    <span>Data Gejala</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../pengetahuan/data-pengetahuan.php">
                    <i class="bi bi-database-fill-gear"></i>
                    <span>Data Pengetahuan</span>
                </a>
            </li>

            <li class="nav-heading">Profil Puskesmas</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../profil-puskesmas.php">
                    <i class="bi bi-hospital-fill"></i>
                    <span>Profil Puskesmas</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <?php
        $queryDetail = "SELECT * FROM pasien WHERE id_pasien=$id_pasien";
        $result = mysqli_query($conn, $queryDetail);
        $rowPasien = mysqli_fetch_assoc($result);
    ?>

        <div class="pagetitle">
            <h1>Data Pasien <?= $rowPasien['nama_pasien']; ?></h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Pasien <?= $rowPasien['nama_pasien']; ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header" style="background-color: #4154f1;">
                    <h4 style="color: white;">Data Diri Pasien <?= $rowPasien['nama_pasien']; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><b>NIK</b></div>
                        <div class="col-3"><?= $rowPasien['nik']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Nama Pasien</b></div>
                        <div class="col-3"><?= $rowPasien['nama_pasien']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Tanggal Lahir</b></div>
                        <div class="col-3"><?= $rowPasien['tgl_lahir']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Pendidikan Terakhir</b></div>
                        <div class="col-3"><?= $rowPasien['pendidikan']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Pekerjaan</b></div>
                        <div class="col-3"><?= $rowPasien['pekerjaan']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Umur Pasien</b></div>
                        <div class="col-3"><?= $rowPasien['umur']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Usia Kehamilan</b></div>
                        <div class="col-3"><?= $rowPasien['usia_kehamilan']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Nomor HP</b></div>
                        <div class="col-3"><?= $rowPasien['nomor_hp']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Alamat Lengkap</b></div>
                        <div class="col-3"><?= $rowPasien['alamat_pasien']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Username Pasien</b></div>
                        <div class="col-3"><?= $rowPasien['username_pasien']; ?></div>
                    </div>
                    <!-- End Bordered Table -->
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #4154f1;">
                    <h4 style="color: white;">Riwayat Diagnosa</h4>
                </div>
                <div class="card-body">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM riwayat LEFT JOIN penyakit ON riwayat.id_penyakit=penyakit.id_penyakit LEFT JOIN dokter ON riwayat.id_dokter=dokter.id_dokter WHERE id_pasien=$id_pasien");
                        if(mysqli_num_rows($result) > 0){
                            $counter = 1;
                    ?>
                    <!-- Bordered Table -->
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Diagnosa</th>
                                <th scope="col">Probabilitas</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    $probabilitas = $row['hasil']*100;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $counter; ?></th>
                                <td><?php echo $row['tgl']; ?></td>
                                <td><?php echo $row['nama_penyakit']; ?></td>
                                <td><?php echo $probabilitas; ?>%</td>
                                <td><?php echo $row['nama_dokter']; ?></td>
                                <td>
                                    <a href="cetak-data.php?nomor=<?php echo $row['id_riwayat']; ?>"
                                        class="btn btn-success">Cetak Data</a>
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
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>