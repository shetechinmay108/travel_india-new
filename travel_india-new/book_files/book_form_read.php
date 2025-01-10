<?php
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





// if (isset($_GET['Id'])) {
//     $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['Id'];
//     $result = $conn->query($sql);
//     $data = mysqli_fetch_assoc($result);
//     if ($data) {
//        // echo "data fetch succes";
//     }
// } else {
//     echo "Invalid request..!";
//     exit;
// }










if (isset($_GET['passid'])) {
    $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['passid'];
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
    }
} else {
    echo "Invalid request..!";
    exit;
}


$user = $_SESSION["email"];

// $query = mysqli_query($conn, "select * from users where email ='$user'");
// $row = mysqli_fetch_array($query);
// $id = $row['user_Id'];
// if (isset($_POST['submit'])) {
//     $User_Name = $_POST['name'];
//     $email = $_POST['email'];
//     $Phone = $_POST['Mobile_No'];
//     $Package_Date = $_POST['date'];
//     $Package_Name = $_POST['package_name'];
//     $Package_Price = $_POST['Price'];
//     $Package_Duration = $_POST['destination'];
//     $Package_Type = $_POST['Package_Type'];
//     $massage = $_POST['massage'];
//     $sql = "insert into booking(user_Id,User_Name,Email_Id,Mobile_No,Tour_Date,Package_Name,Package_Price,Package_Duration,Package_Type,add_info) values 
//         ('$id','$User_Name','$email','$Phone','$Package_Date','$Package_Name','$Package_Price','$Package_Duration',' $Package_Type','$massage')";
//     $result = $conn->query($sql);

//     if ($result) {
//         Sendemail_approvel("$User_Name", "$email");
//         echo "<script>alert('Thank you for booking with us! You will get Approvel to you within 24-hours...!')</script>";

//         header("Refresh:0.5; url=../Book_data.php");
//     } else {
//         echo "Invalid Query..!";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hotel Creation Form</title>
    <link rel="stylesheet" href="../css/admin/package.css">
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
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d0cf6cbb235763bab681f_RHOP_S6E5-8_The%20Estate%20At%20Kingsmill_1-topaz-upscale-2000w.avif" alt=""  >
                </div>
                <div class="form-section">
                    <h2>Book your dream</h2>
                    <form id="booking-form" action="pay_now1.php?passid=<?php echo $data['TourPackage_Id'] ?>" method="post">
                        <div style="display: flex; gap: 1vw;">
                            <input type="text" id="name" name="name" placeholder="full name" required>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                        <input type="number" name="no_of_person" placeholder="Enter Number of Persons..!">
                        <!-- <textarea id="message" name="massage" rows="4" placeholder="Any special requests or requirements"></textarea> -->
                        <div style="display: flex; gap: 1vw;">
                            <input type="number" id="phone" name="Mobile_No" placeholder="phone-no" required>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div style="display: flex; gap: 1vw;">
                            <input   id="name" name="package_name" placeholder="vaibhav tours" value="<?php echo $data['Package_Name'] ?>" readonly>
                            <input   id="number" name="Price" value="<?php echo $data['Price'] ?>" readonly>
                        </div>
                        <select class="submitButton2" id="destination" name="destination" required>
                            <option value="">Select your Choise</option>
                            <option value="2 Days, 1 Night">2 Days, 1 Night</option>
                            <option value="4 Days, 3 Night">4 Days, 3 Night</option>
                            <option value="6 Days, 5 Night">6 Days, 5 Night</option>
                        </select>
                        <input   id="name" name="Package_Type" placeholder="Couple Package" value="<?php echo $data['Package_Type'] ?>" readonly>
                        <button class="submitButton" type="submit" class="submit-btn" name="submit">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>