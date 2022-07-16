<?php
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
session_start();
if(isset($_POST['submit'])){
    $email=$_SESSION['html'];
    $npassword=$_POST['npassword'];
    $cpassword=$_POST['cpassword'];
    if($npassword!=$cpassword){
        echo '<script>
        window.alert("password do not match");
        </script>';
    }
    else{
        $updatecustomer="UPDATE `customer_master` SET `CUSTOMER_PASSWORD`='$cpassword' WHERE `CUSTOMER_EMAIL`='$email';";
        $updateadmin="UPDATE `admin_master` SET `ADMIN_PASSWORD`='$cpassword' WHERE `ADMIN_EMAIL`='$email';";
        $updateshopkeeper="UPDATE `shopkeeper_master` SET `SHOPKEEPER_PASSWORD`='$cpassword' WHERE `SHOPKEEPER_EMAIL`='$email';";
    $query=mysqli_query($con,$updatecustomer);
    $queryadmin=mysqli_query($con,$updateadmin);
    $queryshopkeeper=mysqli_query($con,$updateshopkeeper);
    if($query || $queryadmin ||$updateshopkeeper){
        echo '<div class="alert alert-success" role="alert">
        Password reset successfully <a href="login.php">Log in</a>
      </div>';
      session_destroy();
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Reset Error!!
      </div>';
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  background-image: url('teahub.io-best-wallpapers-hd-21618.png');
  width: 100%;
  height: 100vh;
  
}
#form{
  position: absolute;
  top:25%;
  left:40%;
}
form{-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
border: 1px solid white;
padding: 30px 60px;
font-family: 'Patrick Hand', cursive;
color:white;
       }
    
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<div class="alert alert-success" role="alert">
       Check your email and enter the OTP!!
</div>
<div class="col-3" id="form">
    <form method="post" name="login">
    <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Your Email is</label>
          <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['html'];?>" name="email" readonly>
        <br> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">enter your OTP</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="otp" value="<?php echo $_SESSION['random'];?>" readonly>
        <br> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter new password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" name="npassword" placeholder="Enter new password" pattern=".{8,}" required>
        <br> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Confirm password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" name="cpassword"  placeholder="Enter new  password again" required>
        <br> 
        <div class="align-items-center">
        <button type="submit" name="submit" class="btn  btn-primary" id="submit">Submit</button>
    </div>
    <br>
    </form>
</div>
</body>
</html>