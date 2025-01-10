<?php
 // session_start();
include("../config/connection.php");
error_reporting(0);


//email send///////////
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';

// function Sendemail_approvel($User_Name, $email)
// {


//     //Create an instance; passing `true` enables exceptions
//     $mail = new PHPMailer(true);

//     try {
//         //Server settings
//         $mail->SMTPDebug = 0;                      //Enable verbose debug output  //SMTP::DEBUG_SERVER
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'harsh1234vathare@gmail.com';                     //SMTP username
//         $mail->Password   = 'olfq duvu rucq tvsv';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//         $mail->setFrom('travelindia9500@gmail.com', 'Travel_India.com');
//         $mail->addAddress('travelindia9500@gmail.com'); //$email      
//         $mail->addReplyTo('travelindia9500@gmail.com', 'Information');
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = ' Approvel Request From ' . $_POST['name'] . '..!';
//         $mail->Body    = "<h3>hello Travel_India Team !
//                        <p><h4>My name is " . $_POST['name'] . " . </h4></p></h3><br>
//                        <h4> I exited to book your Tour-Packages , So i hope You can approved my package in Your Accounts..!</h4>";
//         $res = $mail->send();
//         if ($res) {
//         } else
//             echo  "<script>alert('Your Messages not Send..!')</script>"; ///'Message has been not sent';

//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }





if (isset($_GET['id'])) {
    $sql = "select * from create_intern_package where CIPackage_Id = " .  $_GET['id'];
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
       // echo "data fetch succes";
    }
} else {
    echo "Invalid request..!";
    exit;
}










// if (isset($_GET['passid'])) {
//     $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['passid'];
//     $result = $conn->query($sql);
//     $data = mysqli_fetch_assoc($result);
//     if ($data) {
//     }
// } else {
//     echo "Invalid request..!";
//     exit;
// }
echo $user = $_SESSION["email"];

$query = mysqli_query($conn, "select * from users where email ='$user'");
$row = mysqli_fetch_array($query);
echo $id = $row['user_Id'];

echo $Package_Id = $_SESSION["CIPackage_Id"];

if (isset($_POST['submit'])) {


    $User_Name = $_POST['name'];
    $_SESSION["username"] = $User_Name;
    $email = $_POST['email'];
    $_SESSION["Email_ID"] = $email;

    $Phone = $_POST['Mobile_No'];
    $_SESSION["phone"] = $Phone;

    $Package_Date = $_POST['date'];
    $_SESSION["Package_Date"] = $Package_Date;

    $Package_Name = $_POST['package_name'];
    $_SESSION["Package_Name"] = $Package_Name;

    $Package_Price = $_POST['Price'];
    $_SESSION['rate'] = $Package_Price;

    $Package_Duration = $_POST['destination'];
    $_SESSION["Package_Duration"] = $Package_Duration;

    $Package_Type = $_POST['Package_Type'];
    $no_of_person = $_POST['no_of_person'];


    



    $sql = "insert into booking(user_Id,Package_Id,User_Name,Email_Id,Mobile_No,Tour_Date,Package_Name,Package_Price,Package_Duration,Package_Type,No_of_Person) values 
        ('$id','$Package_Id','$User_Name','$email','$Phone','$Package_Date','$Package_Name','$Package_Price','$Package_Duration',' $Package_Type','$no_of_person')";
    $result = $conn->query($sql);

    if ($result) {
       // Sendemail_approvel("$User_Name", "$email");
       // echo "<script>alert('Thank you for booking with us! You will get Approvel to you within 24-hours...!')</script>";

        header("Refresh:0.2; url=razorpay.php?price=$Package_Price");
    } else {
        echo "Invalid Query..!";
    }


    //include("../book_files/payment/razorpay.php");
}




//no of persons total no = 3 * package_Price;

$person = $_POST['no_of_person'];

$Package_Price = $_POST['Price'];

$Total_Price = $person * $Package_Price;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hotel Creation Form</title>
    <link rel="stylesheet" href="../css/admin/package.css">
    <style>
 .form-section .submitButton {
  padding: 0.5vw;
  /* background-color: white; */
  color: black;
  border: 1px solid silver;
  border-radius: 0.5vw;
  cursor: pointer;
  font-size: 1.3vw;
}
.form-section .submitButton2 {
  padding: 0.5vw;
  /* background-color: white; */
  color: black;
  border: 1px solid silver;
  border-radius: 0.5vw;
  cursor: pointer;
  font-size: 1.3vw;
}

.form-section .submitButton:hover {
  background-color: green;
  transition: 0.7s;
  color: white;
  border: 1px solid white;
  border-radius: 0.8vw;
}

    </style>


</head>

<body>
    <div class="main">
        <div class="page1">
            <div class="nav">
                <div class="nav-part1">
                    <h2>Book tour</h2>
                </div>
                <h1>the real travel</h1>
                <div class="nav-part2">
                    <h3><a href="../Lakshadweep/tourlist.php">Home</a></h3>
                    <!-- <h3><a href="hotellist.php">Hotel List</a></h3> -->
                </div>
            </div>
            <div class="package">
                <div class="image-section">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d0cf6cbb235763bab681f_RHOP_S6E5-8_The%20Estate%20At%20Kingsmill_1-topaz-upscale-2000w.avif" alt="">
                </div>
                <div class="form-section">
                    <h2>Confirm Your Payment !</h2>




                    <form id="booking-form" action="" method="post">
                        <div style="display: flex; gap: 1vw;">
                            <input type="text" id="name" name="name" placeholder="full name" value="<?php echo $_POST['name'] ?>" readonly>
                            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?>" readonly>
                        </div>
                        <input type="number" name="no_of_person"   value="<?php echo $person ?>" readonly>
                        <!-- <textarea id="message" name="massage" rows="4" placeholder="Enter Number of Persons" ><input type="number"></textarea> -->
                        <div style="display: flex; gap: 1vw;">
                            <input type="number" id="phone" name="Mobile_No" placeholder="phone-no" value="<?php echo $_POST['Mobile_No'] ?>" readonly>
                            <input type="date" id="date" name="date" value="<?php echo $_POST['date'] ?>" readonly>
                        </div>
                        <div style="display: flex; gap: 1vw;">
                            <input type="text"  id="name" name="package_name" placeholder="vaibhav tours" value="<?php echo $_POST['package_name'] ?>" readonly>
                            <input type="text"  id="number" name="Price" value="<?php echo $Total_Price ?>" readonly>
                        </div>
                        <input   id="name" name="destination" placeholder="destination" value="<?php echo $_POST['destination'] ?>" readonly>
                        <!-- <select class="submitButton2" id="destination" name="destination" >
                            <option value="<?php // echo $_POST['destination'] ?>">Select your Choise</option>
                            <option value="2 Days, 1 Night">2 Days, 1 Night</option>
                            <option value="4 Days, 3 Night">4 Days, 3 Night</option>
                            <option value="6 Days, 5 Night">6 Days, 5 Night</option>
                        </select> -->
                        <input   id="name" name="Package_Type" placeholder="Couple Package" value="<?php echo $data['Package_Type'] ?>" readonly>
                        <button class="submitButton" type="submit" class="submit-btn" name="submit">Pay Now</button>
                        <!-- <button class="Back_Button"   class="Back-btn"  >Back</button> -->
                    </form>
                
                    <!-- value="<?php //echo $_POST['destination'] ?>" readonly -->
                
                
                
                
                
                </div>
            </div>
        </div>
</body>

</html>


<!-- ./payment/razorpay.php?price=<?php // echo $Total_Price; ?> -->