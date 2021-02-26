<?php
include_once('userApp.php');
include_once('conn.php');

$userApp = new UserApp($con);

//Register User
if(isset($_POST['registerEmail'])){
    $email = $_POST['registerEmail'];
    $username = $_POST['registerUsername'];
    $password = $_POST['registerPassword'];

    $checkUser = $userApp->checkUserExists($email,$username);  
    if(!$checkUser){
         //Register and login user
        $userApp->registerUser($username,$email,$password);
        session_start(); 
        $_SESSION['userLogin'] = $email;
        echo 1;
    }else{
       
        echo 2;
    }
}


//Login UserApp
if(isset($_POST['loginEmail'])){
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $login = $userApp->loginUser($email,$password);
    if($login){
        //Login
        session_start(); 
        $_SESSION['userLogin'] = $email;
        echo 1;
    }else{
        echo "Please enter correct information";
    }
}


?>