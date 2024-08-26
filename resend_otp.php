<?php
     include("config/connection.php");

     error_reporting(0);


     //email send///////////
     use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
     
    function Sendemail_Verify_email( $get_email, $otp ){
       
        
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
       $get_email = $_POST['email'];
      $mail->addAddress( $get_email);      
      
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
      $mail->Subject = ' Verification code for verify your email address..!';
      $mail->Body    = "<h3>hello users ".$_POST['fname']."</h3><h3> You need to verify your account with this tourism website !</h3>
                <h3> Enter this verification code for activate your account : <b>". $otp."</b></h3>
                <br/><br/>";
                //  <a href='http://localhost/travel_india-new/verify_email.php?fname=$fname&email=$email&verify_token=$otp'>Click me </a> ";
               
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $res = $mail->send();
      if($res){
        //   echo  "<script>alert('Your Messages succesfully Send..!')</script>";//'Message has been sent';
        //   header('location:verify_email.php'.$activation_code);
      }
        
      else 
      echo  "<script>alert('Your Messages not Send..!')</script>";///'Message has been not sent';
  
   } 
  catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  
  
  
}






 
//     $otp_str = str_shuffle("0123456789");
//     $otp = substr($otp_str, 0, 6);
//    $activation_token = str_shuffle("abcdefghijklmno".$act_str);



//    if(isset($_POST['send_otp'])){
//     if(isset($_GET['token'])){
//         $activation_code = $_GET['token'];
//         $otp = $_POST['otp'];
//         $email = $_POST['email'];

//         $sql = "UPDATE users SET otp = '$otp' activation_code ='".$activation_code."'  WHERE email = '$get_email' LIMIT 1";

//        // $sql = "SELECT * FROM users WHERE activation_code ='".$activation_code."'";
//         $result = mysqli_query($conn, $sql);

//         if(mysqli_num_rows($result)>0){
//            $row = mysqli_fetch_assoc($result);

//            if($update_otp_run)
// //          {
// //              Sendemail_Verify_email( $get_email, $otp );
// //              echo  "<script>alert('OTP Send successfully, Please check your Email_Id..!')</script>";
// //              header("Refresh:1; url=otp_verify.php");
// //          }
// //          else
// //          {
// //             echo  "<script>alert('Something want wrong it..!')</script>";
// //          }




//            $row_otp = $row['otp'];
//            $row_signup_time = $row['created_at'] ;

//            //Set time
//            $row_signup_time = date('d-m-Y h:i:s', strtotime($row_signup_time));
//            $row_signup_time = date_create($row_signup_time);
//            date_modify($row_signup_time, "+1 minutes");
//            $timeup = date_format($row_signup_time, 'd-m-Y h:i:s');

//            if($row_otp !== $otp){
//                echo "<script>alert('Please provide correct OTP..!')</script>";
//            }
//            else{
//                if(date('d-m-Y h:i:s') >= $timeup){
//                    echo "<script>alert('Your time is up.. try again..!')</script>";
//                    header("Refresh:1; url=index.php");
//                }
//                else{
//                    $sqlupdate = "UPDATE users SET otp = '', status = 'active' WHERE otp = '".$otp."' AND activation_code = '".$activation_code."'";
//                    $result_update = mysqli_query($conn, $sqlupdate);

//                    if($result_update){
//                        echo "<script>alert('Congratulation..! Your account suuccesfully Activated..!')</script>";
//                        header("Refresh:1; url=index.php");
//                    }else{
//                        echo "<script>alert('Oops..! Your account not Activated..!')</script>";

//                    }

//                }
//            }

//         }
//         else{
//            header("location:index.php");
//         }
//     }
// }



























// if(isset($_POST['send_otp'])){
    
   
//     $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
//     $result = mysqli_query($conn, $check_email);
//     if(mysqli_num_rows($result) > 0){
//         $row = mysqli_fetch_array($result);
//          //$get_name = $row['fname'];
//           $get_email = $row['email'];
//         //  $activation_token = $row['activation_code'];

//          $update_otp = "UPDATE users SET otp = '$otp'   WHERE email = '$get_email' LIMIT 1";

//          $update_otp_run = mysqli_query($conn, $update_otp);

//          if($update_otp_run)
//          {
//              Sendemail_Verify_email( $get_email, $otp );
//              echo  "<script>alert('OTP Send successfully, Please check your Email_Id..!')</script>";
//              header("Refresh:1; url=otp_verify.php");
//          }
//          else
//          {
//             echo  "<script>alert('Something want wrong it..!')</script>";
//          }
//        // echo  "<script>alert('success..!')</script>";
//     }
//     else{
//         echo  "<script>alert('No Email Found..!')</script>";
//         header("Refresh:1; url=resend_otp.php");
//     }
//   }


// $otp_str = str_shuffle("0123456789");
// $otp = substr($otp_str, 0, 6);



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
                     
 
           <form action=" " method="POST">
                        
               <div class="login" id="login"   >
                   <i class="ri-close-line"></i>
                  <div class="login-part1">
                     <h1>Verify Email_Id For Login !</h1>
                     
                     <input
                       
                       type="number"
                       name="otp"
                       value="<?php  //echo $otp; ?>"
                      placeholder="enter email address . . . . ." required
                      /><br /><br /><input
                       type="text"
                       name="token"
                       value="<?php  //echo $activation_token; ?>"
                      placeholder="enter email address . . . . ." required
                      /><br /><br />
                     <input
                       type="email"
                       name="email"
                      placeholder="enter email address . . . . ." required
                      /><br /><br />
                      
                     <button type="submit" name="send_otp" value="Send OTP">Send OTP</button>
                      
                  </div>
               </div>
            </form>
</body>
</html>