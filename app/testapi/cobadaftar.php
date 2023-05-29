<?php

// Koneksi database
$host = "localhost"; // Sesuaikan dengan host Anda
$username = "root"; // Sesuaikan dengan username Anda
$password = ""; // Sesuaikan dengan password Anda
$database = "go-rent"; // Sesuaikan dengan nama database Anda
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari request
$id_user = $_POST["id_user"];
$username = $_POST["username"];
$password = $_POST["password"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
$alamat = $_POST["alamat"];
$role = "user"; // role default

// Menambahkan data ke database
$sql = "INSERT INTO users (id_user, username, password, no_hp, email, alamat, role)
VALUES ('$id_user', '$username', '$password', '$no_hp', '$email', '$alamat', '$role')";

if (mysqli_query($conn, $sql)) {
  $response["success"] = true;
  $response["message"] = "Registrasi berhasil";
} else {
  $response["success"] = false;
  $response["message"] = "Registrasi gagal: " . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);

// Menampilkan response dalam format JSON
echo json_encode($response);
?>
