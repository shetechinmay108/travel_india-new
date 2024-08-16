<?php
  include("config/connection.php");

   //email send///////////
   use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  function send_password_reset( $get_email, $token){

       //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output  //SMTP::DEBUG_SERVER
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'harsh1234vathare@gmail.com';                     //SMTP username
    $mail->Password   = 'olfq duvu rucq tvsv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('travelindia9500@gmail.com', 'Travel_India.com');
    //$mail->addAddress('tourism@mailinator.com');     //Add a recipient
     $email = $_POST['email'];
    $mail->addAddress( $email);      
    
    //Name is optional
    $mail->addReplyTo('travelindia9500@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name



   //  $sql_query = "select * from feedback ";
   //  $feedback_data = $conn->query($sql_query);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ' Reset Password Link..!';
    $mail->Body    = "<h3>hello users </h3><h3> You are receiving this email because we received password reset request for your account .</h3><br>
              <br/><br/>
                <a href='http://localhost/travel_india-new/password_change.php?email=$get_email&verify_token=$token'>Reset Password..! </a> ";
             
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $res = $mail->send();
    if($res){
        // echo  "<script>alert('Your Messages succesfully Send..!')</script>";//'Message has been sent';
        //header('location:verify_email.php'.$activation_code);
    }
      
    else 
    echo  "<script>alert('Your Messages not Send..!')</script>";///'Message has been not sent';

 } 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


  }

  if(isset($_POST['send_link'])){
    $email = mysqli_escape_string($conn,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        // $get_name = $row['fname'];
         $get_email = $row['email'];

         $update_token = "UPDATE users SET activation_code = '$token' WHERE email = '$get_email' LIMIT 1";

         $update_token_run = mysqli_query($conn, $update_token);

         if($update_token_run)
         {
             send_password_reset( $get_email, $token);
             echo  "<script>alert('Email Send successfully, Please check your Email_Id..!')</script>";
             header("Refresh:1; url=index.php");
         }
         else
         {
            echo  "<script>alert('Something want wrong it..!')</script>";
         }
       // echo  "<script>alert('success..!')</script>";
    }
    else{
        echo  "<script>alert('No Email Found..!')</script>";
        header("Refresh:1; url=password_reset.php");
    }
  }






  if(isset($_POST['update_password'])){
        // 

//      $email = mysqli_real_escape_string($conn, $_POST['email']);
        // $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
        // $con_pass = mysqli_real_escape_string($conn, $_POST['cpassword']);
        // $token = mysqli_real_escape_string($conn, $_POST['activation_code']);


      $email = $_REQUEST['email'];
      $pwd = $_REQUEST['new_password'];
      $cpwd = $_REQUEST['cpassword'];

      if($pwd == $cpwd){
        $reset_pwd = mysqli_query($conn, "UPDATE users SET password ='$pwd' WHERE email = '$email'");

        if($reset_pwd > 0){
            echo  "<script>alert('New Password Successfully Updated..!')</script>";  
            header("Refresh:1; url=index.php");
        }
        else{
            echo  "<script>alert(' Password Not Updated..!')</script>"; 
        }

        
      }
      else{
        echo  "<script>alert('Password and Confirm Password does not match..!')</script>";
        //header("Refresh:1; url=password_change.php");
        //header("location:password_change.php?email=$email&verify_token=$verify_token");
      }



     



        // if($token)
        // {
        //     if($email && $new_pass && $con_pass)
        //     {
        //          //token is valid or not
        //          $check_token = "SELECT activation_code FROM users WHERE activation_code = '$token' LIMIT 1";
        //          $check_token_run = mysqli_query($conn, $check_token);

        //          if(mysqli_num_rows($check_token_run) > 0)
        //          {
        //              if($new_pass == $con_pass)
        //              {
        //                  $update_password = "UPDATE users SET password ='$new_pass' WHERE activation_code = '$token' LIMIT 1";
        //                  $update_password_run = mysqli_query($conn, $update_password);

        //                  if($update_password_run)
        //                  {
        //                     echo  "<script>alert('New Password Successfully Updated..!')</script>";
        //                     header("location:index.php");
        //                  }
        //                  else
        //                  {
        //                     echo  "<script>alert('Did not update password, Something want wrong..!')</script>";
        //                     header("location:password_change.php?email=$email&verify_token=$verify_token");
        //                  }

        //              }
        //              else
        //              {
        //                 echo  "<script>alert('Password and Confirm Password does not match..!')</script>";
        //             header("location:password_change.php?email=$email&verify_token=$verify_token");
        //              }
        //          }
        //          else
        //          {
        //             echo  "<script>alert('Invalid Token..!')</script>";
        //             header("location:password_change.php?email=$email&verify_token=$verify_token");
        //          }
        //     }
        //     else
        //     {
        //         echo  "<script>alert('All feileds are mandetory..!')</script>";
        //         header("location:password_change.php?email=$email&verify_token=$verify_token");
        //     }
        // }
        // else
        // {
        //     echo  "<script>alert('No token available..!')</script>";
        //    // header("location:password_change.php?email=$email&verify_token=$verify_token");
        // }
  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
                     
 
           <form action="" method="POST">
            <?php  include("config/alert.php");  ?>
              
               <div class="login" id="login"   >
                   <i class="ri-close-line"></i>
                  <div class="login-part1">
                     <h1>Reset Password</h1>
                     <input
                       type="email"
                       name="email"
                      placeholder="enter email address . . . . ." required
                      /><br /><br />
                      
                     <button type="submit" name="send_link" value="Send Password Reset Link">Send Password Reset Link</button>
                      
                  </div>
               </div>
            </form>
</body>
</html>