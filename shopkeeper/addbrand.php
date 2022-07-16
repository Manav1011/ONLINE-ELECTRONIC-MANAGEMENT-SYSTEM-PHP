<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $brand_name=$_POST['bname'];
    $insert="INSERT INTO `brand_master`(`BRAND_ID`, `SHOPKEEPER_ID`, `BRAND_NAME`) VALUES ('','$id','$brand_name')";
    if($query=mysqli_query($con,$insert)){
      echo '<div class="alert alert-success" role="alert">
      Brand successfully created<br>
    </div>';
    }
    else{
      die('<div class="alert alert-danger" role="alert">
      Brand already exists
    </div>');
    }
    }
?>
<html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  
  background-image: url("7.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 30%;
  padding: 20px;
  text-align: center;
}
form{
  background-image:url("2.jpg");
  -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,1.75);
border: 1px solid white;
padding: 30px 60px;
font-family: 'Patrick Hand', cursive;
color:white;
       }
</style>
</head>
<body>

<div class="bg-image"></div>
<div class="bg-text">
<form method="post" name="login">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">shopkeeper ID</label>
    <select class="form-select" aria-label="Default select example" name="id" style="text-align:center;" required>
  <option selected>1</option>

</select>      
    <br> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Brand Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" name="bname" required>
        <br>    
          
        <button type="submit" name="submit" class="btn  btn-primary" id="submit">Add</button>
    </div>
    </form>
</div>

</body>
</html>
