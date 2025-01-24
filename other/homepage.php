<?php
include("../config/connection.php");
// $sql = "select * from users";
// $result = $conn->query($sql);


 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the real travel</title>
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <!-- https://www.fourseasons.com/content/dam/fourseasons/video/FSH/FSH_festive_ambient_shorter.mp4 -->
     <!-- https://www.fourseasons.com/
       -->
    <div class="main">
        <div class="page1">
            
            <div class="nav">
                <div class="nav-part1">
                    <h5>Curated hotels from <br> The Real Housewives</h5>
                </div>
                <i class="ri-menu-line open"></i>
            </div>
             <div class="middle">
                <h2>Money can’t buy you class,<br> but it can buy you a vacation.</h2>
                <br><h4>Check in to the iconic hotels and resorts <br> featured on The Real Housewives.  </h4>
             </div>
             <div class="header">
                <h1>The real travel</h1>
             </div>
             <div class="page1-part1">
                <div class="nav">
                    <div class="nav-part1">
                        <h5>Curated hotels from <br> The Real Housewives</h5>
                    </div>
                    <h3 id="account" style="color:chartreuse;"><a href="profile/profile.php"><?php echo $_SESSION["email"]; ?></a> </h3>
                    <i class="ri-close-line close"></i>
                </div>
                <?php

                // if(isset($_GET['get_Id'])){
                //      $sql = "select * from users where Id = " .  $_GET['get_Id'];
                //      $result = $conn->query($sql);
                // 
                    //  $data = mysqli_fetch_assoc($result);
                ?>     
                <?php

                $email = $_SESSION["email"];
                $sql = "select * from users where email = '$email'";
                $result = $conn->query($sql);









                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

             

                <div class="menu-section">
                    <div class="menu">
                        <h1 class="animate-text" data-index="1"><a href="../profile/profile.php?get_Id=<?php echo $row['user_Id'] ?>"> Your Account </a> </h1>
                        <h1 class="animate-text signIn" data-index="2" id="a"><a href="../Lakshadweep/tourlist.php"> Packages</a></h1>
                        <h1 class="animate-text sign" data-index="3" id="a"><a href="Book_data.php">Booking</a></h1>
                        <h1 class="animate-text" data-index="4" id="a"><a href="../index.php">logout</a></h1>
                        <h1 class="animate-text" data-index="5"><a href="../Get_in_Touch/contact.php">get in touch</a></h1>
                    </div>


                    <!-- <?php
                           }
                        }
                    ?> -->


                    <div class="about">
                        <div class="text">
                        <h6><i class="ri-arrow-right-line"></i>instagram</h6>
                        <h6><i class="ri-arrow-right-line"></i>facebook</h6>
                        <h6><i class="ri-arrow-right-line"></i>e-mail</h6>
                        </div>
                        <div class="images">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f79495e6d6e4419b14_bas-van-den-eijkhof-LchLjOB-XvE-unsplash.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66cf2d46bf18c7280d2f49ac_menu-2.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66cf2d4579c54a88014bc939_menu-1.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f712f954b018e2680f_getty-images-jDdUlr0UBlw-unsplash.avif" alt="">
                             <img src="https://cdn.prod.website-files.com/66bdbd95953ed41b630aa4ba/66bf66f7bc9a2f5fe688b26d_sj-objio-0WUa239Wm5s-unsplash.avif" alt="">           
                        </div>
                    </div>
                </div>
             </div>
         
             <form action="" method="POST">
                 <i class="ri-close-large-fill"></i>
                 <?php include("../config/alert.php"); ?>
                 <div class="login" id="login">
                     <div class="login-part1">
                         <h2>Sign in to your account</h2>
                         <h3 style="font-size: 1.02vw;  margin: 1vw;">Don't have an account?<span id="signin-part123"> Create a free account </span></h3>
                         <label for="enter a email"></label>
                         <input type="email"  name="email"  placeholder="email " required />
                         <input  type="password" name="password"  placeholder="password  " required />
                         <button type="submit" name="Login">login</button>                    
                         <button id="xyz"><a href="../Authentication/password_reset.php">forget password</a></button>
                         <button id="xyz"><a href="../Authentication/resend_otp.php">Verify Email_Id</a></button>
                         <div class="closeSide">
                           <h3 id="closeLogin">close</h3>
                         </div>
                    </div>
                </div>
            </form>
              <form action="" method="post">
                  <div class="signin">
                      <?php include("../config/alert.php"); ?>
                      <input type="hidden" name="otp" value="<?php echo "$act_str"; ?>
                      <input type="hidden" name="activation_code" value="<?php echo "$activation_code"; ?>
                      <i class="ri-close-circle-fill"></i>
                      <div class="signin-part1">
                          <h2>Sign up to create account</h2>
                          <h3>Already have an account?<span id="login_part12"> Sign In </span></h3>
                          <input type="text"name="fname" placeholder="FirstName  " required />
                          <input type="text"  name="lname"placeholder="LastName " required />
                          <input type="email" name="email"  placeholder="Email " required />
                          <input type="password" name="password"  placeholder="Password " required />
                          <button type="submit" name="submit">create account</button>
                          <div class="closeSide">
                            <h3 id="closeSignUp">close</h3>
                          </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="page2">
            <div class="video">
                <video autoplay muted loop  src=" https://www.fourseasons.com/content/dam/fourseasons/video/FSH/FSH_festive_ambient_shorter.mp4"></video>
            </div>
            <div class="text"> 
                <h6>Our collections span the globe, offering you the chance to stay in the luxurious, beautiful, and bizarre accommodations you see on The Real Housewives. Get the gang together in the family van and prepare to squabble over who gets their own room.</h6>
            </div>
        </div>
        <div class="page3">
            <h5>browse hotels by <br>
                your favorite series</h5>


           <?php
                $sqlquery = "select * from city";
                $queryresult = $conn->query($sqlquery);

                $datarow = mysqli_fetch_assoc($queryresult);





          
            ?>


            <div class="location">
                <h1><a href="../html/Orange County.php?cityId=100">Orange County</a></h1>
               
                <h1><a href="../html/new-york.php?cityId=200">new york</a></h1>
                
                <h1><a href="../html/Atlanta.php?cityId=300">Atlanta</a></h1>
                <h1><a href="../html/New Jersey.php?cityId=400">New Jersey</a></h1>
                <h1><a href="../html/Dallas.php?cityId=500">Dallas</a></h1>
                <h1><a href="../html/Salt Lake City.php?cityId=600">Salt Lake City</a></h1> 
            </div> 

        </div>
        <div class="page5">
            
            <section>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </section>
            
            <section>
                <div class="img" onclick="goToFirst()"></div>
                <div class="img" onclick="goToSecond()"></div>
                <div class="img" onclick="goToThird()"></div>
                <div class="img" onclick="goToforth()"></div>
                <div class="img" onclick="goTofifh()"></div>
                <div class="img" onclick="goTosixth()"></div>
                <div class="img" onclick="goToseventh()"></div>
                <div class="img" onclick="goToeight()"></div>
                <div class="img" onclick="goTonine()"></div>
            </section>
           
            <section></section>
        </div>
        <div id="page6">
                <div class="page-text">
                    <!-- <div class="page-text-img"></div> -->
                    <h1>the real travel </h1>
                    <h4>These curated collections of popular and highly-rated travel <br> experiences offer well-organized itineraries, premium accommodations, <br> guided tours, exclusive deals, memorable moments, exceptional services, <br> personalized options, and unique destinations for all travelers</h4>
                    </div>
            <div class="cards" id="card-one">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>"Elizabeth Vargas's" Home</h1>
                    <br><h4>La Quinta, California</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                        <button> <a href="../html/orange county/Elizabeth-Home.php">explore</a></button> 
                 </div>
            </div>
            <div class="cards" id="card-two">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>"Elizabeth Vargas's" Home</h1>
                    <br><h4>La Quinta, California</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                        <button> <a href="../html/orange county/Dawn-Ranch.php">explore</a></button> 
                 </div>
            </div>
            <div class="cards" id="card-three">
                <div class="nav">
                    
                    <h2 style="text-transform: capitalize;">The Real travel</h2> 
                </div>
                <div class="middle">
                    <h1>The May Fair Hotel</h1>
                    <br><h4>London, England</h4>
                 </div>
                 <div class="header">
                    <h4> Real Housewives of Orange County <br> season 18  | episode(s) 14-16</h4> 
                        <button> <a href="../html/orange county/The-May-Fair-Hotel.php">explore</a></button> 
                 </div>
            </div>
        </div>
        <div class="lastPage1">
            <h1>Stay in the know</h1>
            <h3>Be the first to know about new hotels we’ve uncovered</h3>
            <form action="">
                <input type="email" name="" id="" placeholder="EMAIL ADDRESS">
                <button>&rarr;</button>
            </form>
            <div class="lastPage2">
                <div class="last-part1">
                    <div class="last-part11">
                        <h3>map</h3>
                        <h3>Series </h3>
                        <h3>About</h3>
                    </div>
                    <div class="last-part11">
                        <h3>submit</h3>
                        <h3>press</h3>
                        <h3>contact</h3>
                    </div>
                </div>
                <div class="last-part2">
                    <div class="last-part11">
                        <h3>credits</h3>
                        <h3>accessibility </h3>
                        <h3>privacy</h3>
                    </div>
                    <div class="last-part11">
                        <h3>facebook</h3>
                        <h3>instagram</h3>
                        <h3>1ax consulting</h3>
                    </div>
                </div>

            </div>
            <h5>This site features affiliate links. When you click on a link and book a trip,<br> The Real Hotels may earn a small commission at no cost to you.</h5>
        </div>
        
    </div>
    <script src="https://unpkg.com/split-type"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script> -->
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>