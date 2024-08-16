<?php 

include("../config/connection.php");
error_reporting(0);
    // include_once('./includes/navbar.php');
    // include_once('./includes/restriction.php');
    // if(!(isset($_SESSION['role']))){
    //     header("Location:login.php?unauthorizedAccess");
    //   }


    if(isset($_POST['submit'])){
        $Hotel_Name = $_POST['Hotel_Name'];
        $Hotel_Address= $_POST['Hotel_Address'];
        $phoneno = $_POST['phoneno'];
        $email = $_POST['email'];
        $NumberOfRooms = $_POST['NumberOfRooms'];
        $PriceOfRoom = $_POST['PriceOfRoom'];
        $amenities = $_POST['amenities'];

        $file = $_FILES['Hotel_Image']['name'];
        $tempname = $_FILES['Hotel_Image']['tmp_name'];
        $folder = '../hotel_image/'.$file;
        move_uploaded_file( $tempname,$folder);

    //    " insert into create_hotel( Hotel_Name, Hotel_Address, PhoneNo, email, NumberOfRooms, amenities, Hotel_Image)
    //      values ('$Hotel_Name','$Hotel_Address','$phoneno','$email','$NumberOfRooms','$amenities',' $folder')";
     
        $sql = " insert into create_hotel( Hotel_Name, Hotel_Address, PhoneNo, email, NumberOfRooms, PriceOfRoom, amenities, Hotel_Image)
         values ('$Hotel_Name','$Hotel_Address','$phoneno','$email','$NumberOfRooms','$PriceOfRoom','$amenities',' $folder')";
        $result = $conn->query($sql);
     
        if($result){
           //echo "<script>alert('Your Registration succesfully..!')</script>";
           //move_uploaded_file($_FILES['package-img']['tmp_name'], "$folder");
           echo "<script>alert('New Hotel Info Add succesfully..!')</script>";
           header("Refresh:0.5; url=hotellist.php");
        }
        else{
           echo "Invalid Query..!";
        }
     
     }



 ?>
  

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hotel Creation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        .form-column {
            flex: 1;
            padding: 0 10px;
            box-sizing: border-box;
        }
        .form-column:nth-child(8) {
            flex: 1 0 100%;
        }
        .form-column label {
            display: inline-block;
            margin-bottom: 5px;
        }
        .form-column input, .form-column textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-column textarea {
            resize: vertical;
            height: 100px;
        }
        .form-row button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 23px;
            margin-left: 30px;
        }
        .form-row button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Hotel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-column">
                    <label for="hotelName">Hotel Name:</label>
                    <input type="text" id="hotelName" name="Hotel_Name" required><br>
                </div><br>
                <div class="form-column">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="Hotel_Address" required>
                </div><br>
                <div class="form-column">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" id="phoneNumber" name="phoneno" required>
                </div>
                <div class="form-column">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-column">
                    <label for="numberOfRooms">Number of Rooms:</label>
                    <input type="number" id="numberOfRooms" name="NumberOfRooms" required>
                </div>
                <div class="form-column">
                    <label for="PriceOfRoom">Price of Rooms:</label>
                    <input type="number" id="PriceOfRoom" name="PriceOfRoom" required>
                </div>

                <div class="form-column">
                    <label for="amenities">Amenities:</label>
                    <textarea id="amenities" name="amenities" required></textarea>
                </div>
                <div class="form-column">
                    <label for="hotelImage">Hotel Image:</label>
                    <input type="file" id="hotelImage" name="Hotel_Image" accept="image/*" required>
                </div>
                <div class="form-column">
                    <button type="submit" name="submit">Create Hotel</button>
                </div>
            </div>
        </form>
    </div>
    <button><a href="adminhomepage.php">Home</a></button> &nbsp;&nbsp;<button><a href="hotellist.php">Hotel List</a></button>
</body>
</html>




