<?php
include('connection.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

//   require 'PHPMailer/src/Exception.php';
//   require 'PHPMailer/src/PHPMailer.php';
//   require 'PHPMailer/src/SMTP.php';


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















      // echo "<script>alert('Your Messages succesfully Send..!')</script>";
    }
    else{
       echo "Invalid Query..!";
    }
 
 }
?>