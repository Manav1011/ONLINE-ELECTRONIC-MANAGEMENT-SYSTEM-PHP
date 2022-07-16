<?php
 include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
 session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
   header("location:login.php");
   exit;
 }
 $id=$_GET['id'];
 $delete="DELETE FROM `customer_master` WHERE `CUSTOMER_ID`='$id'";
 $query=mysqli_query($con,$delete);
 if($query){
   header("location:users.php");
 }
?>