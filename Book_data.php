<?php
  include("config/connection.php");
  error_reporting(0);

 

//  $query = "SELECT * FROM booking where user_Id = '$email'";
//  $data=mysqli_query($conn,$query);
 
//  $total=mysqli_num_rows($data);


// $query = mysqli_query($conn,"select * from users where email = '$email'");
// $row = mysqli_fetch_array($query);

// $id = $row['user_Id'];


// $Total = mysqli_query($conn,"select * from booking where user_Id = '$id'");
//$result = mysqli_num_rows($query1);




// $result=mysqli_fetch_assoc($data);




//   $user = $_SESSION['email'];
//      $query = mysqli_query($conn,"select * from users email = '$user'");
//      $row = mysqli_fetch_array($query);

//      $id = $row['user_Id'];
//      echo $id;
 
 ?>
<style>
body, h1, h2, p {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

header {
    background: #333;
    color: #fff;
    padding: 1rem;
    text-align: center;
}

header a{
    text-decoration: none;
    color: #fff;
}


  .booking-records table {
    width: 100%;
    border-collapse: collapse;
}

.booking-records th, .booking-records td {
    padding: 0.75rem;
    border: 1px solid #ddd;
    text-align: left;
}

.booking-records th {
    background: #333;
    color: #fff;
}

.booking-records tr:nth-child(even) {
    background: #f9f9f9;
}

footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 1rem;
    position: fixed;
    width: 100%;
    bottom: 0;
}

/* Responsive design */
@media (max-width: 768px) {
    .container {
        padding: 0.5rem;
    }
}
</style>
<!--contener 1-->
<!-- <div class="nevbar"><img src="/images/logo.png" alt="" width="100px" height="65px">
      <ul>
         <li><a href="adminhomepage.php">Dashboard</a></li>
         <li><a href="user_record.php">User-Records </a></li>
         <li><a href="booking.php"><span>Booking</span></a></li>
         <li><a href="contact_data.php">Contact Us</a></li>
      </ul>  
     
      <div class="btn"><mark> admin@gmail.com</mark><button><a href="login.php">Logout</a></button></div>
    </div> -->

    <header>
        <a href="homepage.php">Home</a>
        
        <!-- <a href="#">Home</a> -->
        <h1>Booking Records</h1>
    </header>

    <section class="booking-records">
            <div class="container">
                <h2>Booking Records</h2>
                <table id="recordsTable">
                    <thead>
                        <tr>
                        <!-- <th>Id</th> -->
                        <th>Package Name</th>
                        <th>User Name</th>
                        <th>Email_Id</th>
                        <th>Mobile-No</th>
                        <th>Package-Type</th>
                        <th>Tour-Date</th>
                        <th>Package-Duration</th>
                        <th>Booking-Date</th>
                        <!-- <th>Package Name</th> -->
                        <th>Package-Price</th>
                        <!-- <th>Package-Duration</th> -->
                        <!-- <th>Package-Type</th> -->
                        <!-- <th>Booking-Date</th> -->
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Records will be inserted here -->
                    </tbody>
 
                    <?php
                    // $query = mysqli_query($conn,"select * from booking where email = '$email'");
                    // $row = mysqli_fetch_array($query);
                    
                    //$id = $row['user_Id'];
                    
                    
                   // $Total = mysqli_query($conn,"select * from booking where user_Id = '$id'");

//                     if($row >0)
// {
   
//     while( $result = mysqli_fetch_assoc($row))
//     {
//           echo "<tr> 
                  
//                   <td>".$result['User_Name']."</td>
//                   <td>".$result['Email_Id']."</td>
//                   <td>".$result['Mobile_No']."</td>
//                   <td>".$result['Tour_Date']."</td>
//                   <td>".$result['Package_Name']."</td>
//                   <td>".$result['Package_Price'] ."</td>
//                   <td>".$result['Package_Duration']."</td>
//                   <td>".$result['Package_Type']."</td>
//                   <td>".$result['Booking_Date']."</td>
//                   <td style=color:red; font-weight:bold;>".$result['Status']."</td>
//                 </tr>
//                     ";
//     }
// }
// else{
//    echo "table has no records";
// }






