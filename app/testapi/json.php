<?php
include "koneksi.php";

$sql = "SELECT * FROM data_unit";
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
