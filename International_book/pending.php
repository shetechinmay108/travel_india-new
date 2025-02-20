<?php
//email send///////////
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require '../PHPMailer/src/Exception.php';
 require '../PHPMailer/src/PHPMailer.php';
 require '../PHPMailer/src/SMTP.php';

 function Sendemail_approvel( $Payment_Id, $total_rate, $Name, $emailforpayment, $phone, $Package_Date, $Package_Name, $Package_Duration)
 {


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
         $mail->setFrom('travelindia9500@gmail.com', 'The Real-Travel.com');
         $mail->addAddress('travelindia9500@gmail.com'); //$email      
         $mail->addReplyTo('travelindia9500@gmail.com', 'Information');
         $mail->isHTML(true);                                  //Set email format to HTML
        // $mail->Subject = ' Approvel Request From ' . $_POST['name'] . '..!';
        $mail->Subject = ' Approvel Request From ' . $Name . '..!';
         $mail->Body    = "<h3>hello The Real-Travel Team !
                        <p><h4>My name is " . $Name . " . </h4></p></h3><br>
                        <h2><b> Payment Info !</b></h2>
                        <p><b>  Name : </b>" . $Name . "  <br> 
                           <b>  Email Id : </b>" . $emailforpayment . "  <br> 
                           <b>  Mobile No : </b>" . $phone .  " <br>
                           <b>  Tour Date : </b>" . $Package_Date . "  <br>
                           <b>  Package Name : </b> " . $Package_Name . "   <br>
                           <b>  Package Duration : </b> " . $Package_Duration . " <br>
                              <br>

                             <p><h2> Payment Status ! </h2></p>
                             <p><b>Payment Id : </b>". $Payment_Id . " </p>
                             <p><b>Total Price : </b>". $total_rate . "Rs </p>
                             <p><b>Payment Status : </b> <b style=color:green;> Success </b> </p><br><br>
                             <button> <a href='http://localhost/main/travel_india-new/admin/adminhomepage.php'>Approval </a></button>
                        ";
         $res = $mail->send();
         if ($res) {
         } else
             echo  "<script>alert('Your Messages not Send..!')</script>"; ///'Message has been not sent';

     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
 }


?>











<?php
   include("../config/connection.php");

   $order_Id = $_GET['razorpay_payment_id'];
   //  $order_Id = $_SESSION['razorpay_payment_id'];
     $order_Id;

     $_SESSION['Payment_Id'] = $order_Id;

   $name = $_SESSION["username"];
     $email = $_SESSION["Email_ID"];
     $phone = $_SESSION["phone"];
     $rate = $_SESSION['rate'];
     $TourPackage_Id = $_SESSION["CIPackage_Id"];


     $Package_Date = $_SESSION["Package_Date"];
    $Package_Name = $_SESSION["Package_Name"];
    $Package_Duration = $_SESSION["Package_Duration"];
     










//find user_Id
$user = $_SESSION["email"];

$query = mysqli_query($conn, "select * from users where email ='$user'");
$row = mysqli_fetch_array($query);

$User_Id = $row['user_Id']; //user_Id = > 
$TourPackage_Id; //           TourPackage_Id
//$order_Id;       //           Payment_Id


///Insert into Payment table 
if (isset($_POST['submit'])) {
  $Payment_Id = $_POST['Payment_Id'];
  $total_rate = $_POST['rate'];
  $Name = $_POST['name'];
  $emailforpayment = $_POST['emailforpayment'];

  $sql = "INSERT INTO payment (user_Id, TourPackage_Id, razorpay_payment_Id, total_price, Name, email) VALUES('$User_Id','$TourPackage_Id','$Payment_Id','$total_rate', '$Name','$emailforpayment')";
  $qury = $conn->query($sql);

  if ($qury) {
    //echo "<script>alert('Data Inserted Successfully..!')</script>";
    Sendemail_approvel($Payment_Id, $total_rate, $Name, $emailforpayment, $phone, $Package_Date, $Package_Name, $Package_Duration);
    header("Refresh:0.2; url=../other/Book_data.php");
  } else {
    //echo "Not Inserted..!";
  }
}

//    //echo $_SESSION["email"];

 
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: rgb(177, 59, 30);
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color:black;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
         
        color:rgb(243, 106, 52);;
        font-size: 100px;
        line-height: 350px;
        margin-left:-15px;
        padding: 50px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="fa-regular fa-hourglass-half"></i>
        
      </div>
        <h1> Pending </h1> 
        <p>Your booking request is under review !<br/> we'll be in touch shortly! <br>
        <form action="" method="post">
          <input type="hidden" name="Payment_Id" value="<?php echo $order_Id ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="hidden" name="rate" value="<?php echo $rate; ?>">
          <input type="hidden" name="emailforpayment" value="<?php echo $email; ?>">
          <input type="hidden" name="phone" value="<?php echo $phone; ?>">
        Please click <button type="submit" name="submit" style="cursor: pointer;">here</button></p>
        </form>
      </div>
    </body>
</html>


 