<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
include('users.php');
$id= $_GET['id'];
$dselect="select * from customer_master where CUSTOMER_ID='$id';";
$qselect=mysqli_query($con,$dselect);
$number=mysqli_num_rows($qselect);
if($number>0){
   $row=mysqli_fetch_array($qselect);
   echo '<div class="card text-center">
   <div class="card-header">
     Details
   </div>
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
   </div>
   <div class="card-footer text-muted">
     2 days ago
   </div>
 </div>';
}
?>



  .$row['CUSTOMER_USERNAME'].
  '.$row['CUSTOMER_EMAIL'].
  '.$row['CUSTOMER_PASSWORD'].
  '.$row['FIRST_NAME'].
  '.$row['LAST_NAME'].
  '.$row['GENDER'].
  '.$row['DOB'].
  '.$row['ADDRESS'].
  '.$row['CITY'].
  '.$row['STATE'].
  '.$row['COUNTRY'].
  '.$row['PIN'].
  '.$row['CONTACT'].
   <a href="users.php" class="btn btn-primary">Go Back</a>