<?php
require_once('koneksi.php');

if($con) {
    // Query untuk mengambil data dari tabel data_unit
    $query = "SELECT * FROM data_unit";
    $result = mysqli_query($con, $query);
    $response = array();

    // Looping untuk menambahkan data ke array response
    while ($row = mysqli_fetch_array($result)) {
        $data = array(
            "nama" => $row['nama'],
            "gambar" => $row['gambar'],
            "jeniskendaraan" => $row['jeniskendaraan'],
            "hargasewa" => $row['hargasewa']
        );
        array_push($response, $data);
    }

    // Mengirimkan response dalam format JSON
    echo json_encode(array("server_response" => $response));
} else {
    // Response jika gagal terkoneksi dengan database
    $response = array(
        'status' => 'FAILED'
    );
    echo json_encode(array("server_response" => $response));
}

// Menutup koneksi ke database
mysqli_close($con);
?>
