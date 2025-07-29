<?php
include '../conn.php';

// Ambil data dari tabel DB
$nama = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];
$pilih_gender = $_POST['gender'];

// Validasi input
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email tidak valid.");
}

// query untuk memasukkan data ke database
$stmt = $koneksi->prepare("INSERT INTO latihan2 (name, email, website, comment, gender) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $email, $website, $comment, $pilih_gender);

if ($stmt->execute()) {
    header("Location: tampilData.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>