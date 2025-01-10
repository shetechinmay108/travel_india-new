<?php 
 include("../config/connection.php");
 date_default_timezone_set("Asia/Karachi");

 if(isset($_POST['verify'])){
     if(isset($_GET['code'])){
         $activation_code = $_GET['code'];
         $otp = $_POST['otp'];

         $sql = "SELECT * FROM users WHERE activation_code ='".$activation_code."'";
         $result = mysqli_query($conn, $sql);

         if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            $row_otp = $row['otp'];
            $row_signup_time = $row['created_at'] ;

            //Set time
            $row_signup_time = date('d-m-Y h:i:s', strtotime($row_signup_time));
            $row_signup_time = date_create($row_signup_time);
            date_modify($row_signup_time, "+1 minutes");
            $timeup = date_format($row_signup_time, 'd-m-Y h:i:s');

            if($row_otp !== $otp){
                echo "<script>alert('Please provide correct OTP..!')</script>";
            }
            else{
                if(date('d-m-Y h:i:s') >= $timeup){
                    echo "<script>alert('Your time is up.. try again..!')</script>";
                    header("Refresh:1; url=../index.php");
                }
                else{
                    $sqlupdate = "UPDATE users SET otp = '', status = 'active' WHERE otp = '".$otp."' AND activation_code = '".$activation_code."'";
                    $result_update = mysqli_query($conn, $sqlupdate);

                    if($result_update){
                        echo "<script>alert('Congratulation..! Your account suuccesfully Activated..!')</script>";
                        header("Refresh:1; url=../index.php");
                        // Sendemail_Verify();
                    }else{
                        echo "<script>alert('Oops..! Your account not Activated..!')</script>";

                    }

                }
            }

         }
         else{
            header("location:../index.php");
         }
     }
 }
?>
<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>user data edit</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
     <link rel="stylesheet" href="pwd_update.css">
     <style>
        @font-face {
  font-family: twl;
  src: url(/font/66bdbff11e188b5245c6ce47_TWKLausanne-400.ttf);
}
@font-face {
  font-family: regular;
  src: url(/font/66bdbfd4186d4f1e46bc84ab_Tartuffo-Regular.ttf);
}
* {
  padding: 0%;
  margin: 0%;
  box-sizing: border-box;
}
html,
body {
  height: 100%;
  width: 100%;
}

.page1 {
  background-color: #f3f1f1;
  width: 100%;
  height: 100vh;
}
.nav {
  width: 100%;
  height: 10vh;

  align-items: center;
  justify-content: space-between;
  display: flex;
  padding: 2vw 4vw;
}
.nav-part1 {
  padding: 1vh;
  font-family: regular;
  border-left: 0.2vw solid #f3f1f1;
}
.nav-part1 h2 {
  font-family: regular;
  font-weight: 400;
  text-transform: capitalize;
  font-size: 2.5vw;
}
.nav-part1 h5 {
  font-weight: 400;
  font-size: 1vw;
}
.nav h1 {
  font-family: regular;
  text-transform: capitalize;
  font-weight: 400;
  font-size: 2.5vw;
}
.nav-part2 {
  gap: 2vw;
  display: flex;
  align-items: center;
  font-family: twl;
  justify-content: space-between;
}
.nav-part2 h3 {
  font-family: twl;
  font-size: 1.5vw;
  font-weight: 400;
}
.nav-part2 a {
  text-decoration: none;
  text-transform: capitalize;
  color: black;
}
.package {
  width: 100%;
  height: 90vh;
  display: flex;
}
.image-section {
  /* flex: 1; */
  width: 50%;
  height: 90vh;

  padding: 2vw;
}

.image-section img {
  width: 100%;
  height: 100%;
  background-position: center;
  background-size: cover;
  /* filter: brightness(70%); */
  object-fit: cover;
}

.form-section {
  flex: 1;
  padding: 2vw 10vw;
  /* background-color: red; */
  width: 50%;
  height: 90vh;
  /* padding: 2vw; */
}

.form-section h2 {
  text-align: center;
  color: black;
  text-transform: capitalize;
  margin-bottom: 1vw;
  font-weight: 400;
  font-family: regular;
  font-size: 4vw;
}

.form-section form {
  display: flex;
  flex-direction: column;
  gap: 1.5vw;
  color: black;
}
.form-section input::placeholder {
  color: black;
}

.form-section form input {
  width: 100%;
  padding: 1vw;
  color: black;
  background-color: #f3f1f1;
  border: 1px solid black;
  border-radius: 0.5vw;
  font-size: 14px;
}

.form-section .submitButton {
  padding: 0.5vw;
  /* background-color: white; */
  color: black;
  border: 1px solid black;
  /* border: none; */
  border-radius: 0.5vw;
  cursor: pointer;
  font-size: 1.3vw;
}

.form-section .submitButton:hover {
  background-color: black;
  transition: 0.7s;
  color: white;
  border: 1px solid white;
  border-radius: 0.8vw;
}
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
  /* background-color: black; */
  transition: 0.7s;
  color: white;
}

     </style>
 </head>

 <body>
     <div class="page1">
         <div class="nav">
             <div class="nav-part1">
                 <h2>one time password</h2>
             </div>
             <h1>the real travel</h1>
             <div class="nav-part2">
                 <h3><a href="../index.php">Home</a></h3>
             </div>
         </div>
         <div class="package">
            <div class="image-section">
                <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66e1b22f4dd9023c1a6a5ec0_RHOD_S5E7-8__The%20Echelon_%20Vacation%20home_1.avif" alt="">
            </div>
            <div class="form-section">
                <h2>one time password (OTP)</h2>
                <form action="" method="POST">
                <input type="number" name="otp" placeholder="Enter OTP" required> 
                <button class="submitButton" id="verify" type="submit" name="verify">Verify</button>
                <h3 class="submitButton"><a href="../index.php">Back</a></h3>
            </form>  
            </div>
        </div>
   </div>
     <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
     <script>
         const locoScroll = new LocomotiveScroll({
             el: document.querySelector(".page1"),
             smooth: true,
         });
     </script>
 </body>

 </html>