<?php
    include("../config/connection.php");

    $sql = "select * from users ";
   $result = $conn->query($sql);
   //echo $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<button style="margin-top: 10px; margin-left:10px;"><a href="../homepage.php">Back</a></button>

    <div class="profile-form-container">
        <h1>Profile Information</h1>

        <?php 
        $user = $_SESSION["email"];
    
        $query1 = mysqli_query($conn,"select * from users where email ='$user' ");
        $row = mysqli_fetch_array($query1);
       //print_r($row);
       $id = $row['user_Id'];

    //    $query2 = mysqli_query($conn,"select * from user_info where user_Id = '$id'");
    //    $data = mysqli_fetch_assoc($query2);
       //echo $id;

            // if($id->mysqli_num_rows > 0){
            //     $row = mysqli_fetch_assoc($id)
           
          ?>
        <form action="" method="post">
            <div class="form-section">
                <h2>Personal Information</h2>
                <!-- <div class="form-group">
                    <label for="first-name"></label>
                    <input type="text" id="first-name" name="id" value=" " readonly>
                </div> -->


                <!-- <div class="form-group">
                    <label for="profile-picture">Profile Picture:</label>
                    <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
                </div> -->
                <div class="form-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" value="<?php echo $row['fname']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" value="<?php echo $row['lname']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php //echo $data['DateOfBirth']; ?>">
                </div>
            </div>

            <div class="form-section">
                <h2>Contact Information</h2>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="<?php //echo $data['Mobile_No']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="3"><?php //echo $data['Address']; ?></textarea>
                </div>
            </div>

            <?php
                 // }
                 if(isset($_POST['submit'])){
                  $id = $_POST['id'];
                    // $fname = $_POST['first-name'];
                    // $lname = $_POST['last-name'];
                    $dob = $_POST['dob'];
                    // $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];

                    $sql = "insert into user_info (user_Id,DateOfBirth,Mobile_No,Address)values('$id','$dob','$phone','$address')";
                    $result = $conn->query($sql);

                    //$sql2 = "UPDATE user_info SET DateOfBirth='$dob',Mobile_No='$phone',Address='$address' WHERE user_Id= '$id'";
                    if($result){
                      echo "<script>alert('Data Saved..!')</script>";
                      header("Refresh:0.5; url=profile.php");
                      
                    }
                    else{

                    }
                 }
                
                ?> 

            <div class="form-group submit-group">
                <button type="submit" name="submit">Save Changes</button>
            </div>
        </form>


       

    </div>



    <?php

   $sql = "select * from users";
   $result=$conn->query($sql);




   //$id = $row['user_Id'];//72 is user id
   $user = $_SESSION["email"];
    
//    $query1 = mysqli_query($conn,"select * from users where email ='$user' ");
//    $row = mysqli_fetch_array($query1);
//   //print_r($row);
//   echo $password = $row['password'];


   if(isset($_POST['password'])){
    // 
    $current_pwd = $_POST['current_password'];
   // $email = $_REQUEST['email'];
    $pwd = $_POST['new_password'];
    $cpwd = $_POST['confirm_password'];

    $sql = "select password from users where email='$user'";
    $res = mysqli_query($conn,$sql);

       $row = mysqli_fetch_assoc($res);


    if($current_pwd==$row['password']){

        
         
        if($cpwd == ''){
            //$error[] = 'Please confirm the password..!';
            echo "<script>alert('Please enter the confirm password..!')</script>";
            
        }
        else if($pwd != $cpwd){
           // $error[] = 'passwords do not match..!';
           echo "<script>alert('passwords do not match..!')</script>";
           
        }

        else if($pwd == $cpwd){
              $update = mysqli_query($conn,"update users set password = '$pwd' where email = '$user'");
              if($update){
                   echo "<script>alert('Password changed Succesfully..!')</script>";
              }
        }
    }
    else{
        echo "<script>alert('Correct Password does not match..!')</script>";
    }
    // if(!isset($)){
    //     $update = mysqli_query($conn,"update users set password = '$pwd' where email = '$user'");
    //    // $result = mysqli_query($conn,$update);
         
    //     if($update){
    //         echo "<script>alert('Password changed Succesfully..!')</script>";
    //     }
         
    // }


    



    

//   if($pwd == $cpwd){
//     $reset_pwd = mysqli_query($conn, "UPDATE users SET password ='$pwd' WHERE email = '$email'");

//     if($reset_pwd > 0){
//         echo  "<script>alert('New Password Successfully Updated..!')</script>";  
//         header("Refresh:1; url=index.php");
//     }
//     else{
//         echo  "<script>alert(' Password Not Updated..!')</script>"; 
//     }

//   }
}

 
   ?>

    <div class="profile-form-container">
        <h2>Change Password</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="current-password" class="form-group">Current Password:</label>
                <input type="password" id="current-password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm_password">
            </div>
            
            <div class="form-group submit-group">
                <button type="submit" name="password">Change Password</button>
            </div>

            
        </form>
    </div>
</body>
</html>
