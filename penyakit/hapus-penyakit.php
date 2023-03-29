<?php

require('../koneksi.php');

session_start();

$id_penyakit = $_GET['nomor'];

$query = "DELETE FROM penyakit WHERE id_penyakit=$id_penyakit";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data-penyakit.php';</script>";
}else {
    echo "<script>alert('Data gagal dihapus!'); window.location.href = 'data-penyakit.php';</script>";
}

?>