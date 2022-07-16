<?php
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$username=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['password'];
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$gender=$_GET['gender'];
$dob=$_GET['dob'];
$address=$_GET['address'];
$city=$_GET['city'];
$pin=$_GET['pin'];
$state=$_GET['state'];
$country=$_GET['country'];
$contact=$_GET['contact'];
$selectadmin="SELECT `ADMIN_EMAIL` FROM `admin_master` WHERE 1";
$queryadmin=mysqli_query($con,$selectadmin);
if($queryadmin){
    while($row=mysqli_fetch_array($queryadmin)){
        $admin=$row['ADMIN_EMAIL'];
    }
}
$selectshopkeeper="SELECT `SHOPKEEPER_EMAIL` FROM `shopkeeper_master` WHERE 1";
$queryshopkeeper=mysqli_query($con,$selectshopkeeper);
if($queryshopkeeper){
    while($row=mysqli_fetch_array($queryshopkeeper)){
        $shopkeeper=$row['SHOPKEEPER_EMAIL'];
    }
}

if($email==$admin || $email==$shopkeeper){
  echo '<div class="alert alert-danger" role="alert">
Email already in use..Enter a different email.
</div>';
}
else{
$insert="INSERT INTO `customer_master`(`CUSTOMER_ID`, `ADMIN_ID`, `SHOPKEEPER_ID`,`CUSTOMER_USERNAME`,`CUSTOMER_EMAIL`, `CUSTOMER_PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `DOB`, `ADDRESS`, `CITY`, `PIN`, `STATE`, `COUNTRY`, `CONTACT`,`DATE`) VALUES ('','1','1',
'$username','$email','$password','$fname','$lname','$gender','$dob','$address','$city','$pin','$state','$country','$contact',current_timestamp())";
if($query=mysqli_query($con,$insert)){
  header("location:\ONLINE ELECTRONIC MANAGEMENT SYSTEM\login\login.php");
}
else{
  die('<script> alert("Invalid otp");</script>');
}
}
?>