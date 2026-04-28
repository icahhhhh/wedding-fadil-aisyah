<?php
header('Content-Type: application/json'); // Memastikan browser membaca ini sebagai JSON

$host = "sql112.infinityfree.com";
$user = "if0_41760170";
$pass = "Aisyah110104";
$db   = "if0_41760170_db_undangan";

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

// Tambahkan 'waktu' ke dalam SELECT agar data waktu terambil
$sql = "SELECT nama, pesan, waktu FROM ucapan ORDER BY waktu DESC";
$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Kita rapikan format waktu di sini (opsional) agar lebih enak dibaca di web
        // Contoh: dari 2026-05-24 08:00:00 menjadi 24 Mei 2026, 08:00
        if (!empty($row['waktu'])) {
            $row['waktu'] = date("d M Y, H:i", strtotime($row['waktu']));
        }
        $data[] = $row;
    }
}

// Mengirim data dalam format JSON
echo json_encode($data);

$conn->close();
?>