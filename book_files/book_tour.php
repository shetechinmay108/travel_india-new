<?php
include("../config/connection.php");
if (isset($_GET['Id'])) {
    $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['Id'];
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
       // echo "data fetch succes";
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
    <title>Package Details</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../css/secondPage.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <div class="main">
        <div class="page1">
            <div class="backimg">
                <img src="<?php echo $data['Package_Image']; ?>" alt="">
            </div>
            <div class="nav">
                <div class="nav-part1">
                    <h5>Curated Tour Packages <br> For Your Journey</h5>
                </div>
                <h2><?php echo $data['Package_Name']; ?></h2>
                <i class="ri-menu-line open"></i>
            </div>
            <div class="middle">
                <h1><?php echo $data['Package_Name']; ?></h1>
                <!-- <br><h4><?php echo $data['Price']; ?> Rs</h4>     //here want a location     -->
               
             </div>
             <div class="header">
                <h4> <?php echo $data['Package_Type']; ?> <br> Starting from <?php echo $data['Price']; ?> Rs</h4>
                <div class="button1" style="width: 35%;">
                <h4><a href="../Lakshadweep/tourlist.php" class="buy-button">All Packages</a></h4>
                    <!-- <button>read more</button> -->
                </div>
             </div>
             <div class="page1-part1">
                <div class="nav">
                    <div class="nav-part1">
                        <h5>Curated Tour Packages <br> For Your Journey</h5>
                    </div>
                    <i class="ri-close-line close"></i>
                </div>
                <div class="menu-section">
                    <div class="menu">
                        <h1 class="animate-text" data-index="1">the real Travel</h1>
                        <h1 class="animate-text" data-index="2"><a href="/homepage.php">home</a></h1>
                        <h1 class="animate-text" data-index="3"><a href="../Lakshadweep/tourlist.php">TourList</a></h1>
                        <h1 class="animate-text" data-index="4"><a href="../before_Login/about.php">about</a></h1>
                        <h1 class="animate-text" data-index="5"><a href="../index.php">logout</a></h1>
                    </div>
                    
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
             <!-- <div class="sign-in">
                <form action="">
                    
                </form>
             </div> -->
        </div>
        <div class="page2">
           <div class="text">
            <h1>Experience luxury travel with our exclusive tour packages featuring premium resorts, expert guides, VIP access, and unforgettable personalized experiences to top attractions worldwide.</h1>
           </div>
           <div class="middle2">
            <div class="middle2-part1">
                <img src="<?php echo $data['Package_Image']; ?>" alt="">
            </div>
            <div class="middle2-part2">
                <h3><?php echo $data['Package_Features']; ?> </h3>
            </div>
           </div>
           <div class="middle3">
            <div class="middle3-part1">
                <h3><?php echo $data['Package_Details']; ?></h3>

                    <div class="button1">
                         
                        <h4><a href="javascript:location.reload();">explore</a></h4>
                        <!-- <button><a href="book_form_read.php?passid=<?php //echo $data['TourPackage_Id'] ?>" class="buy-button">Book Now</a></button> -->
                    
                        <!-- <button>read more</button> -->
                    </div>  
            </div>
            <div class="middle3-part2">
                <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d004a81c785b1a6d9cf4e_RHOC_S18E14-16_The%20May%20Fair%20Hotel_3-topaz-upscale-2000w.avif" alt="">
            </div>
           </div>
           <div class="middle5">
            <div class="middle5-part1">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop" alt="Dallas View">
            </div>
            <div class="middle5-part2">
                <h3>hotel amenities</h3>
                <h3>Experience our world-class amenities including luxury spa treatments, gourmet restaurants, state-of-the-art fitness center, and elegantly appointed rooms with stunning views. Our dedicated staff ensures personalized service for an unforgettable stay.</h3>
                <div class="middle5-part3">
                    <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=2080&auto=format&fit=crop" alt="Infinity Pool">
                </div>
                <h3>hotel details</h3>
                <div class="details">
                    <div class="detail1">
                        <div class="detail2"><h3>location</h3></div>
                        <div class="detail3"><h3><?php echo $data['Package_Location']; ?></h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>guide</h3></div>
                        <div class="detail3"><h3>available</h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>days</h3></div>
                        <div class="detail3"><h3></h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>starting rate</h3></div>
                        <div class="detail3"><h3><?php echo $data['Price']; ?></h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>open</h3></div>
                        <div class="detail3"><h3>9:00 AM</h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>close</h3></div>
                        <div class="detail3"><h3>10:00 PM</h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>featured in</h3></div>
                        <div class="detail3"><h3>RHOD S5</h3></div> 
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>cars</h3></div>
                        <div class="detail3"><h3>available</h3></div> 
                    </div>
                    <div class="detail1">
                    <div class="detail2"><h3>contact</h3></div>
                    <div class="detail3"><h3>+91 9876543210</h3></div>
                    </div>
                    <div class="detail1">
                        <div class="detail2"><h3>email</h3></div>
                        <div class="detail3"><h3>realhousewives@gmail.com</h3></div> 
                    </div>

                </div>

            </div>
        </div>
           <div class="middle4">
            <div class="booking">
                <div class="booking1">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d0043e9147b9cab9aadaf_RHOC_S18E14-16_The%20May%20Fair%20Hotel_1-topaz-upscale-2000w.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2>The May Fair Hotel</h2>
                    <h4>London, England</h4>
                </div>
                </div>
                <div class="booking2">
                <div class="book-part3"> 
                    <h5>Some intrepid reporter needs to do an in-depth exposé on what exactly is wrong with Shannon Storms Beador’s digestive system. This woman has been trying to poop for years. We have been</h5>
                </div>
                <div class="book-part4"> 
                    <button><a href="#">Book now</a></button>
                    <button><a href="#">read more</a></button>
                    </div>
                </div>
            </div>
            <div class="booking">
                <div class="booking1">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66e194f2e375a6029db9ceb1_RHOBH_S11E10-12_La%20Quinta-3-topaz.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2>"Elizabeth Vargas's" Home</h2>
                    <h4>La Quinta, California</h4>
                </div>
                </div>
                <div class="booking2">  
                <div class="book-part3"> 
                    <h5>It’s a Tale of Two Girl’s Trips. Tamra brings her anti-Shannon weapon Alexis Bellino, along with Katie and Jenn, to her Big Bear cabin. Meanwhile, Gina, Heather, Shannon, and Emily head out to...</h5>
                </div>
                <div class="book-part4"> 
                    <button><a href="#">Book now</a></button>
                    <button><a href="#">read more</a></button>
                </div>
                </div>
            </div>
            <div class="booking">
                <div class="booking1">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66f44adc4ee8a07e24c81f1f_RHOC_S18E9-10_Dawn%20Ranch_1-topaz-upscale-2000w.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2>Dawn Ranch</h2>
                    <h4>Guerneville, California</h4>
                </div>
                </div>
                <div class="booking2">
                <div class="book-part3"> 
                    <h5>If only Heather could protect all of the ladies' feelings as well as she protects her clothing packed in individual sheets of white tissue paper....</h5>
                </div>
                <div class="book-part4"> 
                    <button><a href="#">Book now</a></button>
                    <button><a href="#">read more</a></button>
                </div>
                </div>
            </div>
           </div>
        </div>
        <div class="lastPage1">
            <h1>Stay in the know</h1>
            <h3>Subscribe for exclusive offers and updates from Banyan Tree Dallas</h3>
            <form action="">
                <input type="email" name="" id="" placeholder="EMAIL ADDRESS">
                <button>&rarr;</button>
            </form>
            <div class="lastPage2">
                <div class="last-part1">
                    <div class="last-part11">
                        <h3>rooms & suites</h3>
                        <h3>dining</h3>
                        <h3>spa</h3>
                    </div>
                    <div class="last-part11">
                        <h3>events</h3>
                        <h3>offers</h3>
                        <h3>contact</h3>
                    </div>
                </div>
                <div class="last-part2">
                    <div class="last-part11">
                        <h3>terms</h3>
                        <h3>accessibility</h3>
                        <h3>privacy</h3>
                    </div>
                    <div class="last-part11">
                        <h3>facebook</h3>
                        <h3>instagram</h3>
                        <h3>twitter</h3>
                    </div>
                </div>
            </div>
            <h5>This website uses cookies to enhance your browsing experience.<br>By continuing to use this site, you agree to our privacy policy.</h5>
        </div>
    </div>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="/js/secondPage.js"></script>
</body>
</html>