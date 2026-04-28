<?php
// Pengaturan koneksi database
$host = "sql112.infinityfree.com";
$user = "if0_41760170";
$pass = "Aisyah110104";
$db   = "if0_41760170_db_undangan";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data yang dikirim dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $pesan = $conn->real_escape_string($_POST['pesan']);

    // NOW() adalah fungsi SQL untuk mengambil tanggal dan jam saat ini secara otomatis
    // Pastikan kolom 'waktu' sudah ada di tabel database kamu
    $sql = "INSERT INTO ucapan (nama, pesan, waktu) VALUES ('$nama', '$pesan', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error: " . $conn->error;
    }
}

$conn->close();
?>