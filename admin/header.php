<?php 
if(!isset($access)){
    header('location:index.php');
}
include_once('adminApp.php');
include_once('conn.php');

session_start();

$admin = new Admin($con);
/*
if(!isset($_SESSION['admin'])){
  header("location: ../index.php");
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='css/tailwind.css' rel='stylesheet'>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
   <link href='css/style.css' rel='stylesheet'>
    
    <title>Brary</title>
</head>
<body class='bg-gray-200'>
      <!-- Header Start -->
      <header class="text-gray-100 bg-indigo-500 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href='index.php'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-gray-100 text-xl" >Brary</span>
          </a>
          <?php if(isset($_SESSION['admin'])){ ?>
          <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
           
            <a class="mr-5 hover:text-gray-900" href='register.php'>Create Admin</a>
            <a class="mr-5 hover:text-gray-900" href='bookIssue.php'>Issue Book</a>
          </nav>
            <?php } ?>
          <?php 
            if(isset($_SESSION['admin'])){
          ?>
          <a href='logout.php'>
          <button class="inline-flex items-center bg-gray-900 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 hover:text-black rounded text-base mt-4 md:mt-0">Logout
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button></a>
          <?php  } ?>

        </div>
      </header>
      <!-- Header Ends -->