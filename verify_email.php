<?php
include("config/connection.php");
error_reporting();
session_start();

//echo "<script>alert('Verification Failed..!')</script>";
echo "Your Email account is verified..!";



if(isset($_GET['email']) && isset($_GET['verify_token']))
{
  $email_id = $_GET['email'];
  $token = $_GET['verify_token'];
   

  $check = "SELECT * FROM users WHERE email='$email_id' AND verify_token='$token'";
  $result = $conn->query($check);

  if($result){
    echo"connected";
    $verify_query = "SELECT * FROM users WHERE verify_token='$token'";
    $verify_query_run = $conn->query($verify_query);
  echo"connected";
  }
//     if(mysqli_num_rows($result) == 1)
//           {
//              $row = mysqli_fetch_array($result);
//              //echo $row['verify_token'];
                     
//              if($row['status'] == 0)
//              {
//                // $clicked_token = $row['verify_token'];
//                 $update_query = "UPDATE users SET status= 1 WHERE email='$_GET[email]' ";
                
      
//                 if( $conn->query($update_query))
//                 {
//                   echo "Your Email account is verified..!";
//                   // echo "<script>alert('Your account has been Verified Successfully...!')</script>";
//                   // header('location:login.php');
//                   //$_SESSION['status'] = "Your account has been Verified Successfully...!";
//                   //header('location:index.php');
//                  // exit(0);
//                 }
      
//                 else{
                  
//                   echo "<script>alert('Verification Failed..!')</script>"; 
//                  // $_SESSION['status'] = "Verification Failed..!";
//                  // header('location:index.php');
//                  // exit(0);
//                 }
//                }
//           }
//     //echo "data selected..!";
//         }
}




// // $email_id = $_GET['email'];
// // $token = $_GET['verify_token'];

// if(isset($_GET['email']) && isset($_GET['verify_token']))
// {
//    $email_id = $_GET['email'];
//    $verify_tokennn = $_GET['verify_token'];
  

//     $check = "SELECT * FROM users WHERE email='$email_id' AND verify_token='$verify_token'";

//     $result =  mysqli_query($conn,$check);

//     if($result)
//     {

//      // $verify_query = "SELECT * FROM users WHERE verify_token='$_GET[token]'";
//          // $verify_query_run = $conn->query($verify_query);
      
      
          
//           if(mysqli_num_rows($result) == 1)
//           {
//              $row = mysqli_fetch_array($result);
//              //echo $row['verify_token'];
      
//              if($row['status'] == 0)
//              {
//                // $clicked_token = $row['verify_token'];
//                 $update_query = "UPDATE users SET status= 1 WHERE email='$_GET[email]' ";
                
      
//                 if( $conn->query($update_query))
//                 {
//                   echo "Your Email account is verified..!";
//                   // echo "<script>alert('Your account has been Verified Successfully...!')</script>";
//                   // header('location:login.php');
//                   //$_SESSION['status'] = "Your account has been Verified Successfully...!";
//                   //header('location:index.php');
//                  // exit(0);
//                 }
      
//                 else{
                  
//                   echo "<script>alert('Verification Failed..!')</script>"; 
//                  // $_SESSION['status'] = "Verification Failed..!";
//                  // header('location:index.php');
//                  // exit(0);
//                 }
//                }
//           }
      
      
      
      















//         // if(mysqli_num_rows($result) > 0){
//         //     $row = mysqli_fetch_assoc($result);

//         //     if($row['status']==0)
//         //     {
//         //        $update = "UPDATE users SET status ='1' WHERE email = '$email_id'";
//         //        $result = $conn->query($update);
//         //        if($result){
//         //         echo "Your Email account is verified..!";
//         //         //echo "<script>alert('Your account has been Verified Successfully...!')</script>";
//         //         //header('refresh:0; url=login.php');
//         //         //header("location:login.php");
//         //        }

//         //        else
//         //        {
//         //          echo "<script>alert('Server down..!')</script>";
//         //        }           


//         //     }
//         //     else
//         //     {
//         //       echo "<script>alert('Email Already Verify..!')</script>";
//         //      // header('refresh:0; url=login.php'); 
//         //      header("location:login.php");
//         //     }
//         // }
//     }
//     else
//     {
//       echo "<script>alert('Server down..!')</script>";
//     }
// }


















// if(isset($_GET['verify_token'])){
//    // $token = $_GET['token'];
//    $token = $_GET['verify_token'];
//    $fname = $_GET['fname'];
//    $email = $_GET['email'];

//    echo $_GET['fname'];
//    echo $_GET['email'];
//    echo $_GET['verify_token'];


//     $verify_query = "SELECT * FROM users WHERE verify_token='$token' ";
//     $result = $conn->query($verify_query);
//     if( mysqli_num_rows($result) == 1){
//        {
//         echo "data selected";
      
//     }
//   }


    
//     if(mysqli_num_rows($verify_query_run) == 1)
//     {

//        $row = mysqli_fetch_array($verify_query_run);
//        //echo $row['verify_token'];

//        if($row['status'] == 0)
//        {
//          // $clicked_token = $row['verify_token'];
//           $update_query = "UPDATE 'users' SET 'status'='1' WHERE 'verify_token'='$token' ";
          

//           if( $conn->query($update_query))
//           {
            
//             echo "<script>alert('Your account has been Verified Successfully...!')</script>";
//             header('location:login.php');
//             //$_SESSION['status'] = "Your account has been Verified Successfully...!";
//             //header('location:index.php');
//            // exit(0);
//           }

//           else{
            
//             echo "<script>alert('Verification Failed..!')</script>"; 
//            // $_SESSION['status'] = "Verification Failed..!";
//            // header('location:index.php');
//            // exit(0);
//           }
//          }
//     }











// }
// else{
//    echo "<script>alert('This token does not Exists..!')</script>"; 
// //       // $_SESSION['status'] = "This token does not Exists..!";
// //        //header('location:index.php');
//   // header('location:login.php');

 //}




?>












<?php

//     if(mysqli_num_rows($verify_query_run) > 0)
//     {
//        $row = mysqli_fetch_array($verify_query_run);
//        //echo $row['verify_token'];

//        if($row['status'] == "Inactive")
//        {
//           $clicked_token = $row['verify_token'];
//           $update_query = "UPDATE users SET status='1' WHERE verify_token='$clicked_token' ";
//           $update_query_run = $conn->query($update_query);

//           if($update_query_run)
//           {
//             header('location:login.php');
//             echo "<script>alert('Your account has been Verified Successfully...!')</script>";
//             //$_SESSION['status'] = "Your account has been Verified Successfully...!";
//             //header('location:index.php');
//            // exit(0);
//           }

//           else{
            
//             echo "<script>alert('Verification Failed..!')</script>"; 
//            // $_SESSION['status'] = "Verification Failed..!";
//            // header('location:index.php');
//            // exit(0);
//           }


//        }
//        else
//        {
//          echo "<script>alert('Email already verified . Please Login.!')</script>"; 
//           //$_SESSION['status'] = "Email already verified . Please Login.!";
//          // header('location:index.php');
//          // exit(0);
//        }


//     }
//     else
//     {
//       echo "<script>alert('This token does not Exists..!')</script>"; 
//       // $_SESSION['status'] = "This token does not Exists..!";
//        //header('location:index.php');
//     }

// }
// else{
//  // $_SESSION['status']="Not allowed..!";
//  // header('location:index.php');
// }
//   //echo "Email Verified..!"


// ?>