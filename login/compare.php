<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
 $cid=$_GET['cid'];
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
?>
<?php
if(isset($_POST['submit'])){
$search=$_POST['search'];
header("location:searchedproduct.php?search=$search&id=$cid");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/017bc14cc6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
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
    font-size: 20px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
    margin-top: -8px; 
    
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: fixed;
  top:50;
  right:0px;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.card{
  border:2px solid white;
  text-align:center;
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
    </style>
</head>
<body>
<div class="header">
  <form action="" method="post">
    <nav class="navbar navbar-expand-xl navbar-expand-sm  navbar-dark   justify-content-end fixed-top" style=" background-image: linear-gradient(to right, #16222a, #3a6073);">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><span style="font-family: 'Mochiy Pop P One', sans-serif;">mobileshop-e</span></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item me-2" id="home">
              <a class="nav-link active" aria-current="page" href="welcome.php?id=<?php echo $cid?>">
              <div class="home">
                <i class="fas fa-home"></i>
              </div>
              </a>
            </li>
            <li class="nav-item me-3" id="signin">
              <a class="nav-link active" href="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/logout.php"  onclick="return confirm('Do you want to logout?');">
                <i class="fas fa-sign-in-alt"></i>
                <font color="black">Log out</font>
              </a>
            </li>
<div class="search">
            <li class="nav-item d-flex mx-auto">

              <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn me-5" id="search" name="submit" type="submit"><i class="fas fa-search"></i></button>

            </li>
          </div>
            <li>
              <div class="nav-item cart position-fixed" id="cart">
                <a href="cart.php?cid=<?php echo $cid;?>">
                
                  <i class="fas fa-shopping-cart text-white fa-2x"> 
                  <?php
                    $select="select * from `cart_master` WHERE `CUSTOMER_ID`='$cid'";
                    $query=mysqli_query($con,$select);
                    $num=mysqli_num_rows($query);
                    ?>
                  <span class='badge badge-warning' id='lblCartCount'> <?php echo $num?> </span> <font color="white">Cart</font></i>

                            </a>
</div>
</li>
</ul>
<div class="dropdown">
  <button class="dropbtn btn btn-outline-light me-0" > 
              <span><i class="bi bi-person-workspace"><span><?php echo " ".$_SESSION['username']; ?> </span></i></span>
            </button>
            <div class="dropdown-content">
            <div class="card text-white bg-dark" style="width: 18rem;">
            <div class="card-header">Profile</div>
            <div class="card-body">
           <?php 
        $select1="SELECT * FROM `customer_master` WHERE `CUSTOMER_ID`='$cid'";
      $query1=mysqli_query($con,$select1);
      $num1=mysqli_num_rows($query1);
     if($num1>0){
          while($row=mysqli_fetch_array($query1)){
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
 <br><br><button class="btn btn-primary"> <a href="changeprofile.php?id=<?php echo $cid;?>" class="text-white"style="text-decoration:none;">Edit profile</a></button>
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
  <main style="margin-top:5%;">
<div class="row">
   <?php
   $selectcomp="SELECT * FROM `compare_master` WHERE `CUSTOMER_ID`='$cid'";
   $querycomp=mysqli_query($con,$selectcomp);
   while($row=mysqli_fetch_array($querycomp)){
       $cidcomp=$row['CUSTOMER_ID'];
       $pidcomp=$row['PRODUCT_ID'];
       $cmpid=$row['COMPARE_ID'];
    $select="SELECT * FROM `product_master` WHERE `PRODUCT_ID`='$pidcomp'";
    $query=mysqli_query($con,$select);
    $num=mysqli_num_rows($query);
    if($num==0){
        echo'<div class="alert alert-danger" role="alert">
        None of the smartphones are available
      </div> ';
    }
    else{
        while($row=mysqli_fetch_array($query)){
          $pid=$row['PRODUCT_ID'];?>
        <div class="col-3">
        <div class="container">
        <div class="card" style="width: 15rem;">
        <a href="productdetail.php?id=<?php echo $cid?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/shopkeeper/productimages/<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            Features: <?php echo $row['FEATURES'];?>
    </p>
            <a href="cartbybuynow.php?cid=<?php echo $cid;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocartfrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $cid;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <a href="removefromcompare.php?cmpid=<?php echo $cmpid;?>&cid=<?php echo $cid;?>" onclick="return confirm('Do you want to  remove this product?');" class="btn btn-primary" style="margin-top:5px;">Remove Product</a>
        </div>
        </a>
        </div>
      </div>
        </div>
       
<?php
        }
    }
}
    ?>
    </div>
    </main>
</body>
</html>