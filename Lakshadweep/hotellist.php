<?php
  // include("../config/connection.php");
   include("../config/feedback.php");
   //include("config/user_auth_acces.php");
   error_reporting(0);

   $sql = "select * from create_hotel ";
   $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages</title>
    <link rel="stylesheet" href="tourlist.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Explore Your Next Adventure</h1>
            <nav>
                <ul>
                    <li><a href="../homepage.php">Home</a></li>
                    <li><a href="tourlist.php">Packages</a></li>
                    <li><a href="hotellist.php">Hotels</a></li>
                    <li><a href="#contact">Contact</a></li>
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
            <h2>Our Famuos Hotels </h2>
              <!-- <div class="package">
                <img src="/admin/image/wow.jpg.jpg" alt="Product 1" alt="Beach Paradise">
                <div class="package-info">
                    <h3>Beach Paradise</h3>
                    <p>Relax on stunning beaches with crystal-clear water and white sand.</p>
                    <a href="#">Book Now</a>
                </div>
            </div>
            <div class="package">
                <img src="/admin/image/360_F_209824591_K05Tob490TmBlTekkPlNrxh1Hy7IKMTU.jpg" alt="Product 1" alt="Mountain Adventure">
                <div class="package-info">
                    <h3>Mountain Adventure</h3>
                    <p>Hike through breathtaking mountain trails and enjoy scenic views.</p>
                    <a href="#">Book Now</a>
                </div>
            </div>  -->

            <?php 
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
           
          ?>
            <div class="package">
            <img src=" <?php echo $row['Hotel_Image']; ?>" alt="Product 1" alt="Mountain Adventure">
                <div class="package-info">
                    <h3><?php echo $row['Hotel_Name']; ?></h3>
                    <p><?php echo $row['amenities']; ?></p>
                    
                    <a href="../book_files/book_hotel.php?id=<?php echo $row['Hotel_Id']; ?>">Book Now</a>
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

 
            <h2>Contact Us</h2>
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="massage" name="massage" required></textarea>
                
                <button type="submit" name="send"  >Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Adventure Tours. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
