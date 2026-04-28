<?php
include "koneksi.php";

if(isset($_POST['nama'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    date_default_timezone_set('Asia/Makassar');
    $jam_datang = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO buku_tamu (nama, waktu_hadir) VALUES ('$nama', '$jam_datang')";
    
    if(mysqli_query($koneksi, $query)) {
        echo "success";
    } else {
        // Ini akan memunculkan pesan error asli dari MySQL jika gagal
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>