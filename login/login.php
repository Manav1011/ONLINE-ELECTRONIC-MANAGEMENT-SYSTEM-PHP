<?php
 include('../dbconnect.php');
$login=false;
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $username=$_POST['username'];
 
 if($sql="select * from admin_master where ADMIN_EMAIL='$email' AND ADMIN_PASSWORD='$password'"){
    $result=mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);
  if($num == 1){
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    header("location:admin/admin.php");
  }
  if($login){
    echo '<div class="alert alert-success" role="alert">
    You are successfully Logged In:)
  </div>';
  }
  else if($sql="select * from customer_master where CUSTOMER_EMAIL='$email' AND CUSTOMER_PASSWORD='$password' AND CUSTOMER_USERNAME='$username'"){
    $result=mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);
  while($row=mysqli_fetch_array($result)){
        $a=$row['CUSTOMER_ID'];
  }
  if($num == 1){
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
   //$_SESSION['id']=$row['CUSTOMER_ID'];
    header("location:welcome.php?id=$a");
  }
  if($login){
    echo '<div class="alert alert-success" role="alert">
    You are successfully Logged:)
  </div>';
  }
  else if($sql="select * from shopkeeper_master where SHOPKEEPER_EMAIL='$email' AND SHOPKEEPER_PASSWORD='$password'"){
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num == 1){
      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location:shopkeeper/shopkeeper.php");
    }
    
    }
    if($login){
      echo '<div class="alert alert-success" role="alert">
      You are successfully Logged:)
    </div>';
    }
    else{
      echo '<div class="alert alert-danger" role="alert">
      Invalid credentials!!
    </div>';
  }
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
<div class="col-3" id="form">
    <form method="post" name="login" onsubmit="return validation()">
    <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Username...." name="username" required>
        <br> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address:</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email...." name="email" required>
        <br>        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password:</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password..." name="password" required>
          <span id="passwordHelpInline" class="form-text">
            At least 8 characters long.
          </span>
        </div>
        <div class="align-items-center">
        <button type="submit" name="submit" class="btn  btn-primary" id="submit">Login</button>
    </div>
    <br>
    <div class="col-9">
        <p>Dont have an account yet?<a href="\ONLINE ELECTRONIC MANAGEMENT SYSTEM\signup\signup.php">Sign up for FREE</a></p>
    </div> 
    <div class="col-9">
        <a href="forgotpassword.php">Forgot password?</a></p>
    </div> 
    </form>
</div>
<script>
  function validation(){
    var email=document.forms["login"]["email"];
    var password=document.forms["login"]["password"];
    if(password.value.length<8){
      window.alert("password must be atleast 8 characters long");
                  password.focus();
                  return false;
    }
  }
</script>
</body>
</html>