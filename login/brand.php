<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
 $id=$_GET['id2'];
 $bname=$_GET['name'];
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
?>
<?php
if(isset($_POST['submit'])){
$search=$_POST['search'];
header("location:searchedproduct.php?search=$search&id=$id");
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
      :root{
    --offcanvas-width: 250px;
}
.sidebar-nav{
    width: var(--offcanvas-width);
}
@media(min-width:992px){
.sidebar-nav{
    transform: none;
    visibility: visible !important;
    top: 56px;
}
main{
    margin-left: var(--offcanvas-width);
}
}
.offcanvas-backdrop::before{
    display: none;
}
      .cart{
        position:fixed;
        top:1%;
        left:70%;
      }
      .badge {
        position:fixed;
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
.speech img {
    position:fixed;
    top:1.1%;
    left:58.5%;
    width: 40px;
  }
  .speech1{
    position:fixed;
    top:1.1%;
    left:80%;
  }
  section.range-slider {
    width: 200px;
    height: 35px;
}

section.range-slider input {
    pointer-events: none;
    position: absolute;
    left:2%;
    overflow: hidden;
    width: 200px;
    outline: none;
    height: 18px;
    margin: 0;
    padding: 0;
}

section.range-slider input::-webkit-slider-thumb {
    pointer-events: all;
    
    z-index: 1;
    outline: 0;
}

section.range-slider input::-moz-range-thumb {
    pointer-events: all;
  
    z-index: 10;
    -moz-appearance: none;
    width: 2px;
}

section.range-slider input::-moz-range-track {
  
    z-index: -1;
    background-color:blue;
    border: 0;
}
section.range-slider input:last-of-type::-moz-range-track {
    -moz-appearance: none;
    background: none transparent;
    border: 0;
}
  section.range-slider input[type=range]::-moz-focus-outer {
  border: 0;
}
    </style>
</head>
<body onload="startcommand()"> 
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
              <a class="nav-link active" aria-current="page" href="welcome.php?id=<?php echo $id?>">
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
            <form method="get">
              <input class="form-control me-2" id="transcript" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn me-5" name="submit" id="search" type="submit"><i class="fas fa-search"></i></button>

  <div class="speech">
    <img onclick="startDictation()" src="https://i.imgur.com/cHidSVu.gif" />
  </div>
</form>

<script>
  function startDictation() {
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;
      recognition.lang = 'en-US';
      recognition.start();

      recognition.onresult = function (e) {
        var value = e.results[0][0].transcript;;
        var regex = /[.]/g;
        var result = value.replace(regex, '');
 document.getElementById('transcript').value =result;
        recognition.stop();
        document.getElementById('search').click();
      };
      recognition.onerror = function (e) {
        recognition.stop();
      };
    }
  }
</script>
            <li>
              <div class="nav-item cart" id="cart">
                <a href="cart.php?cid=<?php echo $id;?>">
                
                  <i class="fas fa-shopping-cart text-white fa-2x"> 
                  <?php
                    $select="select * from `cart_master` WHERE `CUSTOMER_ID`='$id'";
                    $query=mysqli_query($con,$select);
                    $num=mysqli_num_rows($query);
                    ?>
                  <span class='badge badge-warning' id='lblCartCount'> <?php echo $num?> </span> <font color="white">Cart</font></i>

                            </a>
</div>
</li>
</ul>  
  <div class="speech1">
    <img onclick="startcommand()" src="microphone.jpg"  class="border border-white rounded-circle" width="50px" height="40px"/>
  </div>
  <script>
  function startcommand() {
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;
      recognition.lang = 'en-US';
      recognition.start();

      recognition.onresult = function (e) {
        var value = e.results[0][0].transcript;;
        var regex = /[.]/g;
        var result = value.replace(regex, '');
        recognition.stop();
        if(result=="open card"){
          window.location.replace("cart.php?cid=<?php echo $id;?>");
        }
        if(result=="go to home"){
          window.location.replace("welcome.php?id=<?php echo $id?>");
        }
        if(result=="go back"){
          window.history.back();
        }
        if(result=="log out"){
          window.location.replace("http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/logout.php");
        }
        
      };
      recognition.onerror = function (e) {
        recognition.stop();
      };
    }
  }
</script>
<div class="dropdown">
  <button class="dropbtn btn btn-outline-light me-0" > 
              <span><i class="bi bi-person-workspace"><span><?php echo " ".$_SESSION['username']; ?> </span></i></span>
            </button>
            <div class="dropdown-content">
            <div class="card text-white bg-dark" style="width: 18rem;">
            <div class="card-header">Profile</div>
            <div class="card-body">
           <?php 
        $select1="SELECT * FROM `customer_master` WHERE `CUSTOMER_ID`='$id'";
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
  <main>
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <LI>
            <div class="fw-bold px-3 mt-5">
            <span style="font-size:20px;">Filter Products</span>
            </div>
          </LI>
          <LI class="px-3 my-3">
            <a class="btn text-muted small fw-bold text-white w-100 mt-5" data-bs-toggle="collapse" href="#collapseExample"
              role="button" aria-expanded="false" aria-controls="collapseExample">
              <span>BY PRICE</span>
              <span><i class="bi bi-arrow-bar-down ms-2"></i>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <div class="card card-body bg-dark text-white" style="height: 18rem;">
              <form class="d-flex ms-auto" method="post">
    <div class="input-group ">
   <button type="submit" name="priceasc" class="btn btn-outline-secondary w-100">Ascending</button>
     <button type="submit" name="pricedsc" class="btn btn-outline-secondary w-100">Descending</button>
   
    </div>
  </form>
  <section class="range-slider">
  <input value="40000" min="15000" max="130000" type="range">
  <input value="80000" min="15000" max="130000" type="range">
