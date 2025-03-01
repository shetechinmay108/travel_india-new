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
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../css/secondPage.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <div class="main">
        <div class="page1">
            <div class="backimg">
                <img src="<?php echo $data['Hotel_Image']; ?>" alt="">
            </div>
            <div class="nav">
                <div class="nav-part1">
                    <h5>Explore amazing tours <br> and destinations</h5>
                </div>
                <h2><?php echo $data['Hotel_Name']; ?></h2>
                <i class="ri-menu-line open"></i>
            </div>
            <div class="middle">
                <h1><?php echo $data['Hotel_Name']; ?></h1>
            </div>
            <div class="header">
                <h4>Luxury Hotel & Resort <br> Exclusive Accommodations</h4>
                <div class="button1" style="width: 35%;">
                    <h4><a href="../Lakshadweep/hotellist.php" class="buy-button">All Hotels</a></h4>
                </div>
            </div>
            <div class="page1-part1">
                <div class="nav">
                    <div class="nav-part1">
                        <h5>Curated hotels from <br> The Real Housewives</h5>
                    </div>
                    <i class="ri-close-line close"></i>
                </div>
                <div class="menu-section">
                    <div class="menu">
                        <h1 class="animate-text" data-index="1">the real Travel</h1>
                        <h1 class="animate-text" data-index="2"><a href="/homepage.php">home</a></h1>
                        <h1 class="animate-text" data-index="3"><a href="../Lakshadweep/hotellist.php">HotelList</a></h1>
                        <h1 class="animate-text" data-index="4"><a href="book_hotel.php">Hotels</a></h1>
                        <h1 class="animate-text" data-index="5">get in touch</h1>
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
        </div>
        <div class="page2">
            <div class="text">
            <h1><?php echo $data['amenities']; ?></h1>
                 
            </div>
            <div class="middle2">
                <div class="middle2-part1">
                    <img src="<?php echo $data['Hotel_Image']; ?>" alt="">
                </div>
                <div class="middle2-part2">
                     
                     <h3>Experience luxury accommodations with our exclusive hotels featuring premium amenities, expert service, VIP access, and unforgettable personalized experiences.</h3>
                </div>
            </div>
            <div class="middle3">
                <div class="middle3-part1">
                   
                    <h3>Embark on unforgettable journeys with our curated tour packages featuring expert guides, comfortable transportation, iconic destinations, and immersive cultural experiences.</h3>
                    <div class="button1">
                        <!-- <h4><a href="../Lakshadweep/hotel_form.php?id=<?php echo $data['Hotel_Id'] ?>" class="buy-button">Book Now</a></h4> -->
                        <h4><a href="javascript:location.reload();">explore</a></h4>
                    </div>
                </div>
                <div class="middle3-part2">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d004a81c785b1a6d9cf4e_RHOC_S18E14-16_The%20May%20Fair%20Hotel_3-topaz-upscale-2000w.avif" alt="">
                </div>
            </div>
            <div class="middle5">
                <div class="middle5-part1">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop" alt="Hotel View">
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
                            <div class="detail3"><h3><?php echo $data['Hotel_Address']; ?></h3></div>
                        </div>
                        <div class="detail1">
                            <div class="detail2"><h3>rooms</h3></div>
                            <div class="detail3"><h3><?php echo $data['NumberOfRooms']; ?></h3></div>
                        </div>
                        <div class="detail1">
                            <div class="detail2"><h3>price</h3></div>
                            <div class="detail3"><h3><?php echo $data['PriceOfRoom']; ?> Rs</h3></div>
                        </div>
                        <div class="detail1">
                            <div class="detail2"><h3>contact</h3></div>
                            <div class="detail3"><h3><?php echo $data['PhoneNo']; ?></h3></div>
                        </div>
                        <div class="detail1">
                            <div class="detail2"><h3>email</h3></div>
                            <div class="detail3"><h3><?php echo $data['email']; ?></h3></div>
                        </div>
                        <div class="detail1">
                            <div class="detail2"><h3>date</h3></div>
                            <div class="detail3"><h3><?php echo isset($data['Date']) ? $data['Date'] : ''; ?></h3></div>
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
                            <div class="detail2"><h3>guide</h3></div>
                            <div class="detail3"><h3>available</h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lastPage1">
            <h1>Stay in the know</h1>
            <h3>Subscribe for exclusive offers and updates from our Hotels</h3>
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
