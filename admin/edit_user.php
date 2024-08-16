<?php
   include("../config/connection.php");
   error_reporting(0);




   //step 1 => Get users data by users id

   if(isset($_GET['id'])){
    $sql = "select * from users where user_Id = " .  $_GET['id'];
     $result = $conn->query($sql);
     // echo"<pre>";
     // print_r($result);
     $users = mysqli_fetch_assoc($result);
     // echo "<pre>";
     // print_r($users);
     if($users){
         //echo "Data collected successes..!";
     }
 }
 else{
     echo "Invalid request..!";
     exit;
 }


 //step 2 => update user data by from submit
      

 
 
 if(isset($_POST['submit'])){
       // extract($_POST);    

       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $email = $_POST['email'];

     //$sql=  "update stdinfo set name ='$name', number = '$number', address='$address' where id = ".$_POST['id'];
     $sql ="UPDATE users SET fname='$fname', lname='$lname',email='$email' where user_Id = ".$_GET['id'] ; 
   
       $result = $conn->query($sql);
  
       if($result){
        echo  "<script>alert('Data Updated Successfully..!')</script>";
          
        header("Refresh:0.5; url=user_data.php");
       }
       else{
           echo "Not Updated..!";
       }
     }     


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="  " method="post">
        <div class="signin">
           
               <i class="ri-close-circle-fill"></i>
             <div class="signin-part1">
               <h1>Edit User Data</h1>
               <input
                 type="text"
                 name="fname"
                 placeholder="FirstName . . . . . ." required value="<?php echo $users['fname'] ?>"
               /><br /><br />
               <input
                 type="text"
                 name="lname"
                 placeholder="LastName . . . . . ." required value="<?php echo $users['lname'] ?>"
               /><br /><br />
               <input
                 type="email"
                 name="email"
                 placeholder="Email . . . . . ." required value="<?php echo $users['email'] ?>"
               /><br /><br />
                
                
               <!-- //<button id="login_part12">Login in</button> -->
               <button type="submit" name="submit">update</button> <button> <a href="user_data.php">Back</a></button>
               <!-- <button id="Cancel">Cancel</button> -->
              </div>

           
        </div>
        </form>
</body>
</html>



 