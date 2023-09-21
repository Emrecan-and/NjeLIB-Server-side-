<?php
$response=array();
require_once "../includes/DbOperations.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['username']) and isset($_POST['durum'])){
        $db=new DbOperations();
        if($db->updateDurum($_POST['username'],$_POST['durum'])==1){
            $user=$db->getUserByUsername($_POST['username']);
            $response['error']=false;
            $response['message']="Updated successfully";
            $response['durum']=$user['durum'];
        }else{
            $response['error']=true;
            $response['message']="Some error occured.";
        }
    }else{
     $response['error']=true;
     $response['message']="Required fields missing";
    }
}else{ $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);