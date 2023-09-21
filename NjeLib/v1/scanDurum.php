<?php
require_once "../includes/DbOperations.php";
$response=array();
if($_SERVER['REQUEST_METHOD']=="POST"){
   if(isset($_POST['username'])){
    $db=new DbOperations();
    if($db->scanDurum($_POST['username'])){
        $response['error']=false;
        $response['message']="QR transaction was completed successfully";
    }else{
        $response['error']=true;
        $response['message']="Username is wrong.PLEASE SCAN AGAIN!";
    }
   }else{
    $response['error']=true;
    $response['message']="Username is empty,PLEASE SCAN AGAIN!";
   }
}else{
    $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);