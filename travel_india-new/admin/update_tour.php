<?php
include("../config/connection.php");
error_reporting(0);

if(isset($_GET['id'])){
    $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['id'];
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    if(!$data){
        echo "Invalid request..!";
        exit;
    }
}

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
    $folder = '../image/'.$file;
    move_uploaded_file($tempname, $folder);

    $sql ="UPDATE tour_package SET Package_Name='$Package_Name', Package_Type='$Package_Type', Package_Location='$Package_Location', Price='$Package_Price', Package_Features='$Package_Features', Package_Details='$Package_Details', Phone = '$phone' ,Package_Image='$folder' WHERE TourPackage_Id = " .  $_GET['id'];
    $result = $conn->query($sql);

    if($result){
        echo "<script>alert('Data updated Successfully..!')</script>";
        header("Refresh:0.5; url=tourlist.php");
    } else {
        echo "Not Updated..!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tour Package</title>
    <link rel="stylesheet" href="../css/admin/package.css">
</head>
<body>
    <div class="page1">
        <div class="nav">
            <div class="nav-part1">
                <h2>Update Package</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="adminhomepage.php">Home</a></h3>
                <h3><a href="tourlist.php">Tour List</a></h3>
            </div>
        </div>
     <div class="package">
         <div class="image-section">
        <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d0f9df776cf38143678c8_RHOC_S8E14_Four%20Seasons%20Resort%20Whistler_1-topaz-upscale-2000w.avif" alt="">      
        </div>
<div class="form-section">
                <h2>Update tour</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="display: flex; gap: 1vw;">
                    <input value="<?php echo $data['Package_Name'] ?>" type="text" name="package_name" placeholder="Create Package" autocomplete="off" required>
                    <input value="<?php echo $data['Package_Type'] ?>" type="text" name="package_type" placeholder="Package Type (Family/Couple)" required />
                    </div>
                    <input value="<?php echo $data['Package_Location'] ?>" type="text" name="Package_Location" placeholder="Package Location" required />
                    <div style="display: flex; gap: 1vw;">
                    <input value="<?php echo $data['Price'] ?>" type="number" name="Package_price" placeholder="Package price" required />
                    <input value="<?php echo $data['Package_Features'] ?>" type="text" name="package_features" placeholder="Package features..!" autocomplete="off" required>
                    </div>
                    <div style="display: flex; gap: 1vw;">
                        <input type="number" placeholder="Phone" name="phone" value="<?php echo $data['Phone'] ?>" required>
                        <input  name="package-img" type="file"  required> 
                    </div>
                    <textarea rows='4' cols='1'  name="package_details" placeholder="Package Details" required><?php echo $data['Package_Details'] ?></textarea>  
                    <input class="submitButton" type="submit" name="submit" value="Update" required />
                    </form>   
            </div>
        </div> 
    </div>
</body>
</html>

