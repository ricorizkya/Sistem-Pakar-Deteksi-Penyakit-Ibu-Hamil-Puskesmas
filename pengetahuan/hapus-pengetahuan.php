<?php

require('../koneksi.php');

session_start();

$id_pengetahuan = $_GET['nomor'];

$query = "DELETE FROM basis_pengetahuan WHERE id_pengetahuan=$id_pengetahuan";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data-pengetahuan.php';</script>";
}else {
    echo "<script>alert('Data gagal dihapus!'); window.location.href = 'data-pengetahuan.php';</script>";
}

?>