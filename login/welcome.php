<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
  $id=$_GET['id'];
include('../dbconnect.php');
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
  <title>Welcome <?php echo$_SESSION['username'];?></title>
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
  body{
background-image: url("10.jpg");
background-repeat:inherit;
  }
  .speech img {
    position:fixed;
    top:1.1%;
    left:58.5%;
    width: 40px;
  }

.dropdown {
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
.card{
  border:2px solid white;
  text-align:center;
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
    font-size: 20px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
    margin-top: -8px; 
    
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
.speech1{
    position:fixed;
    top:1.1%;
    left:80%;
  }
</style>
</head>
<body onload="startcommand()">
<!--navbar-->
  <div class="header">
    <form id="search1" action="" method="post">
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
              <a class="nav-link active" aria-current="page" href="#">
              <div class="home">
                <i class="fas fa-home"></i>
              </div>
              </a>
            </li>
            <li class="nav-item me-3" id="signin">
              <a class="nav-link active" href="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM//home/LOGOut.php"  onclick="return confirm('Do you want to /home/LOGOut?');">
                <i class="fas fa-sign-in-alt"></i>
                <font color="black">Log out</font>
              </a>
            </li>
<div class="search">
            <li class="nav-item d-flex mx-auto">
            <form method="get" id="search12">
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
        document.getElementById("search").click();
      };
      recognition.onerror = function (e) {
        recognition.stop();
      };
    }
  }
</script>
            </li>
          </div>
            <li>
              <div class="nav-item cart position-fixed" id="cart">
                <a href="cart.php?cid=<?php echo $id;?>">
                
                  <i class="fas fa-shopping-cart text-white fa-2x"> 
                    <?php
                    $select="select * from `cart_master` WHERE `CUSTOMER_ID`='$id'";
                    $query=mysqli_query($con,$select);
                    $num=mysqli_num_rows($query);
                    ?>
                  <span class='badge badge-warning' id='lblCartCount'> <?php echo $num?> </span>
                   <font color="white">Cart</font></i>

                            </a>