//  //echo $total;
// if($total !=0)
// {
   
    // while( $result = mysqli_fetch_assoc())
    // {
    //       echo "<tr> 
                  
    //               <td>".$result['User_Name']."</td>
    //               <td>".$result['Email_Id']."</td>
    //               <td>".$result['Mobile_No']."</td>
    //               <td>".$result['Tour_Date']."</td>
    //               <td>".$result['Package_Name']."</td>
    //               <td>".$result['Package_Price'] ."</td>
    //               <td>".$result['Package_Duration']."</td>
    //               <td>".$result['Package_Type']."</td>
    //               <td>".$result['Booking_Date']."</td>
    //               <td style=color:red; font-weight:bold;>".$result['Status']."</td>
    //             </tr>
    //                 ";
    // }
// }
// else{
//    echo "table has no records";
// }

// ?>



<?php 
//                    $query = mysqli_query($conn,"select * from booking where email = '$email'");
                    // $row = mysqli_fetch_array($query);
                    
                    //$id = $row['user_Id'];
                    
                    
                   // $Total = mysqli_query($conn,"select * from booking where user_Id = '$id'");


                //    $query = mysqli_query($conn,"select * from booking where user_Id = '$email'");
                //    $row = mysqli_fetch_array($query);
                    
                //    $id = $row['user_Id'];
                   
                   
                //   $Total = mysqli_query($conn,"select * from booking where user_Id = '$id' ");
                   // $row = mysqli_fetch_array($query);
$user = $_SESSION["email"];

$query = mysqli_query($conn,"select * from users where email ='$user'");
 $row = mysqli_fetch_array($query);
  //print_r($row);
 $id = $row['user_Id'];

 $sql = "select * from booking where user_Id = '$id'";
 $result = $conn->query($sql);


            if(mysqli_num_rows($result) > 0){


                while($row = mysqli_fetch_assoc($result)){
           
          
           echo "<tr> 
            
                  
                                     <td>".$row['Package_Name']."</td>
                                     <td>".$row['User_Name']."</td>
                                     <td>".$row['Email_Id']."</td>
                                     <td>".$row['Mobile_No']."</td>
                                      <td>".$row['Package_Type']."</td>
                                     <td>".$row['Tour_Date']."</td>  
                                     <td>".$row['Package_Duration']."</td>
                                      <td>".$row['Booking_Date']."</td>
                                       <td>".$row['Package_Price'] ." Rs</td>
                                       <td style=color:green; font-weight:bold;>".$row['Status']."</td>


                                     
                                      ";
                                      ?>
                 
                <?php
                }
                }
                ?> 





                </table>
            </div>
        </section>

        <!-- <footer>
        <p>&copy; 2024 Booking Page. All rights reserved.</p>
    </footer> -->

   

    <!-- <table border="" cellspacing="" width="90%"> -->
       <!-- <tr> 
        <th width="5%">Id</th>
        <th width="10%">User Name</th>
        <th width="15%">Email_Id</th>
        <th width="15%">Mobile-No</th>
        <th width="15%">Tour-Date</th>
        <th width="15%">Package Name</th>
        <th width="20%">Package-Price</th>
        <th width="5%">Package-Duration</th>
        <th width="10%">Package-Type</th>
        <th width="8%">Booking-Date</th>
        <th width="15%">Status</th>
       </tr>    -->

 <?php

 //echo $total;
// if($total !=0)
// {
   
//     while( $result = mysqli_fetch_assoc($data))
//     {
//           echo "<tr> 
//                   <td>".$result['id']."</td>
//                   <td>".$result['User_Name']."</td>
//                   <td>".$result['Email_Id']."</td>
//                   <td>".$result['Mobile_No']."</td>
//                   <td>".$result['Tour_Date']."</td>
//                   <td>".$result['Package_Name']."</td>
//                   <td>".$result['Package_Price'] ."</td>
//                   <td>".$result['Package_Duration']."</td>
//                   <td>".$result['Package_Type']."</td>
//                   <td>".$result['Booking_Date']."</td>
//                   <td style=color:red; font-weight:bold;>".$result['Status']."</td>
//                 </tr>
//                     ";
//     }
// }
// else{
//    echo "table has no records";
// }

// ?>
</table>
<!-- 
id`, `user_Id`, `TourPackage_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `Tour_Date`,
 `Package_Name`, `Package_Price`, `Package_Duration`, `Package_Type`, `add_info`, `Booking_Date`, `Status` -->

<!--echo   $result['Id']." ".$result['First_Name']." ".$result['Last_Name']." ".$result['Email_Id']." ".$result['Password']." ".$result['Re_Password']." ".$result['user_type'];
      echo "<br>"; --> 