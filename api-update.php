<?php
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
var_dump($data);


if (isset($data['name']) && isset($data['age']) && isset($data['city'])) {
    $id = $data['id'];
    $name = $data['name'];
    $age = $data['age'];
    $city = $data['city'];

    $sql = "UPDATE `test` SET `name`='{$name}',`age`='{$age}',`city`='{$city}' WHERE id={$id}";
    $result = mysqli_query($con, $sql);

    if ($result) {
        
        echo json_encode(array('message' => 'Record inserted update', 'status' => 'true'));
    } else {
        echo json_encode(array('message' => 'Failed to insert record', 'status' => 'false'));
    }
} else {
    echo json_encode(array('message' => 'Missing or incomplete data', 'status' => 'false'));
}
?>