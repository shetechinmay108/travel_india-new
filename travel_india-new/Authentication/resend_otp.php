<?php
include("../config/connection.php");
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function  Sendemail_Verify($otp, $verify_email)
{
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
        $get_email = $verify_email;
        // $get_email = $_POST['email'];
        $mail->addAddress($get_email);

        $mail->addReplyTo('travelindia9500@gmail.com', 'Information');

        $mail->isHTML(true);
        $mail->Subject = 'Verification code for verify your email address..!';
        $mail->Body = "<h3>Hello users </h3><h3> You need to verify your account with this tourism website!</h3>
                      <h3> Enter this verification code for activate your account: <b>" . $otp . "</b></h3><br/><br/>";

        $res = $mail->send();
        if ($res) {
        } else {
            echo "<script>alert('Your Messages not Send..!')</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



<?php
//create the opt

$otp_str = str_shuffle("0123456789");
echo $otp = substr($otp_str, 0, 6);
$_SESSION['otp'] = $otp;

$act_str = rand(100000, 1000000);
echo $activation_code = str_shuffle("abcdefghijklmno" . $act_str);
$_SESSION['activation_code'] = $activation_code;


// if (isset($_POST['submit'])) {
//     $otp = $_POST['otp'];
//     $activation_code = $_POST['token'];
//     $email = $_POST['email'];
    
  
//    // $_SESSION["email"] = $email;
  
//     $email_check = "SELECT * FROM users WHERE email = '$email'";
//     $result = $conn->query($email_check);




    // if (mysqli_num_rows($result) > 0) {
    //   //  echo "<script>alert('Email_Id Or Password already Exists..!')</script>";
    //   } else {
    //     //$sql = "UPDATE users SET otp ='$otp' AND activation_code = '$activation_code' WHERE email = '$email'";

           
    //     $sql = "INSERT INTO users ( otp, activation_code) VALUES('$otp','$activation_code')";

    //     $qury = $conn->query($sql);
    
    //     if ($qury) {
    //      // Sendemail_Verify("$fname", "$email", " $otp");
    //       echo "<script>alert('Otp sent succesfully..! Please check your Email Address..!')</script>";
    //       header("Refresh:0.4; url=otp_verify.php?code=" . $activation_code);
    //     } else {
    //       $_SESSION['status'] = "Otp sent Failed..!";
    //     }
    //   }

//}

// if (isset($_GET['id'])) {
//     $sql = "select * from users where user_Id = " . $_GET['id'];
//     $result = $conn->query($sql);
//     $users = mysqli_fetch_assoc($result);
//     if (!$users) {
//       echo "Invalid request..!";
//       exit;
//     }
//   }

if (isset($_POST['submit'])) {
    $otp = $_POST['otp'];
    $activation_code = $_POST['token'];
    $verify_email = $_POST['email'];
    $_SESSION['email_verify'] = $verify_email;

    // Prepare a parameterized query to prevent SQL injection.
    $sql = "UPDATE users SET otp = ?, activation_code = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters to the query.
        $stmt->bind_param("sss", $otp, $activation_code, $verify_email);

        // Execute the query.
        if ($stmt->execute()) {
            Sendemail_Verify($otp, $verify_email);
            echo "<script>alert('OTP sent Successfully..!')</script>";
            header("Refresh:0.2; url=otp_2.php?code=" . $activation_code);
            //header("Refresh:0.5; url=otp_2.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close(); // Close the prepared statement.
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close(); // Close the database connection.
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify email id</title>
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
                <h2>verify email id</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="../index.php">Home</a></h3>
                <!-- <h3><a href="tourlist.php">Tour List</a></h3> -->
            </div>
        </div>
        <div class="package">
            <div class="image-section">
                <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66db15f7138e7cb729529a6f_RHONY_S12E9-10_Castle%20Hill%20Inn_1-topaz.avif" alt="">
            </div>
            <div class="form-section">

            <!-- <?php 
                    //if($result->num_rows > 0){
                    // while($row = mysqli_fetch_assoc($result)){
   
                 ?> -->
                <h2>verify email id</h2>
                <form action="" method="post">
                


                    <!-- <h1>Verify Email_Id For Login!</h1> -->
                    <input type="hidden" name="otp" placeholder="Enter OTP" value="<?php echo $otp ?>" required />
                    <input type="hidden" name="token" placeholder="Enter token" value="<?php echo $activation_code ?>" required />
                    <input type="email" name="email" placeholder="Enter email address" required />
                    <button class="submitButton" type="submit" name="submit">Send OTP</button>
                    <h3 class="submitButton"><a href="../index.php">back</a></h3>

                   
                </form>


                <?php
                    //  }
                    //}
                    ?>
            </div>
        </div>
    </div>
</body>

</html>