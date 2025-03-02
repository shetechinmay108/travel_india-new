<?php 
include("../config/connection.php");
error_reporting(0);

if(isset($_POST['submit'])) {
    // Get user input
    $Package_Name = $_POST['package_name'];
    $Package_Type = $_POST['package_type'];
    $Package_Location = $_POST['Package_Location'];
    $Package_Price = $_POST['Package_price'];
    $Package_Features = $_POST['package_features'];
    $Package_Details = $_POST['package_details'];
    $phone = $_POST['phone'];

    // File upload handling
    $file = $_FILES['package-img']['name'];
        $tempname = $_FILES['package-img']['tmp_name'];
       // $folder = '../image/'.$file;
        $folder = '../image/'.$file;
        // move_uploaded_file( $tempname,$folder);
    // $file = $_FILES['package-img']['name'];
    // $tempname = $_FILES['package-img']['tmp_name'];
    // $folder = "uploads/" . basename($file); // Store files in 'uploads/' folder

    if(move_uploaded_file($tempname, $folder)) {
        // Prepare SQL query
        $sql = "INSERT INTO tour_package (Package_Name, Package_Type, Package_Location, Price, Package_Features, Package_Details, Phone, Package_Image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $Package_Name, $Package_Type, $Package_Location, $Package_Price, $Package_Features, $Package_Details, $phone, $folder);

        if($stmt->execute()) {
            echo "<script>alert('New Tour Package Added Successfully!');</script>";
            header("Refresh:0.5; url=tourlist.php");
            exit;
        } else {
            echo "<script>alert('Error inserting data.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('File upload failed.');</script>";
    }
}

$conn->close();
?>

<?php

// if(isset($_POST['submit'])){
//     $Package_Name = $_POST['package_name'];
//     $Package_Type = $_POST['package_type'];
//     $Package_Location = $_POST['Package_Location'];
//     $Package_Price = $_POST['Package_price'];
//     $Package_Features = $_POST['package_features'];
//     $Package_Details = $_POST['package_details'];
//     $phone = $_POST['phone'];

//     $file = $_FILES['package-img']['name'];
//     $tempname = $_FILES['package-img']['tmp_name'];
//    // $folder = '../image/'.$file;
//     $folder = '../image/'.$file;
//     move_uploaded_file( $tempname,$folder);

//     $sql = "insert into tour_package(Package_Name, Package_Type, Package_Location, Price, Package_Features, Package_Details, Phone ,Package_Image) values 
//     ('$Package_Name', '$Package_Type', '$Package_Location', '$Package_Price', '$Package_Features', '$Package_Details', '$phone' , '$folder')";
//     $result = $conn->query($sql);

//     if($result){
//         echo "<script>alert('New Tour Package Add successfully..!')</script>";
//         header("Refresh:0.5; url=tourlist.php");
//     } else {
//         echo "Invalid Query..!";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" href="../css/admin/hotel.css">
</head> 
<body>
    <div class="signUpPage">
        <div class="nav">
          <div class="nav-part2">

          <h3 class="closeSignUp" style="align-items: center; justify-content: center; display: flex;">
              <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="1.2vw" viewBox="0 0 24 24">
                  <path fill="white" fill-rule="evenodd" d="M11.708 19.273a.686.686 0 0 0-.05-.966l-6.121-5.55h14.71c.416 0 .753-.338.753-.756a.755.755 0 0 0-.752-.758H5.53l6.129-5.548a.69.69 0 0 0 .05-.969.676.676 0 0 0-.961-.05l-7.522 6.812a.69.69 0 0 0 0 1.017l7.52 6.82c.28.252.71.23.962-.052Z"></path>
              </svg>
              <a href="adminhomepage.php">To go Back</a></h3>
              <h3><a href="tourlist.php">Tour List</a></h3>
          </div>
          <div class="nav-part1">
             <h3>est-2024</h3>
          </div>
        </div>
        <hr class="animated-hr" />
        <div class="signUpPage-part1"> 
          <div class="signUpPage-part11">
            <h3>Build package</h3>
            <div class="signUpPage-bottom">
              <h1>Start <br> Your <br> Journey</h1>
            </div>
    
          </div>
          <div class="container"> 
            <form action="" method="POST" enctype="multipart/form-data">
              <label for="activity" class="required">Package Name</label>
              <input type="text" name="package_name" placeholder="Package Name" required>
    
              <label for="activity" class="required">Package Type</label>
              <input type="text" name="package_type" placeholder="Package Type (Family/Couple)" required>
    
              <label for="activity" class="required">Package Location</label>
              <input type="text" name="Package_Location" placeholder="Package Location" required>
               
              <label for="activity" class="required">Package Price</label>
              <input type="number" name="Package_price" placeholder="Package Price" required>

              <label for="activity" class="required">Package Features</label>
              <input type="text" name="package_features" placeholder="Package Features" required>

              <label for="activity" class="required">Phone No</label>
              <input type="number" placeholder="phone" name="phone" required>
                  
              <label for="activity" class="required">Package Image</label>
              <input  type="file" name="package-img" required>
                 
              <label for="activity" class="required">Package Details</label>
              <textarea name="package_details" placeholder="Package Details" rows="4" required></textarea> 
                      
              <input class="button-part1" type="submit" name="submit" value="Create">
      
            </form>
 
          </div> 
        </div>
      </div>
</body>
</html> 