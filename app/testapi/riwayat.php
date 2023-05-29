<?php
include "koneksi.php";

// Mendapatkan ID pengguna yang login dari metode POST
 // Pastikan "id_user" sesuai dengan key yang dikirim dari Android Studio

$sql = "SELECT * FROM pemesanan";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo "0 results";
}

$con->close();
?>
