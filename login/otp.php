<?php
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
session_start();
if(isset($_POST['submit'])){
    $random=$_POST['otp'];
    $email=$_POST['email'];
    if($random==$_SESSION['random']){
        header("location:resetpassword.php");
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
              Invalid otp!!
            </div>';
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
<body onload="onTimer();">
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
          <input type="text" class="form-control" id="exampleInputEmail1" name="otp" pattern="[0-9]{6}" required>
        <br> 
        <div class="alert alert-danger " role="alert">
 <p>Enter your otp in: <b id="mycounter"></b></p>
</div>
        <div class="align-items-center">
        <button type="submit" name="submit" class="btn  btn-primary" id="submit">Submit</button>
    </div>
    
    <br>
    </form>
</div>
<script>
i = 60;
function onTimer() {
  document.getElementById('mycounter').innerHTML = i;
  i--;
  if (i < 0) {
    window.location.href = "forgotpassword.php";
  }
  else {
    setTimeout(onTimer, 1000);
  }
}
</script>
</body>
</html>

