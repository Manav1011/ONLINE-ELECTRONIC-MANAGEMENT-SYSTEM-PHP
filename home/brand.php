<?php
 $bname=$_GET['name'];
include('dbconnect.php');
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
<div class="header table-responsive">
<table class="table">
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
              <a class="nav-link active" aria-current="page" href="/home">
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
              <button class="btn me-5" id="search" name="submit" type="submit"><i class="fas fa-search"></i></button>

            </li>
          </div>
            <li>
              <div class="nav-item cart position-fixed" id="cart">
                <a href ="../login/login.php">
                
                  <i class="fas fa-shopping-cart text-white fa-2x">  <font color="white">Cart</font></i>

                            </a>
</div>
</li>
</ul>

  </nav>
      </form>
  </div>
  <main>
 
  <table class="table mt-5">
  <thead>
    <tr>
    <th scope="col"><h1 style="font-family: 'Montserrat', sans-serif;">Smartphones</h1></th>
    <th scope="col"><h3 style="">Sort By:</h3></th>
    <form class="d-flex ms-auto" method="post">
    <div class="input-group ">
    <th scope="col"><h3 style=""> <button type="submit" name="priceasc" class="btn btn-outline-danger">Price Ascending</button></h3></th>
    <th scope="col"><h3 style=""> <button type="submit" name="pricedsc" class="btn btn-outline-danger">Price Descending</button></h3></th>
   
    </div>
  </form>
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
        while($row=mysqli_fetch_array($query)){?>
        <div class="col-3">
        <div class="container">
        <div class="card" style="width: 15rem;">
          <img src="images/productimages//<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            Features: <?php echo $row['FEATURES'];?>
    </p>
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
          </div>
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
  while($row=mysqli_fetch_array($query)){?>
  <div class="col-3">
  <div class="container">
  <div class="card" style="width: 15rem;">
    <img src="images/productimages//<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
        <br><h6>Price: <?php echo $row['PRICE'];?></h6>
      </h5>
      <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
      Features: <?php echo $row['FEATURES'];?>
</p>
      <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
      <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
    </div>
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
        while($row=mysqli_fetch_array($query)){?>
        <div class="col-3">
        <div class="container">
        <div class="card" style="width: 15rem;">
          <img src="images/productimages//<?php echo $row['IMAGE'];?>" alt="..." style="height: 7cm;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['BRAND_NAME']." ".$row['MODEL_NAME'];?>
              <br><h6>Price: <?php echo $row['PRICE'];?></h6>
            </h5>
            <p class="card-text" style="    font-family: 'Patrick Hand', cursive; font-size:small;">
            Features: <?php echo $row['FEATURES'];?>
    </p>
            <a href="../login/login.php" class="btn btn-primary">Buy Now</a>
            <a href="../login/login.php" class="btn btn-primary">Add to cart</a>
          </div>
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
</table>
</div>
</body>
</html>