<?php
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
var_dump($data);

if (isset($data['sname']) && isset($data['sage']) && isset($data['city'])) {
    $name = $data['sname'];
    $age = $data['sage'];
    $city = $data['city'];

    $sql = "INSERT INTO `test` (`name`, `age`, `city`) VALUES ('$name', '$age', '$city')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(array('message' => 'Record inserted', 'status' => 'true'));
    } else {
        echo json_encode(array('message' => 'Failed to insert record', 'status' => 'false'));
    }
} else {
    echo json_encode(array('message' => 'Missing or incomplete data', 'status' => 'false'));
}
?>