<?php
include "config.php";
header('Content-Type application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$data= json_decode(file_get_contents("php://input"), true);

$test_id=$data['id'];
$sql="DELETE FROM `test` WHERE id ={$test_id}";

if($result=mysqli_query($con,$sql)){
    echo json_encode(array('message'=>'Student record delete','status' =>'true'));
}
else{
    echo json_encode(array('message'=>'no record found','status' =>'false'));
}
?>