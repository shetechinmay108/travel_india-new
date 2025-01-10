<?php

include("../config/connection.php");
error_reporting(0);
if (isset($_POST['submit'])) {
    $Hotel_Name = $_POST['Hotel_Name'];
    $Hotel_Address = $_POST['Hotel_Address'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $NumberOfRooms = $_POST['NumberOfRooms'];
    $PriceOfRoom = $_POST['PriceOfRoom'];
    $amenities = $_POST['amenities'];

    $file = $_FILES['Hotel_Image']['name'];
    $tempname = $_FILES['Hotel_Image']['tmp_name'];
    $folder = '../hotel_image/' . $file;
    move_uploaded_file($tempname, $folder);
    $sql = " insert into create_hotel( Hotel_Name, Hotel_Address, PhoneNo, email, NumberOfRooms, PriceOfRoom, amenities, Hotel_Image)
         values ('$Hotel_Name','$Hotel_Address','$phoneno','$email','$NumberOfRooms','$PriceOfRoom','$amenities',' $folder')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('New Hotel Info Add succesfully..!')</script>";
        header("Refresh:0.5; url=hotellist.php");
    } else {
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
    <link rel="stylesheet" href="../css/admin/package.css">
</head>

<body>
    <div class="main">
        <div class="page1">
            <div class="nav">
                <div class="nav-part1">
                    <h2>Hotel Development</h2>
                </div>
                <h1>the real travel</h1>
                <div class="nav-part2">
                    <h3><a href="adminhomepage.php">Home</a></h3>
                    <h3><a href="hotellist.php">Hotel List</a></h3>
                </div>
            </div>
            <div class="package">
                <div class="image-section">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66dae11e74eaeb43808aa4e0_RHOC_S14E17-19_Parrot%20Key%20Hotel%20%26%20Villas_1-topaz.avif" alt="">
                </div>
                <div class="form-section">
                    <h2>create hotel</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div style="display: flex; gap: 1vw;">
                            <input type="text" id="hotelName" name="Hotel_Name" placeholder="hotel name" required>
                            <input type="text" id="address" name="Hotel_Address" placeholder="hotel address" required>
                        </div>
                        <textarea id="amenities" name="amenities" placeholder="amenities" required></textarea>
                        <div style="display: flex; gap: 1vw;">
                            <input type="tel" id="phoneNumber" name="phoneno" placeholder="phone number" required>
                            <input type="email" id="email" name="email" placeholder="enter email" required>
                        </div>
                        <div style="display: flex; gap: 1vw;">
                            <input type="number" id="numberOfRooms" name="NumberOfRooms" placeholder="number of rooms" required>
                            <input type="number" id="PriceOfRoom" name="PriceOfRoom" placeholder="price" required>
                        </div>
                        <input type="file" id="hotelImage" name="Hotel_Image" accept="image/*" placeholder="hotel image" required>
                        <button class="submitButton" type="submit" name="submit">Create Hotel</button>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>