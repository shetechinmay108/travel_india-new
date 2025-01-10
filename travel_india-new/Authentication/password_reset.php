<?php
include("../config/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function send_password_reset($get_email, $token){
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'harsh1234vathare@gmail.com';
        $mail->Password = 'olfq duvu rucq tvsv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('travelindia9500@gmail.com', 'The Real_Travel.com');
        $email = $_POST['email'];
        $mail->addAddress($email);
        $mail->addReplyTo('travelindia9500@gmail.com', 'Information');
        $mail->isHTML(true);
        $mail->Subject = ' Reset Password Link..!';
        $mail->Body = "<h3>hello users </h3><h3> You are receiving this email because we received a password reset request for your account.</h3><br>
                <br/><br/>
                <a href='http://localhost:3000/travel_india-new-main/password_change.php?email=$get_email&verify_token=$token'>Reset Password..! </a>";
           
                 
        $res = $mail->send();
        if($res){
        }
        else {
            echo "<script>alert('Your Messages not Send..!')</script>";
        }
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST['send_link'])){
    $email = mysqli_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $get_email = $row['email'];

        $update_token = "UPDATE users SET activation_code = '$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);

        if($update_token_run){
            send_password_reset($get_email, $token);
            echo "<script>alert('Email Send successfully, Please check your Email_Id..!')</script>";
            header("Refresh:1; url=../index.php");
        }
        else {
            echo "<script>alert('Something went wrong..!')</script>";
        }
    }
    else {
        echo "<script>alert('No Email Found..!')</script>";
        header("Refresh:1; url=password_reset.php");
    }
}

if(isset($_POST['update_password'])){
    $email = $_REQUEST['email'];
    $pwd = $_REQUEST['new_password'];
    $cpwd = $_REQUEST['cpassword'];

    if($pwd == $cpwd){
        $reset_pwd = mysqli_query($conn, "UPDATE users SET password ='$pwd' WHERE email = '$email'");

        if($reset_pwd > 0){
            echo "<script>alert('New Password Successfully Updated..!')</script>";  
            header("Refresh:1; url=../index.php");
        }
        else {
            echo "<script>alert('Password Not Updated..!')</script>"; 
        }
    }
    else {
        echo "<script>alert('Password and Confirm Password does not match..!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset</title>
    <link rel="stylesheet" href="../css/admin/package.css">
</head>
<style>
    a {
  align-items: center;
  justify-content: center;
  display: flex;
  text-decoration: none;
  font-family: twl;
  border: none;
  color: black;
  font-weight: 400;
}
.submitButton h3 {
  font-weight: 400;
  font-size: 1.3vw;
  /* color: white; */
}
.submitButton a:hover {
  background-color: black;
  transition: 0.7s;
  color: white;
}
</style>
<body>
    <div class="page1">
        <div class="nav">
            <div class="nav-part1">
                <h2>password reset</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="#">Home</a></h3>
                <!-- <h3><a href="tourlist.php">Tour List</a></h3> -->
            </div>
        </div>
     <div class="package">
         <div class="image-section">
        <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66db16cb455168f7ffd7476b_RHONY_S12E16-19_Azul%20Villa%20Casa%20Del%20Mar_2.avif" alt="">      
        </div>
<div class="form-section">
                <h2>email</h2>
                <form action="" method="POST">
                <?php include("config/alert.php");  ?>
                <input type="email" name="email"  placeholder="Enter your email address " required />
                     <button class="submitButton" type="submit" name="send_link" value="Send Password Reset Link">Send Password Reset Link</button>
                    <h3 class="submitButton" ><a href="../index.php">back</a></h3>
                    </form> 
            </div>
        </div> 
    </div>
</body>
</html>

