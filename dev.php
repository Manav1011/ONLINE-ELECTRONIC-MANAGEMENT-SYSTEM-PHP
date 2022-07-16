<html>
<body>
    <form action="" method="post">
    Email:<input type="email" name="email" id="">
    password: <input type="password" name="password" id="">
    <input type="submit" value="">
    </form>
    <?php
    if(isset($_POST['submit'])){
if($con=mysqli_connect('localhost','root','','eventshop')){
    echo "connected";
}
else{
    die("not connected");
}
$username=$_POST['username'];
$password=$_POST['password'];
$insert="INSERT INTO `login`(`login_id`, `username`, `pass`) VALUES ('','$username','$password')";
$query=mysqli_query($con,$insert);
if($query){
    echo "inserted";
}
else{
    echo "not inserted";
}
    }
?>
</body>
</html>