<?php 
class UserApp{
   private $con;

   public function __construct($con){
      $this->con = $con;
   }

   public function sanitizeData($data){
      $data = htmlspecialchars($data);
      $data = rtrim($data);
      return $data;
  }

   public function checkUserExists($email,$username){
      $email = $this->sanitizeData($email);
      $username = $this->sanitizeData($username);
      $selquery = $this->con->prepare("SELECT * FROM user WHERE email =:email OR username =:username");
      $selquery->bindParam(":email",$email);
      $selquery->bindParam(":username",$username);
      $selquery->execute();
      $resultres = $selquery->fetchAll(PDO::FETCH_ASSOC);
      if(count($resultres) > 0){
         return true;
      }else{
         return false;
      }
   }

   public function registerUser($username,$email,$password){
       //Will be code
   $username = $this->sanitizeData($username);
   $email = $this->sanitizeData($email);
   $password = $this->sanitizeData($password);
   $password = password_hash($password, PASSWORD_DEFAULT);

   $register = $this->con->prepare("INSERT INTO user (username,email, password) VALUES (:username,:email,:password)");
   $register->bindParam(":username",$username);
   $register->bindParam(":email",$email);
   $register->bindParam(":password",$password);
   $register->execute();
   }

   public function loginUser($email,$password){
   
   $email = $this->sanitizeData($email);
   $password = $this->sanitizeData($password);
   
   $selquery = $this->con->prepare("SELECT password FROM user WHERE email =:email");
   $selquery->bindParam(":email",$email);
   $selquery->execute();
   $passwordDb = $selquery->fetchColumn();
      if(password_verify($password,$passwordDb)){
         return true;
      }else{
         return false;
      }
   }

   public function issueBook(){
    //Will be code
   }

   public function returnBook(){
    //Will be code
  }


}

?>