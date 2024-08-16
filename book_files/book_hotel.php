<?php
     include("../config/connection.php");
    //  $sql = "select * from tour_package ";
    //  $result = $conn->query($sql);



     if(isset($_GET['id'])){
        $sql = "select * from create_hotel where Hotel_Id = " .  $_GET['id'];
         $result = $conn->query($sql);
         // echo"<pre>";
         // print_r($result);
         $data = mysqli_fetch_assoc($result);
         // echo "<pre>";
         // print_r($users);
         if($data){
             //echo "Data collected successes..!";
         }
     }
     else{
         echo "Invalid request..!";
         exit;
     }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Promotion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
        
            <h1>My Package Info</h1>
            <nav>
                <ul>
                    <li><a href="../Lakshadweep/hotellist.php">Hotel List</a></li>
                    <li><a href="book_tour.php">Packages</a></li>
                    <!-- <li><a href="#">Contact</a></li> -->
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="hero">
        <div class="container">
            <h2>Welcome to Our Tour Info</h2>
            <p>Discover the best tour just for you.</p>
            <a href="#products" class="cta-button" >Explore Other Tours</a>
        </div>
    </section>

   
    
    <section id="products" class="products">
   
        <div class="container">
            <h2>Our Hotel Details</h2>
            <?php 
        //     if($result->num_rows > 0){
        //         while($row = mysqli_fetch_assoc($result)){
           
        //   ?>
            <div class="product">
                <img src="<?php echo $data['Hotel_Image']; ?>" alt="Package 1">
                <h1><?php echo $data['Hotel_Name']; ?></h1>
                <h3>ADDRESS : <?php echo $data['Hotel_Address']; ?></h3>
                <h3>PHONE NO : <?php echo $data['PhoneNo']; ?></h3>
                <h3>EMAIL ID : <?php echo $data['email']; ?></h3>
                <h3>TOTAL ROOMS : <?php echo $data['NumberOfRooms']; ?></h3>
                <!-- <h3>ROOM PRICE : <?php echo $data['PriceOfRoom']; ?> Rs</h3> -->
                <h3>AMENITIES : <?php echo $data['amenities']; ?></h3>
                <h3 class="price">ROOM PRICE : <?php echo $data['PriceOfRoom']; ?> Rs</h3> 
                <!-- <p class="price"><b><?php echo $data['Price']; ?> Rs</b></p> -->
                <a href="#" class="buy-button">Book Now</a>
            </div>

            <?php
            //     }
            //   }
            ?>
            <!-- <div class="product">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu7kr5Kv1ZJw1tOnW8ktxdYvf6bgFwjnw6Jw&s" alt="Product 2">
                <h3>Product 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$29.99</p>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
            <div class="product">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR24hV52cQdjYHj0pxZg6Bgw9X3s8a2I7oNLA&s" alt="Product 3">
                <h3>Product 3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$39.99</p>
                <a href="#" class="buy-button">Buy Now</a>
            </div> -->
        </div>
    </section>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 My Product Store. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>