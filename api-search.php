<?php
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$response = array();

if (isset($_GET['search'])) {
  

    $searchText = $_GET['search'];
    $sql = "SELECT * FROM `test` WHERE name LIKE '%$searchText%' OR age LIKE '%$searchText%' OR city LIKE '%$searchText%'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        $response['status'] = 'success';
        $response['data'] = $data;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Query error';
    }
} 
echo json_encode($response);
?>
