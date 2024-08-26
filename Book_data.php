<?php
  include("config/connection.php");
  error_reporting(0);

 
 
 
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
 

    <header>
        <a href="homepage.php">Home</a>
        
        <!-- <a href="#">Home</a> -->
        <h1>Booking Records</h1>
    </header>

    <section class="booking-records">
            <div class="container">
                <h2>Tour Records</h2>
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
                     
// }

// ?>



<?php 
 
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





                </table><br>


                
                <h2>Hotel Records</h2>
                <table id="recordsTable">
                    <thead>
                        <tr>
                        <!-- <th>Id</th> -->
                        <th>Hotel Name</th>
                        <th>User Name</th>
                        <th>Email_Id</th>
                        <th>Mobile-No</th>
                        <th>Hotel Address</th>
                        <th>Staying_Date</th>
                        <th>Duration</th>
                        <th>Booking-Date</th>
                        <!-- <th>Package Name</th> -->
                        <th>Hotel-Price</th>
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

$user = $_SESSION["email"];

$query = mysqli_query($conn,"select * from users where email ='$user'");
 $row = mysqli_fetch_array($query);
  //print_r($row);
 $id = $row['user_Id'];

 $sql = "select * from hotel_booking where user_Id = '$id'";
 $result = $conn->query($sql);


            if(mysqli_num_rows($result) > 0){


                while($row = mysqli_fetch_assoc($result)){
           
          
           echo "<tr> 
            
                  
                                     <td>".$row['Hotel_Name']."</td>
                                     <td>".$row['User_Name']."</td>
                                     <td>".$row['Email_Id']."</td>
                                     <td>".$row['Mobile_No']."</td>
                                      <td>".$row['Hotel_Address']."</td>
                                     <td>".$row['date']."</td>  
                                     <td>".$row['Duration']."</td>
                                      <td>".$row['created_booking']."</td>
                                       <td>".$row['Price'] ." Rs</td>
                                       <td style=color:green; font-weight:bold;>".$row['Status']."</td>


                                     
                                      ";
                                      ?>
                 
                <?php
                }
                }
                ?> 

            </div>
        </section>

       

 <?php

 

// ?>
</table>
 