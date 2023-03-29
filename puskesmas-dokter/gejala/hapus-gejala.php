<?php

require('../koneksi.php');

session_start();

$id_gejala = $_GET['nomor'];

$query = "DELETE FROM gejala WHERE id_gejala=$id_gejala";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data-gejala.php';</script>";
}else {
    echo "<script>alert('Data gagal dihapus!'); window.location.href = 'data-gejala.php';</script>";
}

?>