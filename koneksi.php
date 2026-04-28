<?php
$host = "sql112.infinityfree.com";
$user = "if0_41760170";
$pass = "Aisyah110104";
$db   = "if0_41760170_db_undangan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>