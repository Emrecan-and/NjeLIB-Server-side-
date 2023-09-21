<?php
$response=array();
require_once '../includes/DbOperations.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
     if(isset($_POST['username']) and isset($_POST['password'])){
         $db=new DbOperations();
         if($db->userLogin($_POST['username'],$_POST['password'])){
           $user=$db->getUserByUsername($_POST['username']);
           $response['error']=false;
           $response['message']="Login succesfully";
           $response['id']=$user['id'];
           $response['username']=$user['username'];
           $response['email']=$user['email'];
           $response['durum']=$user['durum'];
         }else{
            $response['error']=true;
            $response['message']="Invalid username or password";
         }
     }else{
        $response['error']=true;
        $response['message']="Required fields are missing";
     }
}else{
    $response['error']=true;
    $response['message']="Invalid request";
}

echo json_encode($response);
