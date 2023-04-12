<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require('koneksi.php');

    session_start();
    if($_SESSION['login'] == true) {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['login-admin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        // Memeriksa apakah query berhasil dijalankan
        if($result) {

            // Memeriksa apakah pengguna ditemukan
            if(mysqli_num_rows($result) == 1) {

                // Mengatur sesi untuk pengguna yang berhasil login
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;

                // Redirect ke halaman dashboard phpMyAdmin
                header('Location: index.php');
                exit();
            } else {
                // Jika pengguna tidak ditemukan, tampilkan pesan error
                echo "<script>alert('Username atau Password Salah! Silahkan Ulangi Lagi!');</script>";
            }

        } else {
            // Jika query gagal dijalankan, tampilkan pesan error
            echo "<script>alert('Query Gagal!');</script>";
        }

        // Menutup koneksi database
        mysqli_close($conn);
    }elseif(isset($_POST['login-dokter'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM dokter WHERE username_dokter='$username' AND password_dokter='$password'";
        $result = mysqli_query($conn, $query);

        // Memeriksa apakah query berhasil dijalankan
        if($result) {

            // Memeriksa apakah pengguna ditemukan
            if(mysqli_num_rows($result) == 1) {

                // Mengatur sesi untuk pengguna yang berhasil login
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;

                // Redirect ke halaman dashboard phpMyAdmin
                header('Location: puskesmas-dokter/index.php');
                exit();
            } else {
                // Jika pengguna tidak ditemukan, tampilkan pesan error
                echo "<script>alert('Username atau Password Salah! Silahkan Ulangi Lagi!');</script>";
            }

        } else {
            // Jika query gagal dijalankan, tampilkan pesan error
            echo "<script>alert('Query Gagal!');</script>";
        }

        // Menutup koneksi database
        mysqli_close($conn);
    }elseif(isset($_POST['login-pasien'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM pasien WHERE username_pasien='$username' AND password_pasien='$password'";
        $result = mysqli_query($conn, $query);

        // Memeriksa apakah query berhasil dijalankan
        if($result) {

            // Memeriksa apakah pengguna ditemukan
            if(mysqli_num_rows($result) == 1) {

                // Mengatur sesi untuk pengguna yang berhasil login
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;

                // Redirect ke halaman dashboard phpMyAdmin
                header('Location: puskesmas-pasien/index.php');
                exit();
            } else {
                // Jika pengguna tidak ditemukan, tampilkan pesan error
                echo "<script>alert('Username atau Password Salah! Silahkan Ulangi Lagi!');</script>";
            }

        } else {
            // Jika query gagal dijalankan, tampilkan pesan error
            echo "<script>alert('Query Gagal!');</script>";
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

            <div class="container px-4 py-5 px-md-2 text-center text-lg-start my-5" style="width: 100%; height: 100%;">
                <div class="row gx-lg-5 align-items-center mb-5" sty>
                    <div class="col-lg-5 mb-2 mb-lg-0" style="z-index: 10">
                        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                            Selamat Datang! <br />
                            <span style="color: hsl(218, 81%, 75%)">Puskesmas Mejobo</span>
                        </h1>
                    </div>

                    <div class="col-lg-7 mb-7 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="card-body px-4 py-5 px-md-10">
                                <form action="" method="post">
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3" class="form-control" name="username"
                                            required />
                                        <label class="form-label" for="form3Example3">Username</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control" name="password"
                                            required />
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <center>
                                        <button type="submit" class="btn btn-primary btn-block" name="login-admin">
                                            <i class="bi bi-person-fill-gear"></i> Login sebagai Admin
                                        </button>
                                        <button type="submit" class="btn btn-info btn-block" name="login-dokter">
                                            <i class="bi bi-person-vcard-fill"></i> Login sebagai Dokter
                                        </button>
                                        <button type="submit" class="btn btn-success btn-block" name="login-pasien">
                                            <i class="bi bi-person-badge-fill"></i> Login sebagai Pasien
                                        </button>
                                    </center><br>
                                    <div>
                                        <p>Pasien baru? <b><a href="/puskesmas-pasien/register.php">Daftar
                                                    Disini</a></b></p>
                                    </div>
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