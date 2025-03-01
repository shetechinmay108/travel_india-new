<?php
include("../config/connection.php");

if(isset($_GET['id'])){
    $sql = "select * from create_hotel where Hotel_Id = " .  $_GET['id'];
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    if(!$data){
        echo "Data not found..!";
        exit;
    }
} else {
    echo "Invalid request..!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Details</title>
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
            <div class="product">
                <img src="<?php echo $data['Hotel_Image']; ?>" alt="Package 1">
                <h1><?php echo $data['Hotel_Name']; ?></h1>
                <h3>ADDRESS : <?php echo $data['Hotel_Address']; ?></h3>
                <h3>PHONE NO : <?php echo $data['PhoneNo']; ?></h3>
                <h3>EMAIL ID : <?php echo $data['email']; ?></h3>
                <h3>TOTAL ROOMS : <?php echo $data['NumberOfRooms']; ?></h3>
                <h3>AMENITIES : <?php echo $data['amenities']; ?></h3>
                <h3 class="price">ROOM PRICE : <?php echo $data['PriceOfRoom']; ?> Rs</h3> 
                <!-- <a href="book_hotel_form.php?pass_hotel_id=// echo $data['Hotel_Id'] " class="buy-button">Book Now</a> -->
                <a href="../Lakshadweep/hotel_form.php?id=<?php echo $data['Hotel_Id'] ?>" class="buy-button">Book Now</a>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 My Product Store. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
