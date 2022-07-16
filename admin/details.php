<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$id= $_GET['id'];
$dselect="select * from customer_master where CUSTOMER_ID='$id';";
$qselect=mysqli_query($con,$dselect);
$number=mysqli_num_rows($qselect);
if($number>0){
   $row=mysqli_fetch_array($qselect);
   echo '<div class="card text-center text-dark bg-light mb-3 col-md-3 border-primary mt-5">
   <div class="card-header">Header</div>
   <div class="card-body">
   <h6 class="card-title">'.$row['CUSTOMER_USERNAME'].'</h6>
   <h6 class="card-title">'.$row['CUSTOMER_EMAIL'].'</h6>
   <h6 class="card-title">'.$row['CUSTOMER_PASSWORD'].'</h6>
   <h6 class="card-title">'.$row['FIRST_NAME'].'</h6>
   <h6 class="card-title">'.$row['LAST_NAME'].'</h6>
   <h6 class="card-title">'.$row['GENDER'].'</h6>
   <h6 class="card-title">'.$row['DOB'].'</h6>
   <h6 class="card-title">'.$row['ADDRESS'].'</h6>
   <h6 class="card-title">'.$row['CITY'].'</h6>
   <h6 class="card-title">'.$row['STATE'].'</h6>
   <h6 class="card-title">'.$row['COUNTRY'].'</h6>
   <h6 class="card-title">'.$row['PIN'].'</h6>
   <h6 class="card-title">'.$row['CONTACT'].'</h6>
   <a href="users.php" class="btn btn-primary">Go Back</a>
   </div>
 </div>';
 

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .card {
            top:5cm;
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}

    </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--icons cdn-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="shopkeeper.css">
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <!--offcanvas trigger-->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--offcanvas trigger-->
      <a class="navbar-brand fw-bold text-uppercase" href="shopkeeper.php">O.E.M.S</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">


        </ul>
      </div>
    </div>
  </nav>
  <!--off canvas-->


  <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <LI>
            <div class="fw-bold px-3 mt-3">
              <span><i class="bi bi-person-workspace"><span class="ms-3"><?php echo " ".$_SESSION['username'];?></span></i></span>
            </div>
         <li>
        </ul>
      </nav>
    </div>
  </div>
  <!--Main-->
  <main>

  </main>
</body>

</html>