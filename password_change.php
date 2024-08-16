<?php
include("config/connection.php");
   echo "hello harsh";
  // echo $_GET['email'];
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
<form action="password_reset.php" method="POST">
       
          
           <div class="login" id="login"   >
               <i class="ri-close-line"></i>
              <div class="login-part1">
                 <h1>Change Password</h1>
                 <input
                   type="hidden"
                   name="activation_code"
                  value="<?php if(isset($_GET['activation_code'])) {echo $_GET['activation_code']; }?>" required
                  />
                 <input
                   type="email"
                   name="email"
                  placeholder="email . . . . ." 
                  value="<?php if(isset($_GET['email'])) {echo $_GET['email']; }?>" required
                  /><br /><br />
                 <input
                   type="password"
                   name="new_password"
                  placeholder="Enter New Password . . . . . ." required
                 /><br /><br />
                 <input
                   type="password"
                   name="cpassword"
                  placeholder="Enter Confirm Password . . . . . ." required
                 /><br /><br />
                 <button type="submit" name="update_password">Update Password</button>
                  
                  
              </div>
           </div>
        </form>
</body>
</html>