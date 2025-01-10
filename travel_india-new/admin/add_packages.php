<?php 
include("../config/connection.php");
error_reporting(0);

if(isset($_POST['submit'])){
    $Package_Name = $_POST['package_name'];
    $Package_Type = $_POST['package_type'];
    $Package_Location = $_POST['Package_Location'];
    $Package_Price = $_POST['Package_price'];
    $Package_Features = $_POST['package_features'];
    $Package_Details = $_POST['package_details'];
    $phone = $_POST['phone'];

    $file = $_FILES['package-img']['name'];
    $tempname = $_FILES['package-img']['tmp_name'];
   // $folder = '../image/'.$file;
    $folder = '../image/'.$file;
    move_uploaded_file( $tempname,$folder);

    $sql = "insert into tour_package(Package_Name, Package_Type, Package_Location, Price, Package_Features, Package_Details, Phone ,Package_Image) values 
    ('$Package_Name', '$Package_Type', '$Package_Location', '$Package_Price', '$Package_Features', '$Package_Details', '$phone' , '$folder')";
    $result = $conn->query($sql);

    if($result){
        echo "<script>alert('New Tour Package Add successfully..!')</script>";
        header("Refresh:0.5; url=tourlist.php");
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
    <title>Create Tour Package</title>
    <link rel="stylesheet" href="../css/admin/package.css">
</head>
<body>
    <div class="page1">
        <div class="nav">
            <div class="nav-part1">
                <h2>package Development</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="adminhomepage.php">Home</a></h3>
                <h3><a href="tourlist.php">Tour List</a></h3>
            </div>
        </div>
     <div class="package">
         <div class="image-section">
        <img src="https://cdn.prod.website-files.com/67192adf47c16a59cea7d889/671e9a69b6f7a79d7cd46049_1.avif" alt="">      
        </div>
            <div class="form-section">
                <h2>create package</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="display: flex; gap: 1vw;">
                        <input type="text" name="package_name" placeholder="Package Name" required>
                        <input type="text" name="package_type" placeholder="Package Type (Family/Couple)" required>
                    </div>
                    <input type="text" name="Package_Location" placeholder="Package Location" required>
                    <div style="display: flex; gap: 1vw;">
                        <input type="number" name="Package_price" placeholder="Package Price" required>
                        <input type="text" name="package_features" placeholder="Package Features" required>
                    </div>
                    <div style="display: flex; gap: 1vw;">
                        <input type="number" placeholder="phone" name="phone" required>
                        <input  type="file" name="package-img" required>
                    </div>
                    <textarea name="package_details" placeholder="Package Details" rows="4" required></textarea>
                    <input class="submitButton" type="submit" name="submit" value="Create">
                </form>   
            </div>
        </div> 
    </div>
</body>
</html>
