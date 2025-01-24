<?php
   include("../config/connection.php");
   //include("../config/");
   //include("config/user_auth_acces.php");
   error_reporting(0);

   $sql = "select * from tour_package ";
   $result = $conn->query($sql);


   
  ///*******Delete operation in this page ********* */
  if(isset($_GET['ID'])){
    extract($_GET);
       $sql = "DELETE FROM tour_package WHERE TourPackage_Id = " . $_GET['ID'];
       $Result = $conn->query($sql);
       if($Result){

        echo  "<script>alert('Data Deleted Successfully..!')</script>";
       
        // header("location:tourlist.php");
         header("Refresh:0.5; url=../Lakshadweep/tourlist.php");
        //echo"data has been deleted..!";
         // echo  "<script>alert('Are you sure..!')</script>";
          //header("location:tourlist.php");
      }
      else{
          echo "Not  Deleted..!";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Authentication/pwd_update.css">
</head>
<body>
   <div class="page1">
    <div class="nav">
        <div class="nav-part1">
            <h5>Curated hotels from <br> The Real Housewives</h5>
        </div>
        <h1>the real travel</h1>
        <div class="nav-part2">
            <h3><a href="../admin/adminhomepage.php">Home</a></h3>
            <h3><a href="../Lakshadweep/tourlist.php">hotels</a></h3>
            <h3><a href="../Lakshadweep/tourlist.php">package</a></h3>
        </div>
    </div>

    
 <?php 
    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
   
  ?>
    <div class="middle4">
        <div class="booking">
            <div class="book-part1">
                <img src="<?php echo $row['Package_Image']; ?>" alt="img">
            </div>
            <div class="book-part2">
                <h2><?php echo $row['Package_Name']; ?></h2>
                <h4>Guerneville, California</h4>
            </div>
            <div class="book-part3"> 
                <h5><?php echo $row['Package_Features']; ?>....</h5>
            </div>
            <div class="book-part4"> 
                <button><a href="update_tour.php?id=<?php echo $row['TourPackage_Id'] ?>">Update</a> </button>
                <button><a href="tourlist.php?ID=<?php echo $row['TourPackage_Id'] ?>">Delete</a></button>
            </div>
        </div>
    </div>
    <?php
          }
        }
        ?> 
</div>
</body>
</html>