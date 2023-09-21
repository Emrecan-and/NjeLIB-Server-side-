<?php
$response=array(); 
require_once "../includes/DbOperations.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
   if(isset($_POST['capacity'])){
    $db=new DbOperations();
    if($db->updateLibCapacity($_POST['capacity'])){
          $user=$db->getLibData();
          $response['error']=false;
          $response['message']="Updated successfully";
          $response['capacity']=$user['capacity'];
          $response['currentuser']=$user['currentuser'];
    }else{
        $response['error']=true;
        $response['message']="Some error occured";
    }
   }else{
    $response['error']=true;
    $response['message']="Requiered fields missing";
   }

}else{
    $response['error']=true;
    $response['message']="Invalid request";
}
echo json_encode($response);