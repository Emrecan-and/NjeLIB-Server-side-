<?php
$response=array();
require_once "../includes/DbOperations.php";
if($_SERVER['REQUEST_METHOD']=='GET'){
    $db=new DbOperations();
    $lib=$db->getLibData();
    $response['error']=false;
    $response['message']="Taken successfully";
    $response['capacity']=$lib['capacity'];
    $response['currentuser']=$lib['currentuser'];
}else{
    $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);