</section>
<form action="" method="post">
<div class="row">
  <div class="col">
<label>Min price</label>
      </div>
      <div class="col">
<label>Max price</label>
      </div>
      </div>
      <div class="row">
      <div class="col">
<input type="text" class="form-control w-100" aria-describedby="passwordHelpBlock" id="minvalue" name="minvalue">
      </div>
      <div class="col">
<input type="text" class="form-control w-100" aria-describedby="passwordHelpBlock" id="maxvalue" name="maxvalue">
      </div>
      <button type="submit" name="show" class="btn btn-outline-danger mt-3 mb-0">Show</button>
      </form>
      </div>
      <script>
function getVals(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  document.getElementById("minvalue").value=slide1;
  document.getElementById("maxvalue").value=slide2;
}

window.onload = function(){
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
      for( var x = 0; x < sliderSections.length; x++ ){
        var sliders = sliderSections[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}
</script>
              </div>
          </LI>
        </ul>
      </nav>
    </div>
  </div>
  <table class="table mt-5">
  <thead>
    <tr>
    <th scope="col"><h1 style="font-family: 'Montserrat', sans-serif; margin-left:auto; margin-right:auto;">Available Smartphones</h1></th>

    
    </tr>
  </thead>
    </table>
<div class="row">
  
    <?php
    if(isset($_POST['priceasc'])){
        $price=$_POST['priceasc'];
        $select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname' ORDER BY `PRICE` ASC;";
    //$select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname'";
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
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/shopkeeper/productimages/<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            Features: <?php echo $row['FEATURES'];?>
    </p>
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocartfrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocomparefrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>&bname=<?php echo $bname;?>" method="post">
                        
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare5" style="width:100%;">Add to compare</button>
                        </form>
          </div>
          </a>
        </div>
      </div>
        </div>
       
<?php
        }
    }
}
else if(isset($_POST['pricedsc'])){
  $price=$_POST['pricedsc'];
  $select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname' ORDER BY `PRICE` DESC;";
//$select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname'";
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
  <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
    <img src="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/shopkeeper/productimages/<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
        <br><h6>Price: <?php echo $row['PRICE'];?></h6>
      </h5>
      <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
      Features: <?php echo $row['FEATURES'];?>
</p>
      <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
      <a href="addtocartfrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
     
     <br><br>
     <form action="addtocomparefrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>&bname=<?php echo $bname;?>" method="post">
                        
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare5" style="width:100%;">Add to compare</button>
                        </form>
    </div>
  </a>
  </div>
</div>
  </div>
 
<?php
  }
}
}
else if(isset($_POST['show'])){
  $minvalue=$_POST['minvalue'];
  $maxvalue=$_POST['maxvalue'];
  $select="SELECT * FROM product_master WHERE PRICE BETWEEN '$minvalue' AND '$maxvalue' AND BRAND_NAME IN('$bname');";
//$select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname'";
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
  <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
    <img src="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/shopkeeper/productimages/<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
        <br><h6>Price: <?php echo $row['PRICE'];?></h6>
      </h5>
      <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
      Features: <?php echo $row['FEATURES'];?>
</p>
      <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
      <a href="addtocartfrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
     
     <br><br>
     <form action="addtocomparefrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>&bname=<?php echo $bname;?>" method="post">
                        
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare5" style="width:100%;">Add to compare</button>
                        </form>
    </div>
  </a>
  </div>
</div>
  </div>
<?php
  }
}
}
else{
    $select="SELECT * FROM `product_master` WHERE `BRAND_NAME`='$bname'";
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
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/shopkeeper/productimages/<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            Features: <?php echo $row['FEATURES'];?>
    </p>
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocartfrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocomparefrombrand.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>&bname=<?php echo $bname;?>" method="post">
                      
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare5" style="width:100%;">Add to compare</button>
                        </form>
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
      <div style="position:fixed;  bottom:20; right:25;">
<?php
$selectcompare="SELECT * FROM `compare_master` WHERE `CUSTOMER_ID`='$id'";
$querycompare=mysqli_query($con,$selectcompare);
$numcompare=mysqli_num_rows($querycompare);
?>
  <a href="compare.php?cid=<?php echo $id;?>"><button type="button" class="btn btn-danger" style=" font-size:25px; border-radius:20px;">Compare  <div class="badge bg-dark text-wrap" style="width: 3rem;"><?php global $numcompare; echo $numcompare;  ?></div></button></a>
  </div>
</body>
</html>