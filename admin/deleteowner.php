<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$id= $_GET['id'];
$delete="delete from shopkeeper_master where SHOPKEEPER_ID='$id';";
if($qdelete=mysqli_query($con,$delete)){
    echo "Record Deleted";
}
?>