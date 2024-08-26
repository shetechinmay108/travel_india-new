<?php  
    include("../../config/connection.php"); 

    error_reporting(0);


    //email send///////////
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require '../../PHPMailer/src/Exception.php';
   require '../../PHPMailer/src/PHPMailer.php';
   require '../../PHPMailer/src/SMTP.php';
    
   function Sendemail_hotel_approvel($email){
      
       
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
     $mail->addAddress($email);      
     
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
     $mail->Subject = ' Congratulation Your Hotel Book has been Approved..!';
     $mail->Body    = "<h3>Welcome ".$_POST['fname']." in Travel_India.com</h3><h3> Your Hotel Booking has been Succesfully Approved..!</h3>
               <h3>Please check Your Account..!";
               //  <a href='http://localhost/travel_india-new/verify_email.php?fname=$fname&email=$email&verify_token=$otp'>Click me </a> ";
              
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


  //  $user = $_SESSION["email"];
    
  //   $query = mysqli_query($conn,"select * from users where email ='$user'");
  //   $row = mysqli_fetch_array($query);
  //  //print_r($row);
  //  $id = $row['user_Id'];





 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	

<h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
    <th scope="col">#</th>
     <th scope="col">Hotel Name</th>
     <th scope="col">User Name</th>
     <th scope="col">Email_Id</th>
     <th scope="col">Mobile-No</th>
     <th scope="col">Hotel Address</th>
     <th scope="col">Date</th>
     <th scope="col">Duration</th>
     <th scope="col">Booking-Date</th>
     <!-- <th>Package Name</th> -->
     <th scope="col">Hotel-Price</th>
     <!-- <th>Package-Duration</th> -->
     <!-- <th>Package-Type</th> -->
     <!-- <th>Booking-Date</th> -->
     <th scope="col">Status</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM  hotel_booking WHERE status = 'pending' ORDER BY user_Id";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
     
      <th scope="row"><?php echo $row['user_Id']; ?></th>
      <td><?php echo $row['Hotel_Name']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo $row['Email_Id']; ?></td>
    <td> <?php echo $row['Mobile_No']; ?></td>
     <td><?php echo $row['Hotel_Address']; ?> </td>
    <td><?php echo $row['date']; ?></td>  
    <td><?php echo $row['Duration']; ?></td>
     <td><?php echo $row['created_booking']; ?></td>
      <td><?php echo $row['Price']; ?> Rs</td>
       

     <td>
		<form action="" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['user_Id']; ?>"/>
    <input type="hidden" name="fname" value="<?php echo $row['User_Name']; ?>" placeholder="fname">
    <input type="hidden" name="email" placeholder="email" value="<?php echo $row['Email_Id']; ?>">
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp <br>
		<input type="submit" name="delete" value="delete"> 

		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>


<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
	$select = "UPDATE hotel_booking SET status = 'Approved' WHERE user_Id = '$id' ";
	$result = mysqli_query($conn,$select);
  Sendemail_hotel_approvel($email);
	//header("location:book.php");
  if($result){
   
   

    echo "<script>alert('Your Package Approved Succesfully..!')</script>";
    header("Refresh:0.5s; url=../adminhomepage.php");
  }

  else{
    echo "<script>alert('Your Package Not Approved ..!')</script>";
    header("Refresh:0.5s; url=../adminhomepage.php");
  }
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM hotel_booking  WHERE user_Id = '$id' ";
	$resut = mysqli_query($conn,$select);
	//header("location:book.php");
  if($result){
    echo "<script>alert('Your Package Deleted Succesfully..!')</script>";
    header("Refresh:0.5s; url=../adminhomepage.php");
  }

  else{
    echo "<script>alert('Your Package Not Deleted ..!')</script>";
    header("Refresh:0.5s; url=../adminhomepage.php");
  }
}



 ?>






<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 


 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
  <tr>
    <th scope="col">#</th>
     <th scope="col">Hotel Name</th>
     <th scope="col">User Name</th>
     <th scope="col">Email_Id</th>
     <th scope="col">Mobile-No</th>
     <th scope="col">Hotel Address</th>
     <th scope="col">Date</th>
     <th scope="col">Duration</th>
     <th scope="col">Booking-Date</th>
     <!-- <th>Package Name</th> -->
     <th scope="col">Hotel-Price</th>
     <!-- <th>Package-Duration</th> -->
     <!-- <th>Package-Type</th> -->
     <!-- <th>Booking-Date</th> -->
     <th scope="col">Status</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  hotel_booking";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      

      <th scope="row"><?php echo $row['user_Id']; ?></th>
      <td><?php echo $row['Hotel_Name']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo $row['Email_Id']; ?></td>
    <td> <?php echo $row['Mobile_No']; ?></td>
     <td><?php echo $row['Hotel_Address']; ?> </td>
    <td><?php echo $row['date']; ?></td>  
    <td><?php echo $row['Duration']; ?></td>
     <td><?php echo $row['created_booking']; ?></td>
      <td><?php echo $row['Price']; ?> Rs</td>
      <td style=color:green; font-weight:bold;><?php echo $row['Status']; ?></td>


    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>