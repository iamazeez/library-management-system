<?php 
session_start();
$email = $_SESSION['userLogin'];
session_destroy();
header('location:index.php');