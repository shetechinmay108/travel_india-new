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
         header("Refresh:0.5; url=tourlist.php");
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
    <title>Tour Packages</title>
    <link rel="stylesheet" href="tourlist.css">

    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f5f5f5;
    color: #333;
}

.container {
    width: 80%;
    margin: 0 auto;
}

header {
    background: #333;
    color: #fff;
    padding: 20px 0;
}

header h1 {
    text-align: center;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

section {
    padding: 40px 0;
}

#home {
    background: #007bff;
    color: #fff;
    text-align: center;
    padding: 60px 0;
}

#home h2 {
    font-size: 2.5em;
}

#packages {
    background: #fff;
}

#packages h2 {
    text-align: center;
    margin-bottom: 20px;
}

.package {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
}

.package img {
    width: 30%;
    border-radius: 10px;
    margin-right: 20px;
}

.package-info {
    width: 70%;
}

.package-info h3 {
    margin-bottom: 10px;
}

.package-info p {
    margin-bottom: 15px;
}

.package-info a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.package-info a:hover {
    text-decoration: underline;
}
footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Explore Your Next Adventure</h1>
            <nav>
                <ul>
                    <li><a href="adminhomepage.php">Home</a></li>
                    <li><a href="tourlist.php">Packages</a></li>
                    <li><a href="hotellist.php">Hotels</a></li>
                     
                </ul>
            </nav>
        </div>
    </header>

    <section id="home">
        <div class="container">
            <h2>Welcome to Adventure Tours</h2>
            <p>Your gateway to unforgettable travel experiences.</p>
        </div>
    </section>

    <section id="packages">
        <div class="container">
            <h2>Our Tour Packages</h2>
             

            <?php 
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
           
          ?>
            <div class="package">
            <img src=" <?php echo $row['Package_Image']; ?>" alt="Product 1" alt="Mountain Adventure">
                <div class="package-info">
                    <h3><?php echo $row['Package_Name']; ?></h3>
                    <p><?php echo $row['Package_Features']; ?></p>
                    
                    <a href="update_tour.php?id=<?php echo $row['TourPackage_Id'] ?>">Update</a> &nbsp;&nbsp;<a href="tourlist.php?ID=<?php echo $row['TourPackage_Id'] ?>" style="color: red;">Delete</a>
                </div>
                
            </div>

            <?php
                  }
                }
                ?> 

            </div>

    </section>

    <section id="contact">
        <div class="container">

        <?php
            //  if(isset($_POST['send'])){
            //     $name = $_POST['name'];                
            //     $email = $_POST['email'];
            //     $massage = $_POST['massage'];
             
            //     $sql = "insert into feedback (name, email, massage) 
            //     values('$name','$email','$massage')";

            //     $result = $conn->query($sql);
             
            //     if($result){
            //        echo "<script>alert('Your Registration succesfully..!')</script>";
            //     }
            //     else{
            //        echo "Invalid Query..!";
            //     }
             
            //  }
        ?>

         <!-- <script src="msgsend.js"></script>
             <script type="text/javascript"
                 src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
             </script>
             <script type="text/javascript">
                 (function(){         
                     emailjs.init( "C95kcLumMGrtKUJOB");
                 })();
         </script> -->
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Adventure Tours. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
