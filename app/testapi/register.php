<?php
require_once('koneksi.php');

if($con){
  // Mengambil data dari request
  $username = $_POST["username"];
  $password = $_POST["password"];
  $no_hp = $_POST["no_hp"];
  $email = $_POST["email"];
  $alamat = $_POST["alamat"];
  $role = "user"; // role default

  // Menambahkan data ke database
  $sql = "INSERT INTO data_user (id_user, username, password, no_hp, email, alamat, role)
  VALUES ('', '$username', '$password', '$no_hp', '$email', '$alamat', '$role')";
  $result = mysqli_query($con, $sql);
  $response = array();

  if ($username !="" && $password !="" && $no_hp !="" && $email !="" && $alamat !="" && $role !=""){


    if ($result) {
      array_push($response, array(
        'status' => 'OK'
      ));
    } else {
      array_push($response, array(
        'status' => 'FAILED'
      ));
    }
  } else {
    array_push($response, array(
      'status' => 'FAILED'
    ));
  }

} else {
  array_push($response, array(
    'status' => 'FAILED'
  ));
}
echo json_encode(array("server_response" => $response));

// Menutup koneksi
mysqli_close($con);

?>
