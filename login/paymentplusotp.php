<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
  $cid=$_GET['cid'];
  $total=$_GET['total'];
  $orderid=$_GET['orderid'];
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
?>
<?php
if(isset($_POST['submit'])){
$search=$_POST['search'];
header("location:searchedproduct.php?search=$search&id=$id");
}?>
<?php
if(isset($_POST['notpay'])){
    $ptype=$_POST['ptype'];
    $delete="DELETE FROM `order_master` WHERE `ORDER_ID`='$orderid' AND`CUSTOMER_ID`='$cid'";
    $querydelete=mysqli_query($con,$delete);
    if($querydelete){
        header("location:emptycartfrompayment.php?cid=$cid");
    }
    else{
        die("error");
    }
}
if(isset($_POST['pay'])){
    $otp=$_SESSION['randomotp'];
    $otp1=$_POST['otp'];
    if($otp1==$otp){
    $ptype=$_POST['ptype'];
    $insert="INSERT INTO `payment_master`(`PAYMENT_ID`, `CUSTOMER_ID`,`ORDER_ID`, `PAYMENT_TYPE`, `PAYABLE_AMOUNT`, `DATETIME`) VALUES ('','$cid','$orderid','$ptype','$total',current_timestamp())";
    $query=mysqli_query($con,$insert);
    if($query){
        $delete="DELETE FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";$sselect="SELECT * FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";
    $squery=mysqli_query($con,$sselect);
    while($srow=mysqli_fetch_array($squery)){
        $cartid1=$srow['CART_ID'];
        $pid1=$srow['PRODUCT_ID'];
        $quantity1=$srow['QUANTITY'];
    $insert1="INSERT INTO `cart_archive_master`(`CART_ID`, `PRODUCT_ID`, `CUSTOMER_ID`, `QUANTITY`, `DATE`) VALUES ('$cartid1','$pid1','$cid','$quantity1',current_timestamp())";
    $query1=mysqli_query($con,$insert1);
        mysqli_query($con,$delete);
        header("location:welcome.php?id=$cid");
    }
}
    else{
        die("error");
    }
}
else{
    echo '<script> alert("Invalid otp");</script>';
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/017bc14cc6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <title>Document</title>
    <style>
        body {
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold
}

.title {
    margin-bottom: 5vh
}

.card2 {
    margin:auto;
    width: 50%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px) {
    .card {
        margin: 3vh auto
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65)
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem
    }
}

.summary .col-2 {
    padding: 0
}

.summary .col-10 {
    padding: 0
}

.row {
    margin: 0
}

.title b {
    font-size: 1.5rem
}

.main {
    margin: 0;
    padding: 2vh 0;
    width: 100%
}

.col-2,
.col {
    padding: 0 1vh
}

a {
    padding: 0 1vh
}

.close {
    margin-left: auto;
    font-size: 0.7rem
}

img {
    width: 3.5rem
}

.back-to-shop {
    margin-top: 4.5rem
}

h5 {
    margin-top: 4vh
}

hr {
    margin-top: 1.25rem
}

form {
    padding: 2vh 0
}

select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

#input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

#input:focus::-webkit-input-placeholder {
    color: transparent
}

#btn{
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0
}

#btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

#btn:hover {
    color: white
}

