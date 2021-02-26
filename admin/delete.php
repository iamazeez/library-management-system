<?php
if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }
if(!isset($_GET['id'])){
      header('location:index.php');
}

include_once('conn.php');
include_once('adminApp.php');

$admin = new Admin($con);
$admin->deleteIssueBookRecord($_GET['id']);
header('location:index.php');

?>


