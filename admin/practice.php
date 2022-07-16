<?php
include ('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$selectshopkeeper="SELECT `SHOPKEEPER_EMAIL` FROM `shopkeeper_master` WHERE 1";
$queryshopkeeper=mysqli_query($con,$selectshopkeeper);
if($queryshopkeeper){
    while($row=mysqli_fetch_array($queryshopkeeper)){
        $shopkeeper=$row['SHOPKEEPER_EMAIL'];
        echo $shopkeeper;
    }
}
?>