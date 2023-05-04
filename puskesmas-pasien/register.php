<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require('../koneksi.php');

    session_start();

    if(isset($_POST['register'])) {
        $nama = $_POST['nama_lengkap'];
        $nik = $_POST['nik'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $umur = $_POST['usia'];
        $usia_hamil = $_POST['usia_hamil'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = $_POST['pekerjaan'];
        $nomor_hp = $_POST['nomor_hp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $querySelect = "SELECT * FROM pasien WHERE username_pasien = '$username'";
        $resultSelect = mysqli_query($conn, $querySelect);

        $query = "INSERT INTO pasien(nama_pasien, nik, tempat_lahir, tgl_lahir, pekerjaan, pendidikan, umur, usia_kehamilan, nomor_hp, alamat_pasien, username_pasien, password_pasien) VALUES ('$nama','$nik','$tempat_lahir','$tgl_lahir','$pekerjaan','$pendidikan','$umur','$usia_hamil','$nomor_hp','$alamat','$username','$password')";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($resultSelect) > 0) {
            echo "<script>alert('Username telah digunakan! Ulangi lagi dan gunakan username lainnya'); window.location.href = 'register.php';</script>";
            exit();
        }else {
            if(strlen($nik) < 16) {
                echo "<script>alert('Pastikan NIK terdiri dari 16 Digit!'); window.location.href = 'register.php';</script>";
                exit();
            }elseif(strlen($nik) > 16) {
                echo "<script>alert('Pastikan NIK terdiri dari 16 Digit!'); window.location.href = 'register.php';</script>";
                exit();
            }else{
                if($result) {
                $_SESSION['register_pasien'] = true;
                echo "<script>alert('Pendaftaran berhasil'); window.location.href = '../login.php';</script>";
                exit();
                }else {
                    echo "<script>alert('Pendaftaran gagal! Silahkan ulangi lagi'); window.location.href = 'register.php';</script>";
                    exit();    
                }
            }
        }

        // Menutup koneksi database
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Admin Puskesmas Mejobo</title>
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

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden" style="height: 100%;">
        <section class="background-radial-gradient overflow-hidden">
            <style>
            .background-radial-gradient {
                height: 100vh;
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                ;
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
            </style>

            <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5"
                style="width: 100%; height: 100%; overflow: auto;">
                <div class="row gx-lg-5 align-items-center mb-5" sty>
                    <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                            Selamat Datang! <br />
                            <span style="color: hsl(218, 81%, 75%)">Puskesmas Mejobo</span>
                        </h1>
                        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                            Lengkapi data diri anda untuk membuat akun baru. Pastikan anda mengingat data yang anda
                            masukkan dan pastikan data yang dimasukkan sesuai dengan dengan KTP.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="card-body px-6 py-5 px-md-7">
                                <form action="" method="post">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3" class="form-control" name="nama_lengkap"
                                            required />
                                        <label class="form-label" for="form3Example3">Nama Lengkap</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form3Example3" class="form-control" name="nik"
                                            required />
                                        <label class="form-label" for="form3Example3">NIK</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control"
                                                    name="tempat_lahir" required />
                                                <label class="form-label" for="form3Example1">Tempat Lahir</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="date" id="form3Example1" class="form-control"
                                                    name="tgl_lahir" required />
                                                <label class="form-label" for="form3Example1">Tanggal Lahir</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="number" id="form3Example1" class="form-control" name="usia"
                                                    required />
                                                <label class="form-label" for="form3Example1">Umur</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="usia_hamil">
                                                    <option selected></option>
                                                    <option value="Trimester 1">Trimester 1</option>
                                                    <option value="Trimester 2">Trimester 2</option>
                                                    <option value="Trimester 3">Trimester 3</option>
                                                    <option value="Trimester 4">Trimester 4</option>
                                                </select>
                                                <label class="form-label" for="form3Example2">Usia Kehamilan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="pendidikan">
                                                    <option selected></option>
                                                    <option value="SD/MI">SD/MI</option>
                                                    <option value="SMP/MTS/SLTP">SMP/MTS/SLTP</option>
                                                    <option value="SMA/SLTA">SMA/SMKA/MA/SLTA</option>
                                                    <option value="D3">D3</option>
                                                    <option value="D4">D4</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                                <label class="form-label" for="form3Example2">Pendidikan
                                                    Terakhir</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control"
                                                    name="pekerjaan" required />
                                                <label class="form-label" for="form3Example1">Pekerjaan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form3Example3" class="form-control" name="nomor_hp"
                                            required />
                                        <label class="form-label" for="form3Example3">Nomor HP</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <textarea id="form3Example3" class="form-control" name="alamat"
                                            required></textarea>
                                        <label class="form-label" for="form3Example3">Alamat Lengkap</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control"
                                                    name="username" required />
                                                <label class="form-label" for="form3Example1">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="form3Example2" class="form-control"
                                                    name="password" required />
                                                <label class="form-label" for="form3Example2">Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block" name="register">
                                        Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->

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