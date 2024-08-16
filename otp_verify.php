<?php 
 //include("config/alert.php");  
 include("config/connection.php");
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
                    header("Refresh:1; url=index.php");
                }
                else{
                    $sqlupdate = "UPDATE users SET otp = '', status = 'active' WHERE otp = '".$otp."' AND activation_code = '".$activation_code."'";
                    $result_update = mysqli_query($conn, $sqlupdate);

                    if($result_update){
                        echo "<script>alert('Congratulation..! Your account suuccesfully Activated..!')</script>";
                        header("Refresh:1; url=index.php");
                    }else{
                        echo "<script>alert('Oops..! Your account not Activated..!')</script>";

                    }

                }
            }

         }
         else{
            header("location:index.php");
         }
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
<form action="" method="POST">
       
          
           <div class="login" id="login"   >
               <i class="ri-close-line"></i>
              <div class="login-part1">
                 <h1>Otp Verify</h1>
                 <input
                   type="int"
                   name="otp"
                  placeholder="enter otp . . . . ." required
                   
                 /><br /><br />
                 <button type="submit" name="verify">Verify</button><br><br>
                 <a href="#">Resend</a> OTP..!
                  
                  
              </div>
           </div>
        </form>
</body>
</html>