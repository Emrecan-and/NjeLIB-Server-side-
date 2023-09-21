<?php
$response=array();
require_once '../includes/DbOperations.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
     if(isset($_POST['username']) and isset($_POST['şifre']) and isset($_POST['durum']) and isset($_POST['email']) ){
        $db=new DbOperations();  
        $s=$db->createUser($_POST['username'],$_POST['email'],$_POST['durum'],$_POST['şifre']);
        if($s == 1){
            $response['error']=false;
            $response['message']="User registered successfully";

        }else if($s == 0){
            $response['error']=true;
            $response['message']="Email or password already used.Enter different email or username";
        }
        else{
            $response['error']=true;
            $response['message']="Some error occured please try again";
        }
     }else{
        $response['error']=true;
        $response['message']="Required fields are missing";
     }
}else{
     $response['error']=true;
     $response['message']="Invalid Request";
}

echo json_encode($response);