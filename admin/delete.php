<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
include('users.php');
$id= $_GET['id'];
$delete="delete from customer_master where CUSTOMER_ID='$id';";
if($qdelete=mysqli_query($con,$delete)){
    echo '<div class="alert alert-success" role="alert">
        Record deleted
      </div>';
}
?>