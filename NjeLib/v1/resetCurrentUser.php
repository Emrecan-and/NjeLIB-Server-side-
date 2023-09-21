<?php
require_once "../includes/DbOperations.php";
$response=array();
if($_SERVER['REQUEST_METHOD']=="POST"){
     $db=new DbOperations();
     if($db->resetCurrentUser()){
        $response['error']=false;
        $response['message']="Resetted successfully";
     }else{
        $response['error']=true;
        $response['message']="Some error occured please try again";
     }
}else{
    $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);