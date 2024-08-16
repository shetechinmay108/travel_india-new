<?php
    include("../config/connection.php");
    error_reporting(0);


    //email send///////////
    use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require '../PHPMailer/src/Exception.php';
   require '../PHPMailer/src/PHPMailer.php';
   require '../PHPMailer/src/SMTP.php';
    
   function Sendemail_approvel($User_Name,$email){
      
       
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
    //   $email = $_POST['email'];
     $mail->addAddress( 'travelindia9500@gmail.com' );//$email      
     
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
     $mail->Subject = ' Approvel Request From '.$_POST['name'].'..!';
     $mail->Body    = "<h3>hello Travel_India Team !
                       <p><h4>My name is ".$_POST['name']." . </h4></p></h3><br>
                       <h4> I exited to book your Tour-Packages , So i hope You can approved my package in Your Accounts..!</h4>";
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

// session_start();
      
//      $user = $_SESSION['email'];
//      $query = mysqli_query($conn,"select * from users email = '$user'");
//      $row = mysqli_fetch_array($query);

//      $id = $row['user_Id'];






    //Select data From Tour Id
    if(isset($_GET['passid'])){
        $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['passid'];
         $result = $conn->query($sql);
         // echo"<pre>";
         // print_r($result);
         $data = mysqli_fetch_assoc($result);
         // echo "<pre>";
         // print_r($users);
         if($data){
             //echo "Data collected successes..!";
         }
     }
     else{
         echo "Invalid request..!";
         exit;
     }



     //Insert data in Booking table
     
    //  $user = $_SESSION['email'];
    //  $query = mysqli_query($conn,"select * from users email = '$user'");
    //  $row = mysqli_fetch_array($query);

    //  $id = $row['user_Id'];
    //  echo $id;
   $user = $_SESSION["email"];
    
    $query = mysqli_query($conn,"select * from users where email ='$user'");
    $row = mysqli_fetch_array($query);
   //print_r($row);
   $id = $row['user_Id'];
   //echo $id;


     if(isset($_POST['submit'])){
        $User_Name = $_POST['name'];
        $email = $_POST['email'];
        $Phone = $_POST['Mobile_No'];
        $Package_Date = $_POST['date'];
        $Package_Name = $_POST['package_name'];
        $Package_Price = $_POST['Price'];
        $Package_Duration = $_POST['destination'];
        $Package_Type = $_POST['Package_Type'];
        $massage = $_POST['massage'];

          // $email_Id = $_SESSION['email'];



    //  $query = mysqli_query($conn,"select * from users where email = '$email'");
    //  $row = mysqli_fetch_array($query);

    //  $id = $row['user_Id'];




        // $Package_Location = $_POST['Package_Location'];
        // $Package_Price = $_POST['Package_price'];
        // $Package_Features = $_POST['package_features'];
        // $Package_Details = $_POST['package_details'];

        // $file = $_FILES['package-img']['name'];
        // $tempname = $_FILES['package-img']['tmp_name'];
        // $folder = '../image/'.$file;
        // move_uploaded_file( $tempname,$folder);

        // "insert into tour_package(  Package_Name, Package_Type , Package_Location , Price , Package_Features , Package_Details, Package_Image) values 
        // ('$Package_Name','$Package_Type','$Package_Location','$Package_Price','$Package_Features','$Package_Details','$Package_image ')";
        $sql = "insert into booking(user_Id,User_Name,Email_Id,Mobile_No,Tour_Date,Package_Name,Package_Price,Package_Duration,Package_Type,add_info) values 
        ('$id','$User_Name','$email','$Phone','$Package_Date','$Package_Name','$Package_Price','$Package_Duration',' $Package_Type','$massage')";

        // $sql = "insert into booking(  Package_Name, Package_Type , Package_Location , Price , Package_Features , Package_Details, Package_Image) values 
        // ('$Package_Name','$Package_Type','$Package_Location','$Package_Price','$Package_Features','$Package_Details','$folder ')";
       
        $result = $conn->query($sql);
     
        if($result){
           //echo "<script>alert('Your Registration succesfully..!')</script>";
           //move_uploaded_file($_FILES['package-img']['tmp_name'], "$folder");
           Sendemail_approvel("$User_Name","$email");
           echo "<script>alert('Thank you for booking with us! You will get Approvel to you within 24-hours...!')</script>";
           
           header("Refresh:0.5; url=../Book_data.php");
          // echo $id;
        }
        else{
           echo "Invalid Query..!";
        }
     
     }



     //echo $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Package Booking</title>
    <link rel="stylesheet" href="book_form.css">
</head>
<body>
    <div class="container"><br><br><br>
        <h1>Book Your Tour Package</h1>
        <form id="booking-form" action="" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe"  required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john.doe@example.com" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" id="phone" name="Mobile_No" placeholder="+1234567890" required>
            </div>
            <div class="form-group">
                <label for="date">Travel Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <!-- <label for="name">Package Name</label> -->
                <input type="hidden" id="name" name="package_name" placeholder="vaibhav tours" value="<?php echo $data['Package_Name'] ?>" readonly>
            </div>
            <div class="form-group">
                <!-- <label for="number">Package Price</label> -->
                <input type="hidden" id="number" name="Price" value="<?php echo $data['Price'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="destination">Package Duration</label>
                <select id="destination" name="destination" required>
                    <option value="">Select your Choise</option>
                    <option value="2 Days, 1 Night">2 Days, 1 Night</option>
                    <option value="4 Days, 3 Night">4 Days, 3 Night</option>
                    <option value="6 Days, 5 Night">6 Days, 5 Night</option>
                </select>
            </div>
            <div class="form-group">
                <!-- <label for="name">Package Type</label> -->
                <input type="hidden" id="name" name="Package_Type" placeholder="Couple Package" value="<?php echo $data['Package_Type'] ?>" readonly>
            </div>

            <!-- <div class="form-group">
                <label for="destination">Destination</label>
                <select id="destination" name="destination" required>
                    <option value="">Select your destination</option>
                    <option value="paris">Paris</option>
                    <option value="new-york">New York</option>
                    <option value="tokyo">Tokyo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Travel Date</label>
                <input type="date" id="date" name="date" required>
            </div> -->
            <div class="form-group">
                <label for="message">Additional Information</label>
                <textarea id="message" name="massage" rows="4" placeholder="Any special requests or requirements"></textarea>
            </div>
            <button type="submit" class="submit-btn" name="submit">Book Now</button>
        </form>
    </div>
    <!-- <script src="script.js"></script> -->
</body>
</html>