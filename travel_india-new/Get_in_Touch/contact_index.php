<?php
include('../config/connection.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

   if(isset($_POST['send'])){
    $name = $_POST['name'];                
    $email = $_POST['email'];
    $massage = $_POST['massage'];
 
    $sql = "insert into feedback (name, email, massage) 
    values('$name','$email','$massage')";

    $result = $conn->query($sql);
 
    if($result){
       

    

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
    $mail->setFrom('harsh1234vathare@gmail.com', 'Travel_India.com');
    $mail->addAddress('tourism@mailinator.com');     //Add a recipient
    $mail->addAddress('travelindia9500@gmail.com');               //Name is optional
    $mail->addReplyTo('harsh1234vathare@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name



   //  $sql_query = "select * from feedback ";
   //  $feedback_data = $conn->query($sql_query);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Feedback From '. $_POST['name'] .'..!';
    $mail->Body    = '<h3>Hello Travel_India Team ,</h3> <p><b> You got a new message from '. $_POST['name'] .' ,</b></p>-

    <p><b> Their Email_Id :-</b>'. $_POST['email'] .' </p>- 
    <p><b> Messages :- </b>'. $_POST['massage'] . '</p>


    <p><h3>Best wishes ,</h3><b> Travel_India Team </b></p>
 
  
       ';
             
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $res = $mail->send();
    if($res)
       echo  "<script>alert('Your Messages succesfully Send..!')</script>";//'Message has been sent';
    else 
    echo  "<script>alert('Your Messages not Send..!')</script>";///'Message has been not sent';

 } 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
    else{
       echo "Invalid Query..!";
    }
 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .navbar {
            width: 100%;
            background: #007bff;
            padding: 10px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #d4d4d4;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 100px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="#booking">Booking</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#">Contact Me</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="message">Message</label>
            <textarea id="message" name="massage" placeholder="Write your message here..." required></textarea>

            <button type="submit" name="send">Send Message</button>
        </form>
    </div>
</body>
</html>