</div>
</li>
</ul>
<div class="speech1">
    <img onclick="startcommand()" src="/home/images/microphone.jpg"  class="border border-white rounded-circle" width="50px" height="40px"/>
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
  
        if(result=="go back"){
          window.history.back();
        }
        if(result=="log out"){
          window.location.replace("http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM//home/LOGOut.php");
        }
        if(result=="show my orders"){
          window.location.replace("myorders.php?cid=<?php echo $id;?>");
        }
        if(result=="edit profile"){
          window.location.replace("changeprofile.php?id=<?php echo $id;?>");
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
 <button class="btn btn-primary"> <a href="myorders.php?cid=<?php echo $id;?>" class="text-white"style="text-decoration:none;">Orders</a></button>
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

  <!--banner-->
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php 
        $select2="SELECT * FROM `product_master` WHERE `MODEL_NAME`='iphone 13 pro max'";
        $query2=mysqli_query($con,$select2);
        while($row2=mysqli_fetch_array($query2)){
          $id2=$row2['PRODUCT_ID'];
        }?>
        <a href="productdetail.php?id2=<?php echo $id2?>&id=<?php echo $id;?>">
        <img src="/home/images/iphone.jpg" alt="" height="500px" class="d-block w-100" alt="...">  
        </a>
        <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $id2;?>">
        <div class="top-left btn btn-light" style="font-family: 'Patrick Hand', cursive;">
          Buy Now
        </div>
      </a>
      </div>
      <div class="carousel-item">
      <?php 
        $select2="SELECT * FROM `product_master` WHERE `MODEL_NAME`='Samsung Galaxy Z Fold 3'";
        $query2=mysqli_query($con,$select2);
        while($row2=mysqli_fetch_array($query2)){
          $id2=$row2['PRODUCT_ID'];
        }?>
        <a href="productdetail.php?id2=<?php echo $id2?>&id=<?php echo $id;?>">
        <img src="/home/images/image.jpg" height="500px" class="d-block w-100" alt="...">
      </a>
        <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $id2;?>">
          <div class="top-right btn btn-primary" style="font-family: 'Patrick Hand', cursive;">
            Buy Now
          </div>
      </div>
      <div class="carousel-item">
      <?php 
        $select2="SELECT * FROM `product_master` WHERE `MODEL_NAME`='x70 pro'";
        $query2=mysqli_query($con,$select2);
        while($row2=mysqli_fetch_array($query2)){
          $id2=$row2['PRODUCT_ID'];
        }?>
        <a href="productdetail.php?id2=<?php echo $id2?>&id=<?php echo $id;?>">
        <img src="/home/images/vivo.png" height="500px" class="d-block w-100" alt="...">
      </a>
      <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $id2;?>">
        <div class="bottom-left btn btn-primary" style="font-family: 'Patrick Hand', cursive;">
          Buy Now
        </div>
      </a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--icons-->
      <div class="brands">
      <div class="owl-carousel owl-theme" id="carouesel2">
       <a href="brand.php?name=apple&id2=<?php echo $id;?>">
        <div class="item" id="1"><img src="/home/LOGO/apple.jpg" alt=""></div>
        </a>
        <a href="brand.php?name=redmi&id2=<?php echo $id;?>">
        <div class="item" id="3"><img src="/home/LOGO/mi.jpg" alt=""></div>
        </a>
        <a href="brand.php?name=realme&id2=<?php echo $id;?>">
        <div class="item" id="4"><img src="/home/LOGO/realme.png" height="90px" alt=""></div>
        </a>
        <a href="brand.php?name=oneplus&id2=<?php echo $id;?>">
        <div class="item" id="5"><img src="/home/LOGO/oneplus.jpg" alt=""></div>
        </a>
        <a href="brand.php?name=oppo&id2=<?php echo $id;?>">
        <div class="item" id="6"><img src="/home/LOGO/oppo.jpg" alt=""></div>
        </a>
        <a href="brand.php?name=samsung&id2=<?php echo $id;?>">
        <div class="item" id="7"><img src="/home/LOGO/samsung.jpg" alt=""></div>
        </a>
        <a href="brand.php?name=vivo&id2=<?php echo $id;?>">
        <div class="item" id="8"><img src="/home/LOGO/vivo.jpg" alt=""></div>
        </a>
      </div>   
  </div>
  <br><br>
  <!--top-devices-->
  <table class="devices">
    <tr>
      <td>
      <?php
  $select3="SELECT * FROM `product_master` WHERE `MODEL_NAME`='iphone 13 pro max';";
  $query3=mysqli_query($con,$select3);
  while($row3=mysqli_fetch_array($query3)){
    $pid=$row3['PRODUCT_ID'];?>
        <div class="container">
        <div class="card" style="width: 15rem; height:40rem;">
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="/home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
                        <a href="addtocart.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
 <br><br>
                        <form action="addtocompare.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" method="post">
                        <?php
                        $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
  <input type="hidden" value="<?php echo $rand; ?>" name="randcheck">
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare" style="width:100%;">Add to compare</button>
                        </form>
                    
            </div>
          </div>
  </a>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
      <td>
      <?php
  $select3="SELECT * FROM `product_master` WHERE `MODEL_NAME`='samsung galaxys20 ultra';";
  $query3=mysqli_query($con,$select3);
  while($row3=mysqli_fetch_array($query3)){
    $pid=$row3['PRODUCT_ID'];?>
        <div class="container">
        <div class="card" style="width: 15rem; height:40rem;">
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="/home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocart.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocompare.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" method="post">
                        <?php
                        $rand1=rand();
   $_SESSION['rand1']=$rand1;
  ?>
  <input type="hidden" value="<?php echo $rand1; ?>" name="randcheck1">
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare1" style="width:100%;">Add to compare</button>
                        </form>
                       
          </div>
          </div>
  </a>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
      <td>
      <?php
  $select3="SELECT * FROM `product_master` WHERE `MODEL_NAME`='x70 pro';";
  $query3=mysqli_query($con,$select3);
  while($row3=mysqli_fetch_array($query3)){
    $pid=$row3['PRODUCT_ID'];?>
        <div class="container">
        <div class="card" style="width: 15rem; height:40rem;">
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="/home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocart.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocompare.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" method="post">
                        <?php
                        $rand2=rand();
   $_SESSION['rand2']=$rand2;
  ?>
  <input type="hidden" value="<?php echo $rand2; ?>" name="randcheck2">
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare2" style="width:100%;">Add to compare</button>
                        </form>
                       
          </div>
          </div>
  </a>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
      <td>
      <?php
  $select3="SELECT * FROM `product_master` WHERE `MODEL_NAME`='iPhone 12 Pro Max ';";
  $query3=mysqli_query($con,$select3);
  while($row3=mysqli_fetch_array($query3)){
    $pid=$row3['PRODUCT_ID'];?>
        <div class="container">
        <div class="card" style="width: 15rem; height:40rem;">
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="/home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocart.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocompare.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" method="post">
                        <?php
                        $rand3=rand();
   $_SESSION['rand3']=$rand3;
  ?>
  <input type="hidden" value="<?php echo $rand3; ?>" name="randcheck3">
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare3" style="width:100%;">Add to compare</button>
                        </form>
                      
          </div>
          </div>
  </a>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
      <td>
      <?php
  $select3="SELECT * FROM `product_master` WHERE `MODEL_NAME`='Samsung Galaxy Z Fold 3';";
  $query3=mysqli_query($con,$select3);
  while($row3=mysqli_fetch_array($query3)){
    $pid=$row3['PRODUCT_ID'];?>
        <div class="container">
        <div class="card" style="width: 15rem; height:40rem;">
        <a href="productdetail.php?id=<?php echo $id?>&id2=<?php echo $pid;?>" style="text-decoration:none; color:black;">
          <img src="/home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
           
            <div style="position:absolute; bottom:15;">
            <a href="cartbybuynow.php?cid=<?php echo $id;?>&pid=<?php echo $pid;?>" class="btn btn-primary">Buy Now</a>
            <a href="addtocart.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" onclick="return confirm('Do you want to add this item to cart?');" class="btn btn-primary">Add to cart</a>
            <br><br>
            <form action="addtocompare.php?pid=<?php echo $pid;?>&cid=<?php echo $id;?>" method="post">
                        <?php
                        $rand4=rand();
   $_SESSION['rand4']=$rand4;
  ?>
  <input type="hidden" value="<?php echo $rand4; ?>" name="randcheck4">
                        <button class="btn btn-outline-primary btn-sm" type="submit" name="addtocompare4" style="width:100%;">Add to compare</button>
                        </form>
            </div>
          </div>
  </a>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
    </tr>
  </table>
  <div class="container" id="caption">
    <p class="font-moonspace fs-1 text-center fw-light text-dark">
  MOBILESHOP-E MANAGEMENT SYSTEM IS MANAGED BY
    </p>
</div>
  <BR></BR>
  <table class="devlopers" style="margin-left: auto; margin-right: auto;">
  <tr>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="devloper/dishant.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
        <div class="card-body">
          <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Dishant Gajera<br>
          Enrollment No: 1963303075025<br>
        Institute: LJ POLYTECHNIC<br>
      Branch:  COMPUTER ENGINEERING<br>
    Class: 5-A<br></p>
        </div>
      </div>
    </td>
    <td><div class="card" style="width: 18rem;">
      <img src="devloper/paliya.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Dhruv Paliya<br>
          Enrollment No: 196330307054<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-A<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="devloper/kaxak.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Kaxak Dobariya<br>
          Enrollment No: 196330307512<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-C<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="devloper/yuvraj.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Yuvrajsinh Rana<br>
          Enrollment No: 196330307548<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-C<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="devloper/manav2.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Manav Shah<br>
        Enrollment No: 196330307556<br>
      Institute: LJ POLYTECHNIQUE<br>
    Branch: COMPUTER ENGINEERING<br>
  Class: 5-C<br></p>
      </div>
    </div></td>
</tr>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="index.js"></script>
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