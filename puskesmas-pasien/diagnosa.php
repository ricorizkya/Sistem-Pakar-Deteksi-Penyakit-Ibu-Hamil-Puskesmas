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

        <div class="pagetitle">
            <h1>Diagnosa Penyakit</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Diagnosa Penyakit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header">
                    <h3><b>Pilih gejala sesuai dengan apa yang anda rasakan</b></h3>
                </div>
                <div class="card-body">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM gejala");
                        if(mysqli_num_rows($result) > 0){
                            $counter = 1;
                    ?>
                    <!-- Bordered Table -->

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Gejala</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
while ($row = mysqli_fetch_assoc($result)) {
?>
                            <tr>
                                <?php
                                $id_gejala_cek = $row['id_gejala'];
                                $queryCek = "SELECT * FROM gejala_user WHERE tgl='$tgl_sekarang' AND id_user='$id_pasien' AND id_gejala=$id_gejala_cek";
                                $resultCek = mysqli_query($conn, $queryCek);
                                if(mysqli_num_rows($resultCek) > 0){
                                    $rowCek = mysqli_fetch_assoc($resultCek);
                                    if ($rowCek['kondisi'] == 1.0) {
                                        $teks_kondisi_cek = "Pasti Ya";
                                    } else if ($rowCek['kondisi'] == 0.8) {
                                        $teks_kondisi_cek = "Hampir Pasti";
                                    } else if ($rowCek['kondisi'] == 0.6) {
                                        $teks_kondisi_cek = "Kemungkinan Besar";
                                    } else if ($rowCek['kondisi'] == 0.4) {
                                        $teks_kondisi_cek = "Mungkin";
                                    } else if ($rowCek['kondisi'] == 0.2) {
                                        $teks_kondisi_cek = "Hampir Mungkin";
                                    } else {
                                        $teks_kondisi_cek = "Tidak";
                                    }
                                    echo "<td>" . $counter++ . "</td>";
                                    echo "<td>" . $row['kode_gejala'] . "</td>";
                                    echo "<td>" . $row['nama_gejala'] . "</td>";
                                    echo "<td>" . $teks_kondisi_cek . "</td>";
                                }elseif (isset($_POST['simpan-gejala']) && $_POST['id_gejala'] == $row['id_gejala']) {
            // Jika tombol simpan pada baris ini ditekan, maka simpan ke database dan tampilkan teks
                                        
                                        $id_gejala = $_POST['id_gejala'];
                                        $kondisi = $_POST['kondisi'];
                                        $querySimpan = "INSERT INTO gejala_user (tgl,id_gejala,kondisi,id_user) VALUES ('$tgl_sekarang','$id_gejala','$kondisi','$id_pasien')";
            mysqli_query($conn, $querySimpan);

            // tampilkan teks sesuai dengan nilai yang dipilih
            if ($kondisi == 1.0) {
                $teks_kondisi = "Pasti Ya";
            } else if ($kondisi == 0.8) {
                $teks_kondisi = "Hampir Pasti";
            } else if ($kondisi == 0.6) {
                $teks_kondisi = "Kemungkinan Besar";
            } else if ($kondisi == 0.4) {
                $teks_kondisi = "Mungkin";
            } else if ($kondisi == 0.2) {
                $teks_kondisi = "Hampir Mungkin";
            } else {
                $teks_kondisi = "Tidak";
            }
            echo "<td>" . $counter++ . "</td>";
            echo "<td>" . $row['kode_gejala'] . "</td>";
            echo "<td>" . $row['nama_gejala'] . "</td>";
            echo "<td>" . $teks_kondisi . "</td>";
        } else {
            // Jika tombol simpan pada baris ini belum ditekan, tampilkan dropdown
            ?>
                                <form action="" method="post">
                                    <td><?php echo $counter++; ?></td>
                                    <td>
                                        <?php echo $row['kode_gejala']; ?>
                                        <input type="hidden" id="form3Example3" class="form-control" name="id_gejala"
                                            value="<?php echo $row['id_gejala']; ?>" />
                                    </td>
                                    <td><?php echo $row['nama_gejala']; ?></td>
                                    <?php
                                            $id_gejala_cek = $row['id_gejala'];
                                            $queryCek = "SELECT * FROM gejala_user WHERE tgl='$tgl_sekarang' AND id_user='$id_pasien' AND id_gejala=$id_gejala_cek";
                                            $resultCek = mysqli_query($conn, $queryCek);
                                            if(mysqli_num_rows($resultCek) > 0){
                                                $rowCek = mysqli_fetch_assoc($resultCek);
                                                if ($rowCek['kondisi'] == 1.0) {
                                                    $teks_kondisi_cek = "Pasti Ya";
                                                } else if ($rowCek['kondisi'] == 0.8) {
                                                    $teks_kondisi_cek = "Hampir Pasti";
                                                } else if ($rowCek['kondisi'] == 0.6) {
                                                    $teks_kondisi_cek = "Kemungkinan Besar";
                                                } else if ($rowCek['kondisi'] == 0.4) {
                                                    $teks_kondisi_cek = "Mungkin";
                                                } else if ($rowCek['kondisi'] == 0.2) {
                                                    $teks_kondisi_cek = "Hampir Mungkin";
                                                } else {
                                                    $teks_kondisi_cek = "Tidak";
                                                }
                                        ?>
                                    <td><?php echo $teks_kondisi_cek; ?></td>
                                    <?php
                                            }else {
                                    ?>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" name="kondisi">
                                            <option value='0.0'>Pilih Kondisi</option>
                                            <option value='1.0'>Pasti Ya</option>
                                            <option value='0.8'>Hampir Pasti</option>
                                            <option value='0.6'>Kemungkinan Besar</option>
                                            <option value='0.4'>Mungkin</option>
                                            <option value='0.2'>Hampir Mungkin</option>
                                            <option value='0.0'>Tidak</option>
                                        </select>
                                        <button type="submit" name="simpan-gejala" class="btn btn-primary"
                                            style="width: 100%;">Simpan</button>
                                    </td>
                                    <?php } ?>
                                </form>
                                <?php
        }
        ?>
                            </tr>
                            <?php
}
}
?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered" style="width: 100%;">
                        Lanjut
                    </button>
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Daftar Gejala Anda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Gejala</th>
                                                <th scope="col">Nama Gejala</th>
                                                <th scope="col">Kondisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                    $gejala_user = "SELECT * FROM gejala_user LEFT JOIN gejala ON gejala_user.id_gejala = gejala.id_gejala WHERE tgl='$tgl_sekarang' AND id_user='$id_pasien'";
                                                    $result_gejala_user = mysqli_query($conn, $gejala_user);
                                                    if(mysqli_num_rows($result_gejala_user) > 0){
                                                        $counter = 1;
                                                        while ($row_gejala = mysqli_fetch_assoc($result_gejala_user)) {
                                                ?>
                                                <th scope="row"><?= $counter++; ?></th>
                                                <td><?= $row_gejala['kode_gejala']; ?></td>
                                                <td><?= $row_gejala['nama_gejala']; ?></td>
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
                                                <td><?= $kondisi_user; ?></td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <a href="hasil.php" class="btn btn-success">Lanjutkan</a>
                                </div>
                            </div>
                        </div>
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