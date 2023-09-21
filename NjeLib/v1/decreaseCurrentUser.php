<?php
$response=array();
require_once "../includes/DbOperations.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['currentuser'])){
    $db=new DbOperations();
    if($db->decreaseCurrentUser($_POST['currentuser'])){
         $user=$db->getLibData();
         $response['error']=false;
         $response['message']="Updated succesfully";
         $response['capacity']=$user['capacity'];
         $response['currentuser']=$user['currentuser'];
    }else{
        $response['error']=true;
        $response['message']="Some error occured";
    }
  }else{
    $response['error']=true;
    $response['message']="Required fields missing";
  }
}else{
    $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);