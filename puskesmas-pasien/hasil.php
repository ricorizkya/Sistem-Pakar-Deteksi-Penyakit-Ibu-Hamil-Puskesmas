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
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Diagnosa</li>

            <li class="nav-item">
                <a class="nav-link " href="diagnosa.php">
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

        <!-- <div class="pagetitle">
            <h1>Hasil Diagnosa</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Hasil Diagnosa</li>
                </ol>
            </nav>
        </div> -->
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col">
                    <div class="card info-card revenue-card">
                        <div class="card-header" style="background-color: #4154f1">
                            <h3 style="color: white;">Hasil Diagnosa</h3>
                        </div>
                        <div class="card-body">
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
                    <div class="card info-card revenue-card">
                        <div class="card-header" style="background-color: #4154f1">
                            <h4 style="color: white;">Pilih Dokter Untuk Konsultasi</h4>
                        </div>
                        <div class="card-body"><br>
                            <form action="" method="post">
                                <select class="form-select" aria-label="Default select example" name="id_dokter">
                                    <option selected>Daftar Dokter Spesialis Kandungan</option>
                                    <?php
                                        $queryDokter = "SELECT * FROM dokter";
                                        $resultDokter = mysqli_query($conn, $queryDokter);
                                        while($dataDokter = mysqli_fetch_assoc($resultDokter)){
                                            echo "<option value='".$dataDokter['id_dokter']."'>".$dataDokter['nama_dokter']."</option>";
                                        }
                                    ?>
                                </select><br>
                                <input type="hidden" name="hasil" class="form-control" value="<?php echo $max_value?>">
                                <input type="hidden" name="id_penyakit" class="form-control"
                                    value="<?php echo $idKet?>">
                                <button type="submit" name="simpan_diagnosa" class="btn btn-success"
                                    style="width: 100%;">
                                    <i class="bi bi-printer-fill"></i>&nbsp; Cetak Hasil Diagnosa
                                </button>
                            </form>

                            <?php
                                if(isset($_POST['simpan_diagnosa'])) {
                                    $id_dokter = $_POST['id_dokter'];
                                    $id_penyakit = $_POST['id_penyakit'];
                                    $hasil_penyakit = $_POST['hasil'];
                                    
                                    $querySimpan = "INSERT INTO riwayat (tgl,id_pasien,id_dokter,id_penyakit,hasil) VALUES ('$tgl_sekarang', '$id_pasien', '$id_dokter', '$id_penyakit', '$hasil_penyakit')";
                                    $resultSimpan = mysqli_query($conn, $querySimpan);
                                    if($resultSimpan) {
                                        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = 'hasil.php';</script>";
                                    }else {
                                        echo "<script>alert('Data gagal ditambahkan!'); window.location.href = 'diagnosa.php';</script>";
                                    }
                                }

                            ?>

                        </div>
                    </div>
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