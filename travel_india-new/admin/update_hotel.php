<?php
   include("../config/connection.php");
   error_reporting(0);

   if(isset($_GET['id'])){
    $sql = "select * from create_hotel where Hotel_Id = " .  $_GET['id'];
     $result = $conn->query($sql);
     $data = mysqli_fetch_assoc($result);
     if($data){
     }
 }
 else{
     echo "Invalid request..!";
     exit;
 }

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
    move_uploaded_file($tempname,$folder);

   $sql = "UPDATE create_hotel SET Hotel_Name='$Hotel_Name', Hotel_Address='$Hotel_Address',PhoneNo='$phoneno',email='$email',NumberOfRooms='$NumberOfRooms',PriceOfRoom='$PriceOfRoom',amenities='$amenities',Hotel_Image='$folder' WHERE Hotel_Id = " .  $_GET['id'];
   $result = $conn->query($sql);
   if($result){
    echo  "<script>alert('Data updated Successfully..!')</script>";
       header("Refresh:0.5; url=hotellist.php");
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
    <title>New Hotel Creation Form</title>
    <link rel="stylesheet" href="../css/admin/package.css">
</head>
<body>
    <div class="main">
        <div class="page1">
        <div class="nav">
            <div class="nav-part1">
                <h2>update hotel</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="adminhomepage.php">Home</a></h3>
                <h3><a href="hotellist.php">Hotel List</a></h3>
            </div>
        </div>
        <div class="package">
         <div class="image-section">
        <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66dad2e6debfb68190a1cfa0_RHOC_S8E10-11_Villa%20La%20Estancia%20in%20Riviera%20Nayarit_1-topaz.avif" alt="">      
        </div>
        <div class="form-section">
                    <h2>update hotel</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div style="display: flex; gap: 1vw;">
                        <input type="text" id="hotelName" name="Hotel_Name" value="<?php echo $data['Hotel_Name'] ?>" required><br>
                        <input type="text" id="address" name="Hotel_Address" value="<?php echo $data['Hotel_Address'] ?>" required>
                        </div>
                        <textarea id="amenities" name="amenities" value="<?php echo $data['amenities'] ?>" required><?php echo $data['amenities'] ?></textarea>
                        <div style="display: flex; gap: 1vw;">
                        <input type="tel" id="phoneNumber" name="phoneno" value="<?php echo $data['PhoneNo'] ?>" required>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>" required>
                        </div>
                        <div style="display: flex; gap: 1vw;">
                        <input type="number" id="numberOfRooms" name="NumberOfRooms" value="<?php echo $data['NumberOfRooms'] ?>" required>
                        <input type="number" id="PriceOfRoom" name="PriceOfRoom" value="<?php echo $data['PriceOfRoom'] ?>" required>
                        </div>
                        <input type="file" id="hotelImage" name="Hotel_Image" required>
                        <button class="submitButton" type="submit" name="submit">Update</button>
                    </form>   
                </div>
        </div>
    </div>
</body>
</html>
 