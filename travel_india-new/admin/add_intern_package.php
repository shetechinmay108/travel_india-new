<?php
include("../config/connection.php");
// error_reporting(0);

// if (isset($_POST['submit'])) {
//     // Sanitize and validate input data
//     $Package_Name = htmlspecialchars(trim($_POST['package_name']));
//     $Package_Type = htmlspecialchars(trim($_POST['package_type']));
//     $Package_Location = htmlspecialchars(trim($_POST['Package_Location']));
//     $Package_Price = filter_var($_POST['Package_price'], FILTER_VALIDATE_FLOAT);
//     $Package_Features = ($_POST['package_features']);
//     $Package_Details = htmlspecialchars(trim($_POST['package_details']));
//     $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
//     $city = htmlspecialchars(trim($_POST['city']));
    
//     // Handle file upload
//     $file = $_FILES['package-img']['name'];
//     $tempname = $_FILES['package-img']['tmp_name'];
//     $uploadDir = '../International/intern_image/';
//     $uploadPath = $uploadDir . basename($file);
    
//     // Validate file type and upload
//     $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
//     $fileType = pathinfo($file, PATHINFO_EXTENSION);
//     if (in_array(strtolower($fileType), $allowedTypes)) {
//         if (move_uploaded_file($tempname, $uploadPath)) {
//             // Prepare and execute SQL query
//             $stmt = $conn->prepare("INSERT INTO create_intern_package (Package_Name, Package_Type, Package_Location, Price, Package_Feature, Package_Details, Phone, Package_Image, City, Package_Details) 
//                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
           
           
           
//             $stmt->bind_param("sssdsisss", $Package_Name, $Package_Type, $Package_Location, $Package_Price, $Package_Features, $phone, $uploadPath, $city, $Package_Details);

//             if ($stmt->execute()) {
//                 echo "<script>alert('International Tour Package added successfully!')</script>";
//                 header("Refresh:0.5; url=../adminhomepage.php");
//             } else {
//                 echo "<script>alert('Error: Could not insert data.')</script>";
//             }
//             $stmt->close();
//         } else {
//             echo "<script>alert('Error: Failed to upload image.')</script>";
//         }
//     } else {
//         echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.')</script>";
//     }
// }

// $conn->close();
?>














<?php 
//  include("../../config/connection.php");
//  //include("../International/intern_image/");
  

//  error_reporting(0);
 


//  if(isset($_POST['submit'])){
//      $Package_Name = $_POST['package_name'];
//      $Package_Type = $_POST['package_type'];
//      $Package_Location = $_POST['Package_Location'];
//      $Package_Price = $_POST['Package_price'];
//      $Package_Features = $_POST['package_features'];
//      $Package_Details = $_POST['package_details'];
//      $phone = $_POST['phone'];
//      $city = $_POST['city'];
    
//     $file = $_FILES['package-img']['name'];
//     $tempname = $_FILES['package-img']['tmp_name'];
//     $folder = '../image/'.$file;
//     //$folder = '../intern_image/' . $file;
//     move_uploaded_file( $tempname,$folder);


//     $sql = "INSERT INTO create_intern_package( Package_Name, Package_Type, Package_Location, Price, Package_Feature, Phone, Package_Image, City, Package_Details) VALUES 
//     ('$Package_Name', '$Package_Type', '$Package_Location', '$Package_Price', '$Package_Features', '$phone', '$folder', '$city',' $Package_Details')";



    
// //      // $query = mysqli_query($conn, "select * from city where City_Name ='$city'");
// // //     // $row = mysqli_fetch_array($query); 
// //      // $City_Id = $row['City_Id'];

// //      $sql = "INSERT INTO create_intern_package(Package_Name, Package_Type, Package_Location, Price, Package_Feature, Package_Details, Phone, Package_Image, City) VALUES 
// //      ('$Package_Name', '$Package_Type', '$Package_Location', '$Package_Price', '$Package_Features', '$Package_Details', '$phone' , '$folder' , '$city')";

//      $result = $conn->query($sql);

//      if($result){
//          echo "<script>alert('International Tour Package Add successfully..!')</script>";
//          header("Refresh:0.5; url=../adminhomepage.php");
//      } else {
//          echo "Invalid Query..!";
//      }
//  }















// Suppress error reporting (not recommended in production)
error_reporting(0);

// Include database connection
//include('db_connection.php'); // Make sure this file contains your database connection setup.

if (isset($_POST['submit'])) {
    // Retrieve form data
    $Package_Name = $_POST['package_name'];
    $Package_Type = $_POST['package_type'];
    $Package_Location = $_POST['Package_Location'];
    $Package_Price = $_POST['Package_price'];
    $Package_Features = $_POST['package_features'];
    $Package_Details = $_POST['package_details'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    // Handle file upload
    $file = $_FILES['package-img']['name'];
    $tempname = $_FILES['package-img']['tmp_name'];
    $folder = "../image/" . $file;

    // Check if file upload is successful
    if (move_uploaded_file($tempname, $folder)) {
        // Insert data into the database
        $sql = "INSERT INTO create_intern_package 
                (Package_Name, Package_Type, Package_Location, Price, Package_Feature, Phone, Package_Image, City, Package_Details) 
                VALUES 
                ('$Package_Name', '$Package_Type', '$Package_Location', '$Package_Price', '$Package_Features', '$phone', '$folder', '$city', '$Package_Details')";

        // Execute query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('International Tour Package added successfully!')</script>";
            header("Refresh: 0.5; url=adminhomepage.php");
        } else {
            echo "<script>alert('Database insertion failed: " . $conn->error . "')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.')</script>";
    }
}
?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tour Package</title>
    <link rel="stylesheet" href="add_intern_package.css">
</head>
<body>
    <div class="container">
        <nav class="nav">
            <div class="nav-part1">
                <h2>Package Development</h2>
            </div>
            <h1>The Real Travel</h1>
            <div class="nav-part2">
                <h3><a href="adminhomepage.php">Home</a></h3>
                <h3><a href="International_tourlist.php">Tour List</a></h3>
            </div>
        </nav>

        <div class="package-form">
            <div class="image-section">
                <img src="https://cdn.prod.website-files.com/67192adf47c16a59cea7d889/671e9a69b6f7a79d7cd46049_1.avif" alt="Tour Image">
            </div>
            <div class="form-section">
                <h2>Create International Package</h2>







                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="text" name="package_name" placeholder="Package Name" required>
                        <input type="text" name="package_type" placeholder="Package Type (Family/Couple)" required>
                        <input type="text" name="Package_Location" placeholder="Package Location" required>
                    </div>

                    <div class="input-group">
                        <input type="number" name="Package_price" placeholder="Package Price" required>
                        <input type="text" name="package_features" placeholder="Package Features" required>
                    </div>

                    <div class="input-group">
                        <input type="number" placeholder="phone" name="phone" required>
                        <input type="file" name="package-img" required>
                    </div>

                    <div class="select-group">
                        <label for="city">Select City:</label>
                        <select name="city" id="city" required>
                            <option value="" disabled selected>Select a City</option>
                            <option value="Orange County">Orange County</option>
                            <option value="New York">New York</option>
                            <option value="Atlanta">Atlanta</option>
                            <option value="New Jersey">New Jersey</option>
                            <option value="Dallas">Dallas</option>
                            <option value="Salt Lake City">Salt Lake City</option>
                        </select> 
                    </div>

                    <div class="input-group">
                        <input type="text" name="package_details" placeholder="Package Details" required>     
                    </div>
                    <input class="submitButton" type="submit" name="submit" value="Create">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
