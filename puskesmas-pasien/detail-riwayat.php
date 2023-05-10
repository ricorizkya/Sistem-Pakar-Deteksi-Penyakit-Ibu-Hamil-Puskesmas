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
                                
                                        $tgl_sekarang = $_GET['tgl'];

    
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
            <h1>Detail Diagnosa</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="riwayat.php">Riwayat Diagnosa</a></li>
                    <li class="breadcrumb-item active">Detail Diagnosa</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <br>
                            <span class="badge bg-success text-light" style="width: 100%;">
                                <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                    Data Diri Pasien</h5>
                            </span><br>
                            <table>
                                <?php
                                        $queryDataDiri = "SELECT * FROM riwayat LEFT JOIN pasien ON riwayat.id_pasien = pasien.id_pasien LEFT JOIN dokter ON riwayat.id_dokter = dokter.id_dokter WHERE tgl='$tgl_sekarang' AND riwayat.id_pasien='$id_pasien'";
                                        $resultDataDiri = mysqli_query($conn, $queryDataDiri);
                                        $rowDataDiri = mysqli_fetch_assoc($resultDataDiri);
                                    ?>
                                <tr>
                                    <td><b>Tanggal Diagnosa</b></td>
                                    <td>: <?= $rowDataDiri['tgl']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Pasien</b></td>
                                    <td>: <?= $rowDataDiri['nama_pasien']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat & Tanggal Lahir</b></td>
                                    <td>: <?= $rowDataDiri['tempat_lahir']; ?>, <?= $rowDataDiri['tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Umur</b></td>
                                    <td>: <?= $rowDataDiri['umur']; ?> Tahun</td>
                                </tr>
                                <tr>
                                    <td><b>Usia Kehamilan</b></td>
                                    <td>: <?= $rowDataDiri['usia_kehamilan']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pekerjaan</b></td>
                                    <td>: <?= $rowDataDiri['pekerjaan']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Lengkap</b></td>
                                    <td>: <?= $rowDataDiri['alamat_pasien']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Dokter Konsultasi</b></td>
                                    <td>: <?= $rowDataDiri['nama_dokter']; ?></td>
                                </tr>
                            </table><br>
                            <span class="badge bg-success text-light" style="width: 100%;">
                                <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                        <path
                                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                                    </svg>
                                    Detail Diagnosa</h5>
                            </span>
                            <table class="table table-bordered" style="margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <center>No</center>
                                        </th>
                                        <th scope="col">
                                            <center>Gejala Terpilih</center>
                                        </th>
                                        <th scope="col">
                                            <center>Penyakit Terkait</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                                    $gejala_user = "SELECT * FROM gejala_user LEFT JOIN gejala ON gejala_user.id_gejala = gejala.id_gejala LEFT JOIN basis_pengetahuan ON gejala.id_gejala = basis_pengetahuan.id_gejala LEFT JOIN penyakit ON basis_pengetahuan.id_penyakit = penyakit.id_penyakit WHERE tgl='$tgl_sekarang' AND id_user='$id_pasien'";
                                                    $result_gejala_user = mysqli_query($conn, $gejala_user);
                                                    $id_penyakit_array = array();
                                                    if(mysqli_num_rows($result_gejala_user) > 0){
                                                        $counter = 1;
                                                        while ($row_gejala = mysqli_fetch_assoc($result_gejala_user)) {
                                                ?>
                                        <th scope="row">
                                            <center><?= $counter++; ?></center>
                                        </th>
                                        <?php
                                                    if($row_gejala['kondisi'] == 1.0) {
                                                        $kondisi_user = "Pasti Ya";
                                                    }elseif($row_gejala['kondisi'] == 0.8) {
                                                        $kondisi_user = "Hampir Pasti";
                                                    }elseif($row_gejala['kondisi'] == 0.6) {
                                                        $kondisi_user = "Kemungkinan Besar";
                                                    }elseif($row_gejala['kondisi'] == 0.4) {
                                                        $kondisi_user = "Mungkin";
                                                    }elseif($row_gejala['kondisi'] == 0.2) {
                                                        $kondisi_user = "Hampir Mungkin";
                                                    }elseif($row_gejala['kondisi'] == 0.0) {
                                                        $kondisi_user = "Tidak";
                                                    }
                                        ?>
                                        <td><?= $row_gejala['kode_gejala']; ?> - <?= $row_gejala['nama_gejala']; ?> -
                                            (<?= $kondisi_user; ?>)</td>
                                        <td><?= $row_gejala['nama_penyakit']; ?></td>
                                    </tr>
                                    <?php 
                                        $id_penyakit_array[] = $row_gejala['id_penyakit'];
                                        $unique_value = array_unique($id_penyakit_array);
                                        $new_array = [];
                                        foreach ($unique_value as $value) {
                                            array_push($new_array, $value);
                                        }
                                    }} 
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            // inisialisasi array
                            $basis = array();
                            $gejala = array();
                            $hasil = array();

                            // perulangan sepanjang array
                            foreach ($new_array as $id) {
                                // query untuk mendapatkan data dari tabel basis_pengetahuan
                                $queryBasis = "SELECT * FROM basis_pengetahuan WHERE id_penyakit = " . $id;
                                $resultBasis = mysqli_query($conn, $queryBasis);

                                // memasukkan data dari query ke dalam array basis
                                if (mysqli_num_rows($resultBasis) > 0) {
                                    while ($data_basis = mysqli_fetch_assoc($resultBasis)) {
                                        $basis[] = array(
                                            'id_gejala' => $data_basis['id_gejala'],
                                            'cf' => $data_basis['cf']
                                        );
                                    }
                                }

                                // query untuk mendapatkan data dari tabel gejala_user
                                $queryGejala = "SELECT * FROM gejala_user WHERE id_user = '$id_pasien' AND tgl = '$tgl_sekarang'";
                                $resultGejala = mysqli_query($conn, $queryGejala);

                                // memasukkan data dari query ke dalam array gejala
                                if (mysqli_num_rows($resultGejala) > 0) {
                                    while ($data_gejala = mysqli_fetch_assoc($resultGejala)) {
                                        $gejala[] = array(
                                            'id_gejala' => $data_gejala['id_gejala'],
                                            'kondisi' => $data_gejala['kondisi']
                                        );
                                    }
                                }

                                // perulangan pengecekan dan perhitungan
                                $temp_hasil = array();
                                foreach ($basis as $data_basis) {
                                    $found = false;
                                    foreach ($gejala as $data_gejala) {
                                        if ($data_basis['id_gejala'] == $data_gejala['id_gejala']) {
                                            $temp_hasil[] = number_format(($data_basis['cf'] * $data_gejala['kondisi']),2);
                                            $found = true;
                                            break;
                                        }
                                    }
                                    if (!$found) {
                                        $temp_hasil[] = 0;
                                    }
                                }

                                // perhitungan nilai cf
                                $cf1 = number_format(($temp_hasil[0] + $temp_hasil[1] * (1 - $temp_hasil[0])),2);
                                $cf2 = number_format(($cf1 + $temp_hasil[2] * (1 - $cf1)),2);
                                $cf3 = number_format(($cf2 + $temp_hasil[3] * (1 - $cf2)),2);
                                $cf4 = number_format(($cf3 + $temp_hasil[4] * (1 - $cf3)),2);

                                // menyimpan nilai cf terakhir ke dalam array temp_hasil
                                $temp_hasil[] = $cf4;
                                $temp_hasil[] = $id;

                                // memasukkan hasil perhitungan ke dalam array hasil
                                $hasil[] = $temp_hasil;

                                // mengosongkan array basis dan gejala
                                $basis = array();
                                $gejala = array();
                            }
                            ?>
                            <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i>
                                <h7 style="font-size: 14px;">Berdasarkan gejala yang dipilih dan penyakit terkait, maka
                                    anda di diagnosa
                                    mengalami
                                    penyakit dengan probabilitas seperti dibawah ini :</h7>
                            </span><br><br>

                            <?php
                                // mencari penyakit dengan nilai terbesar
                                $max_value = 0;
                                $max_index = 0;

                                foreach ($hasil as $index => $data) {
                                    // mencari nilai terbesar pada index ke-6
                                    $current_value = $data[5];
                                    if ($current_value > $max_value) {
                                        // jika nilai saat ini lebih besar dari nilai terbesar sebelumnya
                                        // simpan nilai saat ini dan indexnya
                                        $max_value = $current_value;
                                        $max_index = $index;
                                    }
                                }

                                // menampilkan hasil menggunakan HTML
                                echo "<table class='table table-bordered'>";
                                echo "<tr><th><center>Diagnosa Penyakit</center></th><th><center>Deskripsi Penyakit</center></th><th><center>Tingkat Probabilitas</center></th></tr>";
                                foreach ($hasil as $key => $data) {
                                    $queryPenyakit = "SELECT * FROM penyakit WHERE id_penyakit = $data[6]";
                                    $resultPenyakit = mysqli_query($conn, $queryPenyakit);
                                    if(mysqli_num_rows($resultPenyakit) > 0) {
                                        $namaPenyakit = mysqli_fetch_assoc($resultPenyakit);
                                    }
                                    $persentase = $data[5] * 100;
                                    echo "<tr><td>" . $namaPenyakit['nama_penyakit'] . "</td><td>" . $namaPenyakit['pengertian_penyakit'] ."</td><td><center>" . $persentase . "%</center></td></tr>";
                                }
                                echo "</table>";

                                $idKet = $hasil[$max_index][6];
                                $persentaseProbabilitas = $max_value * 100;
                                $queryKet = "SELECT * FROM penyakit WHERE id_penyakit = '$idKet'";
                                $resultKet = mysqli_query($conn, $queryKet);
                                $dataKet = mysqli_fetch_assoc($resultKet);
                                
                            ?>

                            <button type="button" class="btn btn-warning mb-2">
                                Berdasarkan tingkat probabilitas tersebut, anda di diagnosa
                                mengidap penyakit <b><?= $dataKet['nama_penyakit']; ?></b> dengan probabilitas
                                sebanyak <b><?= $persentaseProbabilitas; ?>%</b>. Segera lakukan konsultasi dengan
                                dokter untuk tindakan lebih lanjut.</span>
                            </button>

                        </div>
                    </div>
                    <a href="cetak-hasil.php?tgl=<?= $tgl_sekarang; ?>" class="btn btn-success" style="width: 100%;">
                        <i class="bi bi-printer-fill"></i>&nbsp; Cetak Hasil Diagnosa
                    </a>
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