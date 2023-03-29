<?php

require('koneksi.php');

session_start();

$id_admin = $_GET['nomor'];

$query = "DELETE FROM admin WHERE id_admin=$id_admin";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data-admin.php';</script>";
}else {
    echo "<script>alert('Data gagal dihapus!'); window.location.href = 'data-admin.php';</script>";
}

?>