<?php
require_once('koneksi.php');


if($con)    {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // query untuk mencari user berdasarkan email dan password
    $query = "SELECT * FROM data_user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        // Mendapatkan data user (id_user dan username)
        $user = mysqli_fetch_assoc($result);
        $id_user = $user['id_user'];
        $username = $user['username'];

        array_push($response, array(
            'status' => 'OK',
            'id_user' => $id_user,
            'username' => $username
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

// mengirimkan response dalam format JSON
echo json_encode(array("server_response" => $response));

// menutup koneksi ke database
mysqli_close($con);
?>
