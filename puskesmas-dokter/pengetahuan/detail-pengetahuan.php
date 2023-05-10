<?php
    require('../koneksi.php');

    session_start();
    $username = $_SESSION['username'];

    $id_penyakit = $_GET['nomor'];

    $querySelect = "SELECT * FROM penyakit WHERE id_penyakit=$id_penyakit";

    $result = mysqli_query($conn, $querySelect);
    $rowPenyakit = mysqli_fetch_assoc($result);

    if(isset($_POST['edit-pengetahuan'])) {
        $idPengetahuan = $_POST['id_pengetahuan'];
        $idGejala = $_POST['id_gejala'];
        $nilaiMB = $_POST['mb'];
        $nilaiMD = $_POST['md'];

        $queryEdit = "UPDATE basis_pengetahuan SET id_gejala='$idGejala',mb='$nilaiMB',md='$nilaiMD' WHERE id_pengetahuan='$idPengetahuan'";
        if(mysqli_query($conn, $queryEdit)) {
            echo "<script>alert('Data berhasil diubah!'); window.location.href = 'detail-pengetahuan.php?nomor=".$id_penyakit."';</script>";
        }else {
            echo "<script>alert('Data gagal diubah!'); window.location.href = 'detail-pengetahuan.php?nomor=".$id_penyakit."';</script>";
        } 
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
            <a href="index.html" class="logo d-flex align-items-center">
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
                <a class="nav-link collapsed" href="../pasien/data-pasien.php">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Pasien</span>
                </a>
            </li>

            <li class="nav-heading">Data Penyakit</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="data-penyakit.php">
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
                <a class="nav-link " href="data-pengetahuan.php">
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
            <h1>Detail Basis Pengetahuan Penyakit <?= $rowPenyakit['nama_penyakit']; ?></h1>
            <nav style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="data-pengetahuan.php">Data Basis Pengetahuan</a></li>
                    <li class="breadcrumb-item active">Detail Basis Pengetahuan Penyakit
                        <?= $rowPenyakit['nama_penyakit']; ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header"><a href="tambah-pengetahuan.php?nomor=<?= $rowPenyakit['id_penyakit']; ?>"
                        class="btn btn-primary" style="width: 100%;">Tambah
                        Basis Pengetahuan</a></div>
                <div class="card-body">
                    <?php
                        $query = "SELECT * FROM basis_pengetahuan LEFT JOIN penyakit ON basis_pengetahuan.id_penyakit = penyakit.id_penyakit LEFT JOIN gejala ON basis_pengetahuan.id_gejala = gejala.id_gejala WHERE penyakit.id_penyakit = $id_penyakit";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                            $counter = 1;
                    ?>
                    <!-- Bordered Table -->
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" hidden>ID Pengetahuan</th>
                                <th scope="col" hidden>ID Gejala</th>
                                <th scope="col">Kode Gejala</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">Nilai MB</th>
                                <th scope="col">Nilai MD</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td hidden><?php echo $row['id_pengetahuan']; ?></td>
                                <td hidden><?php echo $row['id_gejala']; ?></td>
                                <td><?php echo $row['kode_gejala']; ?></td>
                                <td><?php echo $row['nama_gejala']; ?></td>
                                <td><?php echo $row['mb']; ?></td>
                                <td><?php echo $row['md']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-launch-modal"
                                        data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                                        Edit
                                    </button>
                                    <a href="hapus-pengetahuan.php?nomor=<?php echo $row['id_pengetahuan']; ?>"
                                        class="btn btn-danger">Hapus</a>
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
                    <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><span id="kode_gejala"></span> - <span
                                            id="nama_gejala"></span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b>Ubah Nilai MB & MD</b><br><br>
                                    <form class="row g-3" action="" method="post">
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Masukkan Nilai MB</label>
                                            <input type="number" step="any" class="form-control" id="nilai_mb" name="mb"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Masukkan Nilai MD</label>
                                            <input ype="number" step="any" class="form-control" id="nilai_md" name="md"
                                                required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="number" step="any" class="form-control" id="id_gejala"
                                                name="id_gejala" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="number" step="any" class="form-control" id="id_pengetahuan"
                                                name="id_pengetahuan" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"
                                        name="edit-pengetahuan">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        $('.btn-launch-modal').click(function() {
                            var id_pengetahuan = $(this).closest('tr').find('td:eq(1)').text().trim();
                            var id_gejala = $(this).closest('tr').find('td:eq(2)').text().trim();
                            var kode_gejala = $(this).closest('tr').find('td:eq(3)').text().trim();
                            var nama_gejala = $(this).closest('tr').find('td:eq(4)').text().trim();
                            var mb = $(this).closest('tr').find('td:eq(5)').text().trim();
                            var md = $(this).closest('tr').find('td:eq(6)').text().trim();

                            $('#id_gejala').val(id_gejala);
                            $('#id_pengetahuan').val(id_pengetahuan);
                            $('#kode_gejala').text(kode_gejala);
                            $('#nama_gejala').text(nama_gejala);
                            $('#nilai_mb').val(mb);
                            $('#nilai_md').val(md);
                        });
                    });

                    // $('form').submit(function(event) {
                    //     event.preventDefault();
                    //     $.ajax({
                    //         type: "POST",
                    //         url: "proses-edit-pengetahuan.php",
                    //         data: $(this).serialize(),
                    //         success: function() {
                    //             alert('Data berhasil disimpan');
                    //             $('#disablebackdrop').modal('hide');
                    //             location.reload();
                    //         },
                    //         error: function() {
                    //             alert('Terjadi kesalahan');
                    //         }
                    //     });
                    // });
                    </script>
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