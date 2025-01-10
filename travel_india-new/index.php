<?php
include("config/connection.php");
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function Sendemail_Verify($fname, $email, $otp)
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
    $email = $_POST['email'];
    $mail->addAddress($email);
    $mail->addReplyTo('travelindia9500@gmail.com', 'Information');

    $mail->isHTML(true);
    $mail->Subject = 'Verification code for verify your email address..!';
    $mail->Body = "<h3>hello " . $_POST['fname'] . "</h3><h3> You need to verify your account with this tourism website !</h3>
                   <h3> Enter this verification code for activate your account : <b>". $_POST['otp']."</b></h3>
                   <br/><br/>";

    $res = $mail->send();
    if (!$res) {
      echo "<script>alert('Your Messages not Send..!')</script>";
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

$otp_str = str_shuffle("0123456789");
$otp = substr($otp_str, 0, 6);

$act_str = rand(100000, 1000000);
$activation_code = str_shuffle("abcdefghijklmno" . $act_str);

if (isset($_POST['submit'])) {
  $otp = $_POST['otp'];
  $activation_code = $_POST['activation_code'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION["fname"] = $fname;

  $email_check = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($email_check);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email_Id Or Password already Exists..!')</script>";
  } else {
    $sql = "INSERT INTO users (fname, lname, email, password, otp, activation_code) VALUES('$fname','$lname','$email','$password', '$otp','$activation_code')";
    $qury = $conn->query($sql);

    if ($qury) {
      Sendemail_Verify("$fname", "$email", " $otp");
      echo "<script>alert('Your registration succesfully..! Please Verify your Email Address..!')</script>";
      header("Refresh:0.5; url=Authentication/otp_verify.php?code=" . $activation_code);
    } else {
      $_SESSION['status'] = "Registration Failed..!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the real hote</title>
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <!-- https://www.fourseasons.com/content/dam/fourseasons/video/FSH/FSH_festive_ambient_shorter.mp4 -->
     <!-- https://www.fourseasons.com/
       -->
    <div class="main">
        <div class="page1">
            
            <div class="nav">
                <div class="nav-part1">
                    <h5>Curated hotels from <br> The Real Housewives</h5>
                </div>
                <i class="ri-menu-line open"></i>
            </div>
             <div class="middle">
                <h2>Money can’t buy you class,<br> but it can buy you a vacation.</h2>
                <br><h4>Check in to the iconic hotels and resorts <br> featured on The Real Housewives.  </h4>
             </div>
             <div class="header">
                <h1>The real travel</h1>
             </div>
             <div class="page1-part1">
                <div class="nav">
                    <div class="nav-part1">
                        <h5>Curated hotels from <br> The Real Housewives</h5>
                    </div>
                    <i class="ri-close-line close"></i>
                </div>
                <div class="menu-section">
                    <div class="menu">
                        <h1 class="animate-text" data-index="1">the real hotels</h1>
                        <h1 class="animate-text signIn" data-index="2">sign in</h1>
                        <h1 class="animate-text sign" data-index="3">sign up</h1>
                        <h1 class="animate-text" data-index="4">about us</h1>
                        <h1 class="animate-text" data-index="5"> <a href="Get_in_Touch/contact_index.php"> get in touch</a></h1>
                    </div>
                    
                    <div class="about">
                        <div class="text">
                        <h6><i class="ri-arrow-right-line"></i>instagram</h6>
                        <h6><i class="ri-arrow-right-line"></i>facebook</h6>
                        <h6><i class="ri-arrow-right-line"></i>e-mail</h6>
                        </div>
                        <div class="images">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f79495e6d6e4419b14_bas-van-den-eijkhof-LchLjOB-XvE-unsplash.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66cf2d46bf18c7280d2f49ac_menu-2.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66cf2d4579c54a88014bc939_menu-1.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f712f954b018e2680f_getty-images-jDdUlr0UBlw-unsplash.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f7bc9a2f5fe688b26d_sj-objio-0WUa239Wm5s-unsplash.avif" alt="">           
                        </div>
                    </div>
                </div>
             </div>
             <?php
      if (isset($_POST['Login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if ($row["user_type"] == "user") {
          if ($row['status'] == 'active') {
            $_SESSION["email"] = $email;
            echo "<script >alert('Welcome users, Explore this Real_Travel-website..!')</script>";
            header("Refresh:0.3; url=other/homepage.php");
          } else {
            echo "<script>alert('Your account is not verified, Please click Verify Email_ID..!')</script>";
          }
        } else if ($row["user_type"] == "admin") {
          if ($row['status'] == 'active') {
            header('location:admin/adminhomepage.php');
          } else {
            echo "<script>alert('Your account is not verified, Please click Verify Email_Id..!')</script>";
          }
        } else {
          echo "<script>alert('Invalid Login info..!')</script>";
        }
      }
      ?>
         
             <form action="" method="POST">
                 <i class="ri-close-large-fill"></i>
                 <?php include("config/alert.php"); ?>
                 <div class="login" id="login">
                     <div class="login-part1">
                         <h2>Sign in to your account</h2>
                         <h3 style="font-size: 1.02vw;  margin: 1vw;">Don't have an account?<span id="signin-part123"> Create a free account </span></h3>
                         <input type="email"  name="email"  placeholder="email " required />
                         <input  type="password" name="password"  placeholder="password  " required />
                         <button type="submit" name="Login">login</button>                    
                         <button id="xyz"><a href="Authentication/password_reset.php">forget password</a></button>
                         <button id="xyz"><a href="Authentication/resend_otp.php">Verify Email_Id</a></button>
                         <div class="closeSide">
                           <h3 id="closeLogin">close</h3>
                         </div>
                    </div>
                </div>
            </form>
              <form action="" method="post">
                  <div class="signin">
                      <?php include("config/alert.php"); ?>
                      <input type="hidden" name="otp" value="<?php echo "$act_str";?>"> 
                      <input type="hidden" name="activation_code" value="<?php echo "$activation_code";?>"> 
                      <i class="ri-close-circle-fill"></i>
                      <div class="signin-part1">
                      
                          <h2>Sign up to create account</h2>
                          <h3>Already have an account?<span id="login_part12" > Sign In </span></h3>
                            
                          <input type="text"name="fname" placeholder="FirstName  " required />
                          <input type="text"  name="lname"placeholder="LastName " required />
                          <input type="email" name="email"  placeholder="Email " required />
                          <input type="password" name="password"  placeholder="Password " required />
                          <button type="submit" name="submit">create account</button>
                          <div class="closeSide">
                            <h3 id="closeSignUp">close</h3>
                          </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="page2">
            <div class="video">
                <video autoplay muted loop  src=" https://www.fourseasons.com/content/dam/fourseasons/video/FSH/FSH_festive_ambient_shorter.mp4"></video>
            </div>
            <div class="text"> 
                <h6>Our collections span the globe, offering you the chance to stay in the luxurious, beautiful, and bizarre accommodations you see on The Real Housewives. Get the gang together in the family van and prepare to squabble over who gets their own room.</h6>
            </div>
        </div>
        <div class="page3">
            <h5>browse hotels by <br>
                your favorite series</h5>
                
            <div class="location">
                <h1><a href="before_Login/Orange County.php">Orange County</a></h1>
                <h1><a href="before_Login/new-york.php">new york</a></h1>
                <h1><a href="before_Login/Atlanta.php">Atlanta</a></h1>
                <h1><a href="before_Login/New Jersey.php">New Jersey</a></h1>
                <h1><a href="before_Login/Dallas.php">Dallas</a></h1>
                <h1><a href="before_Login/Salt Lake City.php">Salt Lake City</a></h1> 
            </div> 
        </div>
        <div class="page5">
            
            <section>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </section>
            
            <section>
                <div class="img" onclick="goToFirst()"></div>
                <div class="img" onclick="goToSecond()"></div>
                <div class="img" onclick="goToThird()"></div>
                <div class="img" onclick="goToforth()"></div>
                <div class="img" onclick="goTofifh()"></div>
                <div class="img" onclick="goTosixth()"></div>
                <div class="img" onclick="goToseventh()"></div>
                <div class="img" onclick="goToeight()"></div>
                <div class="img" onclick="goTonine()"></div>
            </section>
           
            <section></section>
        </div>
        <div id="page6">
                <div class="page-text">
                    <!-- <div class="page-text-img"></div> -->
                    <h1>the real travel </h1>
                    <h4>These curated collections of popular and highly-rated travel <br> experiences offer well-organized itineraries, premium accommodations, <br> guided tours, exclusive deals, memorable moments, exceptional services, <br> personalized options, and unique destinations for all travelers</h4>
                    </div>
            <div class="cards" id="card-one">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>"Elizabeth Vargas's" Home</h1>
                    <br><h4>La Quinta, California</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                         <button> <a href="#" onclick="redirect()">explore</a></button> 
                 </div>
            </div>
            <div class="cards" id="card-two">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>"Elizabeth Vargas's" Home</h1>
                    <br><h4>La Quinta, California</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                        <button> <a href="#" onclick="redirect()">explore</a></button> 
                 </div>
            </div>
            <div class="cards" id="card-three">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>The May Fair Hotel</h1>
                    <br><h4>London, England</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                        <button> <a href="#" onclick="redirect()">explore</a></button> 
                 </div>
            </div>
        </div>
        <div class="lastPage1">
            <h1>Stay in the know</h1>
            <h3>Be the first to know about new hotels we’ve uncovered</h3>
            <form action="">
                <input type="email" name="" id="" placeholder="EMAIL ADDRESS">
                <button>&rarr;</button>
            </form>
            <div class="lastPage2">
                <div class="last-part1">
                    <div class="last-part11">
                        <h3>map</h3>
                        <h3>Series </h3>
                        <h3>About</h3>
                    </div>
                    <div class="last-part11">
                        <h3>submit</h3>
                        <h3>press</h3>
                        <h3>contact</h3>
                    </div>
                </div>
                <div class="last-part2">
                    <div class="last-part11">
                        <h3>credits</h3>
                        <h3>accessibility </h3>
                        <h3>privacy</h3>
                    </div>
                    <div class="last-part11">
                        <h3>facebook</h3>
                        <h3>instagram</h3>
                        <h3>1ax consulting</h3>
                    </div>
                </div>

            </div>
            <h5>This site features affiliate links. When you click on a link and book a trip,<br> The Real Hotels may earn a small commission at no cost to you.</h5>
        </div>
    </div>
    <script src="https://unpkg.com/split-type"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script> -->
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        let redirect = () => {
             alert('Please Sign In..!')
             //window.location.href="../index.php"
        }
    </script>
</body>
</html>

