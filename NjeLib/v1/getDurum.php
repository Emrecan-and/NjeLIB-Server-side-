<?php
$response=array();
require_once "../includes/DbOperations.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['username'])){
        $db=new DbOperations();
            $user=$db->getDurum($_POST['username']);
            $response['error']=false;
            $response['message']="Updated successfully";
            $response['durum']=$user['durum'];
            $response['username']="";
            $response['email']="";
    }else{
     $response['error']=true;
     $response['message']="Required fields missing";
    }
}else{ $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);