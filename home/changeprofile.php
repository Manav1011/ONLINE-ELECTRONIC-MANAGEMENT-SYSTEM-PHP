<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$id=$_GET['id'];
if(isset($_POST['submit'])){
$username=$_POST['username'];
    $email1=$_POST['email'];
    $ppassword=$_POST['ppassword'];
    $npassword=$_POST['npassword'];
    $cpassword=$_POST['cpassword'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $select1="SELECT * FROM `customer_master` WHERE `CUSTOMER_ID`='$id'";
$query1=mysqli_query($con,$select1);
$num1=mysqli_num_rows($query1);
if($num1>0){
    while($row=mysqli_fetch_array($query1)){
    if($ppassword!=$row['CUSTOMER_PASSWORD']){
      echo'<script>
       window.alert("Enter a different password");
       </script>';
    }
   elseif($npassword==$ppassword){
    echo'<script>
    window.alert("Passwords are the same");
    </script>';
   }
   elseif($cpassword!=$npassword){
    echo'<script>
    window.alert("Passwords do not match");
    </script>';
   }
    else{
    $update="UPDATE `customer_master` SET `CUSTOMER_USERNAME`='$username',`CUSTOMER_EMAIL`='$email1',`CUSTOMER_PASSWORD`='$npassword',`FIRST_NAME`='$fname',`LAST_NAME`='$lname',`GENDER`='$gender',`DOB`='$dob',`ADDRESS`='$address',`CONTACT`='$contact' WHERE `CUSTOMER_ID`='$id'";
   if ($query=mysqli_query($con,$update)){
       echo'<script>
       window.alert("Updated");
       </script>';
       
   }
   else{
     echo '<script>
     window.alert("not updated");
     </script>';
   }
  }
    }
  }
}
?>
<html>
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
      body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

    </style>
  </head>
<body>
  <!--navbar-->
  <div class="header">
    <nav class="navbar navbar-expand-xl navbar-expand-sm  navbar-dark bg-dark text-white  justify-content-end fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">O.E.M.S</a>
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
              <a class="nav-link active" href="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/logout.php" onclick="return confirm('Do you want to logout?');">
                <i class="fas fa-sign-in-alt"></i>
                <font color="black">Log out</font>
              </a>
            </li>
<div class="search">
            <li class="nav-item d-flex mx-auto">

              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn me-5" id="search" type="submit"><i class="fas fa-search"></i></button>

            </li>
          </div>
            <li>
              <div class="nav-item cart" id="cart">
                <a href "#">
                
                  <i class="fas fa-shopping-cart fa-2x text-white">  <font color="white">Cart</font></i>

                            </a>
</div>
            </li>
        </div>
        </ul>
         
      </div>
  </div>
  </nav>
  </div>
  <!--navbar-->
  <?php 
        $select1="SELECT * FROM `customer_master` WHERE `CUSTOMER_ID`='$id'";
      $query1=mysqli_query($con,$select1);
      $num1=mysqli_num_rows($query1);
     if($num1>0){
          while($row=mysqli_fetch_array($query1)){
?>
<div class="container mt-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
        <img src="person.jpg" width=100px height=100px alt="">
				</div>
				<h5 class="user-name"><?php echo $row['CUSTOMER_USERNAME'];?></h5>
				<h6 class="user-email"><?php echo $row['CUSTOMER_EMAIL'];?></h6>
			</div>
		
		</div>
	</div>
</div>
</div>

       
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<form action="" method="post">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
     
				<div class="form-group">
					<label for="fullName">Username</label>
					<input type="text" class="form-control" id="fullName" name="username" value="<?php echo $row['CUSTOMER_USERNAME'];?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" name="email" value="<?php echo $row['CUSTOMER_EMAIL'];?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Previous Password</label>
					<input type="password" class="form-control" id="phone"  name="ppassword" required>
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">New Password</label>
					<input type="password" class="form-control" id="phone"  name="npassword" placeholder="enter new password...">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Confirm Password</label>
					<input type="password" class="form-control" id="phone"  name="cpassword" placeholder="enter new password again...">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">First Name</label>
					<input type="name" class="form-control" name="fname" id="ciTy" value="<?php echo $row['FIRST_NAME'];?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">Last Name</label>
					<input type="text" class="form-control" id="sTate" name="lname" value="<?php echo $row['LAST_NAME'];?>">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Contact</label>
					<input type="text" class="form-control" id="phone"  name="contact" value="<?php echo $row['CONTACT'];?>" pattern="[789][0-9]{9}">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
      <br><label for="validationDefault03" class="form-label">Date Of Birth</label>
      <input type="date" class="form-control" id="validationDefault03" name="dob" max="2005-12-26" value="<?php echo $row['DOB'];?>">
          </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<br><label for="website">Gender</label><br>
          <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" required>
        <label class="form-check-label">
          Male
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" required>
        <label class="form-check-label">
          Female
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="other" id="flexRadioDefault2" required>
        <label class="form-check-label">
          Other
        </label>
      </div>
    </div>
				</div>
			</div>
		</div>
		<div class="row gutters">
			
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
        <label for="validationDefault03" class="form-label">Address</label>
        <textarea class="form-control" name="address" aria-label="With textarea"><?php echo $row['ADDRESS'];?></textarea>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-center">
					<br> <a href="welcome.php" style="text-decoration:none;"><button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button></a>
					<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button><br><br>
				</div>
			</div>
      </form>
		</div>
	</div>
</div>
</div>

</div>
</div>
<?php
          }
        }
        ?>
</body>
</html>