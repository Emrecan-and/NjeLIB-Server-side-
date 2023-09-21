<?php

 class DbOperations{
    
    private $con;
   
    function __construct(){
       require_once dirname(__FILE__).'/DbConnect.php';
       $db=new DbConnect();
       $this->con=$db->connect();
    }

   public function createUser($username,$email,$durum,$şifre){
        if($this->isUserExist($username,$email)){
            return 0;
        }else{
        $şif=md5($şifre);  
        $stmt=$this->con->prepare("INSERT INTO `users` (`id`, `username`, `email`, `durum`, `şifre`) VALUES (NULL,?,?,?,?)");
        $stmt->bind_param("ssis",$username,$email,$durum,$şif);
        if($stmt->execute()){
             return 1;
        }else{
             return 2;  
        }}
     }
   private function isUserExist($username,$email){
      $stmt=$this->con->prepare("SELECT `id` FROM `users` WHERE `username` = ? OR `email` = ?");
      $stmt->bind_param("ss",$username,$email);
      $stmt->execute();
      $stmt->store_result();
      return $stmt->num_rows>0;
   }
   public function userLogin($username,$pass){
      $password=md5($pass);
      $stmt=$this->con->prepare("SELECT `id` FROM `users` WHERE `username`=? AND `şifre`=?");
      $stmt->bind_param("ss",$username,$password);
      $stmt->execute();
      $stmt->store_result();
      return $stmt->num_rows>0;
   }
   public function getUserByUsername($username){
      $stmt=$this->con->prepare("SELECT * FROM users WHERE username = ?");
      $stmt->bind_param("s",$username);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
   }
   public function updateDurum($username,$durum){
      $stmt = $this->con->prepare("UPDATE users SET durum = ? WHERE username = ?");
      $stmt->bind_param('is', $durum, $username);
      
      if ($stmt->execute()) {
          return 1;
      } else {
          return 0;
      }
      
   }
   public function getLibData(){
      $stmt=$this->con->prepare("SELECT * FROM library");
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
   }
   public function updateLibCapacity($capacity){
      $stmt=$this->con->prepare("UPDATE library SET capacity =?");
      $stmt->bind_param('i',$capacity);
      return $stmt->execute();
   }
   public function updateCurrentUser($currentuser){
      $stmt=$this->con->prepare("UPDATE library SET currentuser = ?");
      $s=$this->con->prepare("SELECT currentuser FROM library");
      $s->execute();
      $currentUser=$s->get_result()->fetch_assoc();
      $sa=$currentUser['currentuser']+1;
      $stmt->bind_param("i",$sa);
      return $stmt->execute();
   }
   public function getDurum($username){
      $stmt=$this->con->prepare("SELECT durum FROM users WHERE username=?");
      $stmt->bind_param("s",$username);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
   }
   public function resetCurrentUser(){
      $stmt=$this->con->prepare("UPDATE library SET currentuser =0");
      $s=$this->con->prepare("UPDATE users SET durum=0");
      $s->execute();
      return $stmt->execute();
   }
   public function scanDurum($username){
     $stmt=$this->con->prepare("SELECT durum FROM users WHERE username=?");
     $stmt->bind_param("s",$username);
     $stmt->execute();
     $user=$stmt->get_result()->fetch_assoc();
     if($user){
     if($user['durum']==1){
       $st=$this->con->prepare("UPDATE users SET durum=2 WHERE username=?");
       $st->bind_param("s",$username);
       $st->execute();
     }else if($user['durum']==2){
      $st=$this->con->prepare("UPDATE users SET durum=0 WHERE username=?");
      $st->bind_param("s",$username);
      $st->execute();

      $stmt=$this->con->prepare("UPDATE library SET currentuser = ?");
      $s=$this->con->prepare("SELECT currentuser FROM library");
      $s->execute();
      $currentUser=$s->get_result()->fetch_assoc();
      if($currentUser['currentuser']>0){
      $sa=$currentUser['currentuser']-1;
      $stmt->bind_param("i",$sa);
      $stmt->execute();}
     }
   return true;
   }else{ return false;}
   }
   public function decreaseCurrentUser($currentuser){
      $stmt=$this->con->prepare("UPDATE library SET currentuser = ?");
      $s=$this->con->prepare("SELECT currentuser FROM library");
      $s->execute();
      $currentUser=$s->get_result()->fetch_assoc();
      $sa=$currentUser['currentuser']-1;
      $stmt->bind_param("i",$sa);
      return $stmt->execute();
   }
 } 