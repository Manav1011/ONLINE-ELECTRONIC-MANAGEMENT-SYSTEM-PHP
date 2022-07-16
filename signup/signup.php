<?php
session_start();
include ('dbconnect.php');
include('smtp/PHPMailerAutoload.php');
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$country=$_POST['country'];
$contact=$_POST['contact'];
$html=$email;
$_SESSION['randomotp1']=rand(100000,999999);
function smtp_mailer($to,$subject,$msg){
global $username;
global $email;
global $password;
global $fname;
global $lname;
global $gender;
global $dob;
global $pin;
global $address;
global $city;
global $state;
global $country;
global $contact;
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
//    $mail->CharSet"UTF-8";
    $mail->SMTPAuth=true;
    $mail->Username="mobileshop.e.project@gmail.com";
    $mail->Password="mobileshope";
    $mail->SetFrom("mobileshop.e.project@gmail.com");
    $mail->addAddress($to);
    $mail->IsHTML(true);
    $mail->Subject="$subject";
    $mail->Body=$msg;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
      header("location:otp.php?username=$username&email=$email&password=$password&fname=$fname&lname=$lname&gender=$gender&dob=$dob&address=$address&city=$city&pin=$pin&state=$state&country=$country&contact=$contact");
  }else{
      echo '<div class="alert alert-danger" role="alert">
      Invalid Email!!
    </div>';
  }
}
echo smtp_mailer( $html,'subject',"Your otp is-". $_SESSION['randomotp1']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
body {
  background-image: url('teahub.io-best-wallpapers-hd-21618.png');
  width: 100%;
  height: 100vh;
}
#form1{
  position: absolute;
  top:20%;
  left:25%;
}
#submit{
           margin-left: 8cm;

    }
form{-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
border: 1px solid white;
padding: 30px 60px;
font-family: 'Patrick Hand', cursive;
color:white;
       }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<div class="col-7" id="form1">
  <form class="row g-4" action="" method="post"name="signup"  onsubmit="return validation()">
  <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Username</label>
      <input type="text" class="form-control" id="validationDefault01" name="username" pattern="[A-Za-z]{1,32}" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Email</label>
      <input type="email" class="form-control" id="validationDefault01" name="email" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">Password</label>
      <input type="password" class="form-control" id="validationDefault02" name="password" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="validationDefault02" name="cpassword" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefaultUsername" class="form-label">First Name</label>
      <div class="input-group">
        <input type="text" class="form-control" id="validationDefaultUsername" name="fname" aria-describedby="inputGroupPrepend2"pattern="[A-Za-z]{1,32}" required>
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationDefaultUsername" class="form-label">Last Name</label>
      <div class="input-group">
        <input type="text" class="form-control" id="validationDefaultUsername" name="lname" aria-describedby="inputGroupPrepend2" pattern="[A-Za-z]{1,32}" required>
      </div>
    </div>
    <div class="col-md-3 col-3">
      <label for="validationDefaultUsername" class="form-label">Gender</label><br>
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
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">Date Of Birth</label>
      <input type="date" class="form-control" id="validationDefault03" name="dob" max="2005-12-26" required>
    </div>
    <div class="col-md-5">
        <label for="validationDefault03" class="form-label">Address</label>
        <textarea class="form-control" name="address" aria-label="With textarea" placeholder="Example:flatNo,area,landmark..." required></textarea>
      </div>
      <div class="col-md-3">
        <label for="validationDefault03" class="form-label">Country</label>
        <select class="form-select form-select-sm" name="country" aria-label=".form-select-sm example" required>
          <option value="India">India</option>
        </select>
      </div>
      
      <div class="col-md-3">
        <label for="validationDefault03" class="form-label">State</label>
        <select class="form-select form-select-sm" name="state" aria-label=".form-select-sm example" required>
          <option value="Gujarat">Gujarat</option>
        </select>
      </div>
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">City</label>
      <select class="form-select form-select-sm" name="city" aria-label=".form-select-sm example" required>
        <option value="Ahmedabad">Ahmedabad</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">PIN</label>
      <input type="text" class="form-control" name="pin" id="validationDefault05" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Contact</label>
      <input type="text" class="form-control" name="contact" id="validationDefault05" pattern="[789][0-9]{9}" required>
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary"  name="submit" value="Submit">
    </div>
  </form>
</div>
<script>
 function validation() {

                var password = 
                    document.forms["signup"]["password"];
                var cpassword = 
                    document.forms["signup"]["cpassword"];
                var fname = 
                    document.forms["signup"]["fname"];
                var lname = 
                    document.forms["signup"]["lname"];
                    var pin = 
                    document.forms["signup"]["pin"];
                    var contact = 
                    document.forms["signup"]["contact"];
                if(password.value.length<8){
                  window.alert("password must be atleast 8 characters long");
                  password.focus();
                  return false;
                }
                if (password.value != cpassword.value) {
                    window.alert("password do not match");
                    cpassword.focus();
                    return false;
                }
  
                if (fname.value == lname.value) {
                    window.alert("First name and Last name cannot be same");
                    lname.focus();
                    return false;
                }
                if (pin.value.length < 6) {
                    window.alert(
                      "enter a valid pin");
                    pin.focus();
                    return false;
                }
  
                if (contact.value.length <10) {
                    window.alert("please enter a valid contact number");
                    contact.focus();
                    return false;
                }
  
                return true;
            }
        </script>

</body>
</html>
