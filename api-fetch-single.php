<?php
include "config.php";
header('Content-Type application/json');
header('Access-Control-Allow-Origin: *');
$data= json_decode(file_get_contents("php://input"), true);

$test_id=$data['sid'];
$sql="SELECT * FROM `test` WHERE id ={$test_id}";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'no record found','status' =>'false'));
}
?>