a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}
..dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content{
  display: none;
  position: fixed;
  top:50;
  right:0px;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 15px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -9px; 
    margin-top: -8px; 
    
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>
<body onload="onTimer();">
<div class="header">
    <form action="" method="post">
    <nav class="navbar navbar-expand-xl navbar-expand-sm  navbar-dark   justify-content-end fixed-top" style=" background-image: linear-gradient(to right, #16222a, #3a6073);">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-white"><span style="font-family: 'Mochiy Pop P One', sans-serif;">mobileshop-e</span></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item me-2" id="home" style="position:absolute;left:15cm; height:35px;">
              <a class="nav-link active" aria-current="page" href="welcome.php?id=<?php echo $cid?>">
              <div class="home">
                <i class="fas fa-home"></i>
              </div>
              </a>
            </li>
            <li class="nav-item " id="signin" style="position:absolute;left:16cm; ">
              <a class="nav-link active" href="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/logout.php"  onclick="return confirm('Do you want to logout?');">
                <i class="fas fa-sign-in-alt"></i>
                <font color="black">Log out</font>
              </a>
            </li>
<div class="search">
            <li class="nav-item d-flex mx-auto">

              <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn me-5" name="submit" id="search" type="submit"><i class="fas fa-search"></i></button>

            </li>
          </div>
          
</ul>
<div class="dropdown">
  <button class="dropbtn btn btn-outline-light me-0" > 
              <span><i class="bi bi-person-workspace"><span><?php echo " ".$_SESSION['username']; ?> </span></i></span>
            </button>
            <div class="dropdown-content">
            <div class="card text-white bg-dark" style="width: 18rem; border:2px solid white;
  text-align:center;">
            <div class="card-header">Profile</div>
            <div class="card-body">
           <?php 
        $select1="SELECT * FROM `customer_master` WHERE `CUSTOMER_ID`='$cid'";
      $query1=mysqli_query($con,$select1);
      $num1=mysqli_num_rows($query1);
     if($num1>0){
          while($row=mysqli_fetch_array($query1)){
            $adress=$row['ADDRESS'];
?>
USERNAME: <?php echo $row['CUSTOMER_USERNAME'];?><BR>
EMAIL: <?php echo $row['CUSTOMER_EMAIL'];?><BR>
FIRST NAME: <?php echo $row['FIRST_NAME'];?><BR>
LAST NAME: <?php echo $row['LAST_NAME'];?><BR>
GENDER: <?php echo $row['GENDER'];?><BR>
DOB: <?php echo $row['DOB'];?><BR>
ADDRESS: <?php echo $row['ADDRESS'];?><BR>
CONTACT: <?php echo $row['CONTACT'];?>
         <?php }
        }?>
 <br><br><button class="btn btn-primary"> <a href="changeprofile.php?id=<?php echo $id;?>" class="text-white"style="text-decoration:none;">Edit profile</a></button>
</div>
      </div>
  </div>
</div>

        </ul>
      </div>
  </div>
  </nav>
  </form>
  </div>
  </div>
  <div class="card card2" id="card2">
  <?php
$select="SELECT * FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";
$query=mysqli_query($con,$select);
$num=mysqli_num_rows($query);
$total=0;
while($row=mysqli_fetch_array($query)){
$productid=$row['PRODUCT_ID'];
$quantity=$row['QUANTITY'];
$select1="select * from `product_master` WHERE `PRODUCT_ID`='$productid'";
$query1=mysqli_query($con,$select1);
while($row1=mysqli_fetch_array($query1)){
$pid=$row1['PRODUCT_ID'];
$quantity=$row1['QUANTITY'];
$image=$row1['IMAGE'];
$bname=$row1['BRAND_NAME'];
$mname=$row1['MODEL_NAME'];
$price=$row1['PRICE'];
$total=$total+$price;
}}
?>
<div class="col-md-12 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS <?php echo $num;?></div>
                <div class="col text-right"><?php echo $total?> Rs.</div>
            </div>
            <form id="form" method="post">
   <select  name="ptype">
                    <option class="text-muted" value="Cash on delivery">Payment Type- Cash on delivery</option>
                </select>
               
           
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right"><?php echo $total?> Rs.</div>
</div>
<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div>ENTER OTP</div>
    <input type="text" class="form-control" name="otp" pattern="[0-9]{6}" required>
    <div id="emailHelp" class="form-text"><b>never share your otp with anyone else</b></div>
    <div class="alert alert-danger row" role="alert">
 <p>Enter your otp in: <b id="mycounter"></b></p>
</div>
            </div><button type="submit" name="pay" class="btn" id="btn">CONTINUE</button>
            <button type="submit" name="notpay" class="btn" id="btn" onclick="return  confirm('Do you want to cancel this order?');">CANCEL</button>
        </div>
    </div>
</div>
</form>

<script>
i = 60;
function onTimer() {
  document.getElementById('mycounter').innerHTML = i;
  i--;
  if (i < 0) {
    window.location.href = "payment.php?cid=<?php echo $cid;?>&total=<?php echo $total;?>&orderid=<?php echo $orderid;?>";
  }
  else {
    setTimeout(onTimer, 100);
  }
}
</script>
</body>
</html>
