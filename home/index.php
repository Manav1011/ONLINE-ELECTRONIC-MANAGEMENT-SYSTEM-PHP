<?php
include('dbconnect.php');
if(isset($_POST['submit'])){
  $search=$_POST['search'];
  header("location:searchedproduct.php?search=$search");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/017bc14cc6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="home/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
   body{
background-image: url("home/white.png");
background-repeat:inherit;


    
  }
</style>
</head>

<body onload="startcommand()">
<!--navbar-->
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
              <a class="nav-link active" aria-current="page" href="#">
              <div class="home">
                <i class="fas fa-home"></i>
              </div>
              </a>
            </li>
            <li class="nav-item me-3" id="signin">
              <a class="nav-link active" href="../login/login.php">
                <i class="fas fa-sign-in-alt"></i>
                <font color="black">Sign In</font>
              </a>
            </li>
<div class="search">
            <li class="nav-item d-flex mx-auto">

              <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn me-5" name="submit" id="search" type="submit"><i class="fas fa-search"></i></button>

            </li>
          </div>
            <li>
              <div class="nav-item cart position-fixed" id="cart">
                <a href ="../login/login.php">
                
                  <i class="fas fa-shopping-cart text-white fa-2x">  <font color="white">Cart</font></i>

                            </a>
</div>
</li>
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
        if(result=="login"){
          window.location.replace("http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/login/login.php");
        } 
      };
      recognition.onerror = function (e) {
        recognition.stop();
      };
    }
  }
</script>
</ul>
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
        <a href="home/productdetail.php?id2=<?php echo $id2?>">
        <img src="home/images/iphone.jpg" alt="" height="500px" class="d-block w-100" alt="...">  
        </a>
        <a href="../login/login.php">
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
        <a href="home/productdetail.php?id2=<?php echo $id2?>">
        <img src="home/images/image.jpg" height="500px" class="d-block w-100" alt="...">
      </a>
        <a href="../login/login.php">
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
        <a href="home/productdetail.php?id2=<?php echo $id2?>">
        <img src="home/images/vivo.png" height="500px" class="d-block w-100" alt="...">
      </a>
        <a href="../login/login.php">
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
  <br><br>
  <!--icons-->
  <div class="brands">
      <div class="owl-carousel owl-theme" id="carouesel2">
       <a href="home/brand.php?name=apple">
        <div class="item" id="1"><img src="home/images/LOGO/apple.jpg" alt=""></div>
        </a>
        <a href="home/brand.php?name=redmi">
        <div class="item" id="3"><img src="home/images/LOGO/mi.jpg" alt=""></div>
        </a>
        <a href="home/brand.php?name=realme">
        <div class="item" id="4"><img src="home/images/LOGO/realme.png" height="90px" alt=""></div>
        </a>
        <a href="home/brand.php?name=oneplus">
        <div class="item" id="5"><img src="home/images/LOGO/oneplus.jpg" alt=""></div>
        </a>
        <a href="home/brand.php?name=oppo">
        <div class="item" id="6"><img src="home/images/LOGO/oppo.jpg" alt=""></div>
        </a>
        <a href="home/brand.php?name=samsung">
        <div class="item" id="7"><img src="home/images/LOGO/samsung.jpg" alt=""></div>
        </a>
        <a href="home/brand.php?name=vivo">
        <div class="item" id="8"><img src="home/images/LOGO/vivo.jpg" alt=""></div>
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
  while($row3=mysqli_fetch_array($query3)){?>
        <div class="container">
        <div class="card" style="width: 15rem; height:35rem;">
          <img src="home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
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
  while($row3=mysqli_fetch_array($query3)){?>
        <div class="container">
        <div class="card" style="width: 15rem; height:35rem;">
          <img src="home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
          
          
         
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
  while($row3=mysqli_fetch_array($query3)){?>
        <div class="container">
        <div class="card" style="width: 15rem; height:35rem;">
          <img src="home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
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
  while($row3=mysqli_fetch_array($query3)){?>
        <div class="container">
        <div class="card" style="width: 15rem; height:35rem;">
          <img src="home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
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
  while($row3=mysqli_fetch_array($query3)){?>
        <div class="container">
        <div class="card" style="width: 15rem; height:35rem;">
          <img src="home/images/productimages/<?php echo $row3['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row3['BRAND_NAME']." ".$row3['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row3['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            <?php echo $row3['FEATURES'];?></p>
            <div style="position:absolute; bottom:15;">
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <?php 
  }
  ?>
      </td>
    </tr>
  </table>
  <br>
  <br>
  <div class="container" id="caption">
    <p class="font-moonspace fs-1 text-center fw-light text-dark">
  MOBILESHOP-E MANAGEMENT SYSTEM IS MANAGED BY
    </p>
</div>
  <BR></BR>
  <!--devlopers-->
<table class="devlopers" style="margin-left: auto; margin-right: auto;">
  <tr>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="home/devloper/dishant.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
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
      <img src="home/devloper/paliya.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Dhruv Paliya<br>
          Enrollment No: 196330307054<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-A<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="home/devloper/kaxak.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Kaxak Dobariya<br>
          Enrollment No: 196330307512<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-C<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="home/devloper/yuvraj.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
      <div class="card-body">
        <p class="card-text text-left" style="font-family: 'Patrick Hand', cursive;">Name: Yuvrajsinh Rana<br>
          Enrollment No: 196330307548<br>
          Institute: LJ POLYTECHNIC<br>
        Branch:  COMPUTER ENGINEERING<br>
      Class: 5-C<br></p>
      </div>
    </div></td>
    <td><div class="card" style="width: 18rem;">
      <img src="home/devloper/manav2.jpg" class="card-img-top" alt="..." style="width: 7.6cm; height: 7cm;">
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
<script src="home/index.js"></script>
</body>
</html>