<?php
 include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
  <link rel="stylesheet" href="admin.css">
  <style>
    body{
      background-image:url("7.jpg");
    
      background-size:100% 100%;
      background-repeat:no-repeat;
    }
  </style>
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
      <a class="navbar-brand fw-bold text-uppercase" href="admin.php">O.E.M.S</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item me-3" id="signin">
              <a class="nav-link active" href="http://localhost/ONLINE%20ELECTRONIC%20MANAGEMENT%20SYSTEM/logout.php">
             
              <button type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
</svg>
<font color="white">Log out</font>
              </button>
              
               
              </a>
            </li>
        </ul>
        
        <!-- Example split danger button -->
        <div class="btn-group">


        </div>
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
              <span><i class="bi bi-person-workspace"><span class="ms-3"><?php echo " ".$_SESSION['username']; ?> </span></i></span>
            </div>
          </LI>
          <li>
            <div class="text-muted small fw-bold px-3 mt-4">
              CORE
            </div>
          </li>
          <li>
            <a href="dashboard.php" class="nav-link px-3 active mt-3">
              <span>
                <i class="bi bi-speedometer2 me-2"></i>
              </span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="my-3">
            <hr class="dropdown-divider">
          </li>
          <li>
            <div class="text-muted small fw-bold px-3">
              INTERFACE
            </div>
          </li>
          <LI class="px-3 my-3">
            <a class="btn text-muted small fw-bold text-white" data-bs-toggle="collapse" href="#collapseExample"
              role="button" aria-expanded="false" aria-controls="collapseExample">
              <span>FEATURES</span>
              <span><i class="bi bi-arrow-bar-down ms-2"></i>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <div class="card card-body bg-dark text-white">
                <a href="#" class="nav-link px-3 active">
                  <span class="fw-bold"><i class="bi bi-people"></i></span>
                  <span class="fw-bold ms-2">Users</span>
                </a>
                <a href="owners.php" class="nav-link px-3 active">
                  <span class="fw-bold"><i class="bi bi-person-check"></i></span>
                  <span class="fw-bold ms-2">Shop Owner</span>
                </a>
              </div>
          </LI>
        </ul>
      </nav>
    </div>
  </div>
  <!--Main-->
  <main class="mt-5 pt-3">
  <div class="card text-white bg-dark mb-3" style="width:100%;text-align:center;">
  <div class="card-header"><span><i class="bi bi-person-workspace"><span class="ms-3"><?php echo " ".$_SESSION['username']; ?> </span></i></span></div>
  <div class="card-body">
    <h5 class="card-title">Username:<?php echo " ".$_SESSION['username']; ?> </h5>
    <p class="card-text">Email:<?php $email="SELECT ADMIN_EMAIL FROM `admin_master` WHERE ADMIN_ID='1'";
   $query= mysqli_query($con,$email);
    while($row=mysqli_fetch_array($query)){
    echo $row['ADMIN_EMAIL'];
    }
    ?></p>
    <a href="changeprofile.php">
   <button class="btn btn-primary">edit profile</button> 
  </a>
  </div>
  </div>
</main>
 
</body>

</html>