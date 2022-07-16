<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cid=$_GET['cid'];
$pid=$_GET['pid'];
    if(isset($_POST['addtocompare']) && $_POST['randcheck']==$_SESSION['rand']){
      $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
      $query=mysqli_query($con,$insert);
      if($query){
        echo'<script>
        window.history.back();
      </script>';
    }
    }
    if(isset($_POST['addtocompare1']) && $_POST['randcheck1']==$_SESSION['rand1']){
        $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
        $query=mysqli_query($con,$insert);
        if($query){
          echo'<script>
    window.history.back();
  </script>';
      }
      }
      if(isset($_POST['addtocompare2']) && $_POST['randcheck2']==$_SESSION['rand2']){
        $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
        $query=mysqli_query($con,$insert);
        if($query){
          echo'<script>
    window.history.back();
  </script>';
      }
      }
      if(isset($_POST['addtocompare3']) && $_POST['randcheck3']==$_SESSION['rand3']){
        $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
        $query=mysqli_query($con,$insert);
        if($query){
          echo'<script>
          window.history.back();
        </script>';
      }
      }
      if(isset($_POST['addtocompare4']) && $_POST['randcheck4']==$_SESSION['rand4']){
        $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
        $query=mysqli_query($con,$insert);
        if($query){
          echo'<script>
          window.history.back();
        </script>';
      }
      }
      if(isset($_POST['addtocomparepd'])){
      $insert="INSERT INTO `compare_master`(`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES ('','$cid','$pid')";
      $query=mysqli_query($con,$insert);
      if($query){
        echo'<script>
        window.history.back();
      </script>';
    }
    }
 ?>