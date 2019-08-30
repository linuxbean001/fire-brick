<?php 
session_start();
global $con;
$con = mysqli_connect("166.62.8.52","Firebrickdb","Firebrick@123","Firebrickdb");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
  
?>