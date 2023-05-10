<?php
    require('../koneksi.php');

    session_start();
    $username = $_SESSION['username'];

    $id_dokter = $_GET['nomor'];

    $querySelect = "SELECT * FROM dokter WHERE id_dokter=$id_dokter";

    $result = mysqli_query($conn, $querySelect);
    $rowDokter = mysqli_fetch_assoc($result);

    if (isset($_POST['tambah-dokter'])) {
        $nama_dokter = $_POST['nama_dokter'];
        $nip_dokter = $_POST['nip_dokter'];
        $jabatan_dokter = $_POST['jabatan_dokter'];
        $username_dokter = $_POST['username_dokter'];
        $password_dokter = $_POST['password_dokter'];
    
        $ekstensi = ['png', 'jpg', 'jpeg'];
        $filename = $_FILES['foto_dokter']['name'];
        $ukuran = $_FILES['foto_dokter']['size'];
        $loc = $_FILES['foto_dokter']['tmp_name'];
        $target_dir = '/Applications/XAMPP/xamppfiles/htdocs/puskesmas/assets/img/';
        $target_file = $target_dir . basename($filename);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Upload Foto Gagal! Pastikan Foto Menggunakan Ekstensi .png, .jpg, atau .jpeg'); window.location.href = 'tambah-dokter.php';</script>";
        } elseif ($ukuran > 1044070) {
            echo "<script>alert('Data Dokter Gagal Ditambahkan! Ukuran Foto Terlalu Besar!'); window.location.href = 'tambah-dokter.php';</script>";
        } elseif(move_uploaded_file($loc, $target_file)) {
            $query = "INSERT INTO dokter (nama_dokter, nip_dokter, jabatan, username_dokter, password_dokter, foto_dokter) VALUES ('$nama_dokter', '$nip_dokter', '$jabatan_dokter', '$username_dokter', '$password_dokter', '$filename')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data Dokter Berhasil Ditambahkan!'); window.location.href = 'data-dokter.php';</script>";
            } else {
                echo "<script>alert('Data Dokter Gagal Ditambahkan!'); window.location.href = 'tambah-dokter.php';</script>";
            }
        }else {
            $error = error_get_last();
            echo "<script>alert('".$error['message']."'); </script>";
        }
            
        // } else {
        //     // $error = $_FILES['foto_dokter']['error'];
        //     // echo "<script>alert('".$error."'); </script>";
        // }
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
            <a href="../index.php" class="logo d-flex align-items-center">
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
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="../data-pasien.php">
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
                <a class="nav-link collapsed" href="../data-pengetahuan.php">
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

        <div class="pagetitle">
            <h1>Edit Data Dokter</h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="data-dokter.php">Data Dokter</a></li>
                    <li class="breadcrumb-item active">Edit Data Dokter</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body"><br>
                    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="inputName5" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="inputName5" name="nama_dokter"
                                value="<?= $rowDokter['nama_dokter']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Nomor Induk Dokter</label>
                            <input type="number" class="form-control" id="inputEmail5" name="nip_dokter"
                                value="<?= $rowDokter['nip_dokter']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Jabatan Dokter</label>
                            <input type="text" class="form-control" id="inputName5" name="jabatan_dokter"
                                value="<?= $rowDokter['jabatan']; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="inputName5" class="form-label">Username Dokter</label>
                            <input type="text" class="form-control" id="inputName5" name="username_dokter"
                                value="<?= $rowDokter['username_dokter']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Password Dokter</label>
                            <input type="password" class="form-control" id="inputEmail5" name="password_dokter"
                                value="<?= $rowDokter['password_dokter']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Foto Dokter</label>
                            <input type="file" class="form-control" id="inputEmail5" name="foto_dokter" value=""
                                required>
                        </div>
                        <div class="col-md-12">
                            <img src="../assets/img/<?= $rowDokter['foto_dokter']; ?>" alt="" srcset=""
                                style="width: 250px; height: 300px;">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="edit-dokter" class="btn btn-primary"
                                style="width: 100%;">Submit</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
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