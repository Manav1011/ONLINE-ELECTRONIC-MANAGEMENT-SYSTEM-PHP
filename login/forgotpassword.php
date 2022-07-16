<?php
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
include('smtp/PHPMailerAutoload.php');
if(isset($_POST['submit'])){
  session_start();
    $email=$_POST['email'];
   
        $_SESSION['html']=$email;
        $_SESSION['random']=rand(100000,999999);
        function smtp_mailer($to,$subject,$msg){
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
              header("location:otp.php");
          }else{
              echo '<div class="alert alert-danger" role="alert">
              Invalid Email!!
            </div>';
          }
        }
        echo smtp_mailer( $_SESSION['html'],'subject',"Your otp is-". $_SESSION['random']);
        
       
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
#form{
  position: absolute;
  top:25%;
  left:40%;
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

<div class="col-3" id="form">
    <form method="post" name="login" onsubmit="return confirm('Have you entered the correct Email address?');">
    <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter your email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email...." name="email" required>
        <br> 
        <div class="align-items-center">
        <button type="submit" name="submit" class="btn  btn-primary" id="submit">Submit</button>
    </div>
    <br>
    </form>
</div>
</body>
</html>