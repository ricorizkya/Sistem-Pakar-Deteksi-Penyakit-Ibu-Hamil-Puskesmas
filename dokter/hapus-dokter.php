<?php

require('../koneksi.php');

session_start();

$id_dokter = $_GET['nomor'];

$query = "DELETE FROM dokter WHERE id_dokter=$id_dokter";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data-dokter.php';</script>";
}else {
    echo "<script>alert('Data gagal dihapus!'); window.location.href = 'data-dokter.php';</script>";
}

?>