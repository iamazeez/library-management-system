<?php 
session_start();
$email = $_SESSION['admin'];
session_destroy();
header('location: login.php');