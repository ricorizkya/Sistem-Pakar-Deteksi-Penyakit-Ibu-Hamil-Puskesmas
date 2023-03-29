<?php
// Konfigurasi koneksi database
$host = "localhost"; // nama host
$user = "root"; // nama pengguna database
$password = ""; // password database
$database = "db_puskesmas"; // nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";
?>