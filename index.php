<?php
   include("config/connection.php");
   //include('verify_email.php');
   //session_start();
   //include("config/user_auth_acces.php");
   error_reporting(0);


   //email send///////////
   use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
   
  function Sendemail_Verify( $fname,$email, $otp){
     
      
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
    $mail->Subject = ' Verification code for verify your email address..!';
    $mail->Body    = "<h3>hello ".$_POST['fname']."</h3><h3> You need to verify your account with this tourism website !</h3>
              <h3> Enter this verification code for activate your account : <b>". $_POST['otp']."</b></h3>
              <br/><br/>";
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
///Sign in Procces..!

//echo "hello";
 $otp_str = str_shuffle("0123456789");
 $otp = substr($otp_str, 0, 6);

  $act_str = rand(100000, 1000000);
 "<br>";
 $activation_code = str_shuffle("abcdefghijklmno".$act_str);


if(isset($_POST['submit'])){
   $otp = $_POST['otp'];
   $activation_code = $_POST['activation_code'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password =$_POST['password'];
   //$verify_token =  bin2hex(random_bytes(16));

   $_SESSION["fname"]=$fname;


  //  $sql = "insert into users (fname, lname, email, password) values('$fname','$lname','$email','$password')";
  //  $result = $conn->query($sql);
  $email_check = "SELECT * FROM users WHERE email = '$email' ";
  $result = $conn->query($email_check);

   if(mysqli_num_rows($result) > 0)
   
   {

    echo "<script>alert('Email_Id Or Password already Exists..!')</script>";
       
    
   }
   else{
    
    $sql = "INSERT INTO users (fname, lname, email, password , otp , activation_code) VALUES('$fname','$lname','$email','$password', '$otp','$activation_code' )";
     // echo "<script>alert('Your registration succesfully..!')</script>";

     $qury = $conn->query($sql);
     
     if($qury)
     {
       
      Sendemail_Verify("$fname","$email"," $otp");
      //("$fname","$email"," $verify_Token");
      echo "<script>alert('Your registration succesfully..! Please Verify your Email Address..!')</script>";
      header("Refresh:0.5; url=otp_verify.php?code=".$activation_code);
     // header("location:otp_verify.php?code=".$activation_code);
      
      //echo "<script>alert('Your registration succesfully..! Please Verify your Email Address..!')</script>";
       
     }
     else{

      $_SESSION['status'] = "Registration Failed..!";
      //header('location:index.php');
       
     }
  }

 }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="curser"></div>
    <div class="main">
      <div class="overlay"></div>
      <div class="page1">
      

        <div class="navbar">
          <h3>travel india</h3>

          <h3 id="menu">menu</h3>
        </div>
        <div class="heading-section">
          <div class="heading-part1">
             
            <h1>welcome to</h1>
          </div>
          <div class="heading-part2">
            <h1>travel india</h1>
            <h3>reach your destiny with us!</h3>
          </div>
        </div>
        <div class="menu-section">
          <div class="menu-part1">
            <h2>home</h2>
            <h2 id="signin">sign in</h2>
            <h2 id="Login-part2">login</h2>
            <h2>about</h2>
            <i class="ri-close-circle-line"></i>
          </div>
        </div>
           
        <!-- *******Login form****** -->
        <?php  
          
            if(isset($_POST['Login'])){
              //extract($_POST) ;
             $email =  $_POST['email'];
             $password =  $_POST['password'];

              
             $sql = "select * from users where  email='$email' AND password = '$password'";
              //$sql = "select * from users where  email='$email'";
              $result = $conn->query($sql);

              // $_SESSION['user_Id'] = $row['user_Id'];
              // $_SESSION['Email_Id'] = $row['email'];

              // $result = $conn->query($sql);
              $result = mysqli_query($conn,$sql);
             $row = mysqli_fetch_array($result);

             
              if($row["user_type"]=="user" )
              {
                

                // $_SESSION['user_Id']=$row['user_Id'];
                // $_SESSION['Email_Id']=$row['email'];

                  if($row['status']== 'active'){
                    //$_SESSION['']=" echo $row['email']; ";

                    //$row = mysqli_fetch_assoc($result);
                    // $_SESSION['USER_ID']=$result['user_Id'];
                    // $_SESSION['USER_EMAIL']=$result['email'];
                    //$_SESSION["fname"]=$fname;
                    $_SESSION["email"]=$email;

                    echo "<script>alert('Welcome users, Explore this Travel_India-website..!')</script>";
                    header("Refresh:0.3; url=homepage.php");
                    //header('location:homepage.php');   $_GET['user_Id'] 
                  }
                  else{

                    //Sendemail_Verify("$fname","$email"," $otp");
                    echo "<script>alert('Your account is not verified , Please click Verify Email_ID..!')</script>";
                   // Sendemail_Verify("$fname","$email"," $otp");
                   // header("Refresh:0.5; url=otp_verify.php?code=".$activation_code);
                    //header("location:otp_verify.php?code=".$activation_code);
                  }
                 //header('location:homepage.php');
              }
              
    
              else if($row["user_type"]=="admin")
              {
                
                if($row['status']== 'active'){
                  header('location:admin/adminhomepage.php');
                }
                else{
                  echo "<script>alert('Your account is not verified , Please click Verify Email_Id..!')</script>";
                }
                // header('location:admin/adminhomepage.php');
              }

              // if($result->num_rows){
              //     $_SESSION['is_user_loggedin'] = true;
              //     $_SESSION['user_data'] = mysqli_fetch_assoc(($result));


              //     if($result=["user_type"] == "user"){
              //         header('location:homepage.php'); 
              //     }
              //     else if($result=["user_type"] == "admin"){
              //         header("location:admin/adminhomepage.php");
              //     }

              else{
                //$_SESSION['error'] = "<script>alert('Invalid Login info..!')</script>";
                echo "<script>alert('Invalid Login info..!')</script>";
               }

                  
         
                         
              }
             
         
             
         //}




         ?>


        
        
        <form action="" method="POST">
        <?php  include("config/alert.php");  ?>
          
           <div class="login" id="login"   >
               <i class="ri-close-line"></i>
              <div class="login-part1">
                 <h1>login</h1>
                 <input
                   type="email"
                   name="email"
                  placeholder="email . . . . ." required
                  /><br /><br />
                 <input
                   type="password"
                   name="password"
                  placeholder="password . . . . . ." required
                 /><br /><br />

                 
                 <button type="submit" name="Login">login</button>
                 <button id="signin-part123">signin</button><br />
                 <a href="password_reset.php">forget password</a><br>
                 <!-- <a href="resend_otp.php">Verify Email_Id </a> -->
              </div>
           </div>
        </form>


        <form action="  " method="post">
        <div class="signin">
        <?php   
        // if(isset($_SESSION['status'])){
        //       echo "<h4>" .$_SESSION['status']. "</h4>";
        //       unset($_SESSION['status']);
        //   }
          ?>   
          <input type="hidden" name="otp" value="<?php echo "$act_str"; ?>">
          <input type="hidden" name="activation_code" value="<?php echo "$activation_code"; ?>">
          
 
               <i class="ri-close-circle-fill"></i>
             <div class="signin-part1">
               <h1>Sign in</h1>
               <input
                 type="text"
                 name="fname"
                 placeholder="FirstName . . . . . ." required
               /><br /><br />
               <input
                 type="text"
                 name="lname"
                 placeholder="LastName . . . . . ." required
               /><br /><br />
               <input
                 type="email"
                 name="email"
                 placeholder="Email . . . . . ." required
               /><br /><br />
               <input
                 type="password"
                 name="password"
                 placeholder="Password . . . . . ." required
                /><br /><br />
                <!-- <input
                 type="password"
                 name="confirm_password"
                 placeholder="Confirm_Password . . . . . ." required
                /><br /><br /> -->
               <button id="login_part12">Login in</button>
               <button type="submit" name="submit">signin</button>
               <button id="Cancel">Cancel</button>
              </div>

           
        </div>
        </form>
       
        <div class="bottom-section">
          <div class="bottom-part1">
            <div class="bottom-part2">
              <a href="#"
                >enjoymental <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
            <div class="bottom-part2">
              <a href="#"
                >mythological <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
            <div class="bottom-part2">
              <a href="#"
                >educational <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="page2" data-scroll>
        <div class="photo-parent">
          <div class="photo-section">
            <div class="photo-part1">
              <div class="image1">
                <img
                data-scroll data-scroll-speed="-1" data-scroll-direction="horizontal"
                  src="https://images.unsplash.com/photo-1587922546307-776227941871?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
                  alt=""
                />
              </div>
            </div>
            <h2>lakshadweep</h2>
            <h4>see a amazing beach</h4>
          </div>

          <div class="photo-section2">
            <div class="photo-part2">
              <img
              data-scroll data-scroll-speed="1" data-scroll-direction="horizontal"
                src="https://images.unsplash.com/photo-1616606484004-5ef3cc46e39d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
                alt=""
              />
            </div>
            <h2>hampi</h2>
            <h4>visit a historical site</h4>
          </div>
        </div>
        <div class="photo-parent2">
          <div class="photo-section3">
            <img
            data-scroll data-scroll-speed="-1" data-scroll-direction="horizontal"
              src="https://images.unsplash.com/photo-1679022581490-884295ed5d52?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
              alt=""
            />
            <h2>kerla</h2>
            <h4>visit a nature site</h4>
          </div>
          <div class="photo-section4">
            <img
            data-scroll data-scroll-speed="1" data-scroll-direction="horizontal"
              src="https://images.unsplash.com/photo-1569096610945-1a094be04c74?q=80&w=1430&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
              alt=""
            />
            <h2>hampi</h2>
            <h4>visit a historical site</h4>
          </div>
        </div>
        <div class="parent-parent3">
          <div
            class="photo-section5"
            data-scroll data-scroll-speed="2" data-scroll-direction="vertical"
          >
            <img
              src="https://img.veenaworld.com/wp-content/uploads/2021/03/Konark-Sun-Temple-History-Architecture-and-Information.jpeg"
              alt=""
            />
            <h2>konark</h2>
            <h4>visit a historical sun temple</h4>
          </div>
        </div>
      </div>
      <div class="page3">
        <h1>Explore</h1>
      </div>
     
      <div class="second">
        <div class="elem one"  >
            <img src="https://www.livemint.com/lm-img/img/2024/01/21/1600x900/AyodhyaRamMandir_1705830011571_1705849061281.jpg" alt="">
            <h1 > ayodhya</h1>
            <h5>jai shree ram</h5>
        </div>
        <div class="elem">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSArmtBam6dAdSqw_pgqdXUSd2KN1AK1iGW9g&s" alt="">
            <h1> kedarnath</h1>
            <h5>mahadev</h5>
        </div>
        <div class="elem elemlast">
            <img src=https://hblimg.mmtcdn.com/content/hubble/img/dwarka/mmt/activities/t_ufs/m_Dwarkadhish%20Temple-1_l_498_640.jpg alt="">
            <h1> dwarka</h1>
            <h5>shree krishna</h5>
        </div>
        
        
    </div>
    
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
      integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
      integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
      integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="script.js"></script>
  </body>
</html>


 
 