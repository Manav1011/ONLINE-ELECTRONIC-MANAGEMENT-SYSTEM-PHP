<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cid=$_GET['cid'];
$pid=$_GET['pid'];
$bname=$_GET['bname'];
      if(isset($_POST['addtocompare5'])){
        $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
        $query=mysqli_query($con,$insert);
        if($query){
          echo'<script>
    window.history.back();
  </script>';
      }
    }
 ?>