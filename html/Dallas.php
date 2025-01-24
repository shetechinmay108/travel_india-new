<?php
include("../config/connection.php");




echo "hello ";
echo $City_Id = $_GET['cityId'];

$sql = "select * from city where City_Id = $City_Id";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);
$City_Name = $row['City_Name'];
echo $City_Name;


//fetch row wise data
$queryfordata = mysqli_query($conn, "select * from create_intern_package where City ='$City_Name'");
 $rowdata = mysqli_fetch_array($queryfordata);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dallas</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../css/new-york.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
 
<body>
    <div class="main">
        <div class="page1">
            
            <div class="nav">
                <div class="nav-part1">
                    <h5>That's my opinion</h5>
                </div>
                <i class="ri-menu-line open"></i>
            </div>
           
             <div class="header" style="bottom: 25%;">
                <h1 class="header-part1" style="font-size: 30vw;">Dallas</h1>
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
                        <h1 class="animate-text" data-index="1">the real hotels</h1>
                        <h1 class="animate-text" data-index="2">sign in</h1>
                        <h1 class="animate-text" data-index="3">sign up</h1>
                        <h1 class="animate-text" data-index="4">about us</h1>
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
        <?php
                 if (mysqli_num_rows($queryfordata) > 0) {
                    while ($rowdata = mysqli_fetch_assoc($queryfordata)) {


           ?>


            <div class="booking">
                <div class="book-part1">
                    <img src="<?php echo $rowdata['Package_Image']; ?>" alt="">
                </div>
                <div class="book-part2">
                    <h2><?php echo $rowdata['Package_Name'] ?></h2>
                    <h4><?php echo $rowdata['Package_Location'] ?></h4>
                </div>
                <div class="book-part3"> 
                    <h5><?php echo $rowdata['Package_Feature'] ?></h5>
                </div>
                <div class="book-part4"  >
                    <h4><a href="../International_book/book_form.php ?Id=<?php echo $rowdata['CIPackage_Id'] ?>">Book now</a></h4>
                    <h4><a href="./new-york/Erin's-House.php">read more</a></h4> 
                </div>
            </div>
           
            <?php
                    }
                 }

            ?>
            <div class="booking">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66e1b22f4dd9023c1a6a5ec0_RHOD_S5E7-8__The%20Echelon_%20Vacation%20home_1.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2>"The Echelon" Vacation</h2>
                    <h4>Algarve, Portugal</h4>
                </div>
                <div class="book-part3"> 
                    <h5>The lakeside setting was serene and peaceful, but the atmosphere was tense. Hostess Kary Brittingham tries to set the tone by apologizing to newcomer, and first Asian American Housewife</h5>
                </div>
                <div class="book-part4"  >
                    <h4><a href="#">Book now</a></h4>
                    <h4><a href="./Dallas/The-Echelon.php">read more</a></h4> 
                </div>
            </div>
            <div class="booking">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66e1b1a469941e4384f43e8f_RHOD_S4E12-14_Thailand-1.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2> Banyan Tree Bangkok</h2>
                    <h4>London, England</h4>
                </div>
                <div class="book-part3"> 
                    <h5>It is too hot in Bangkok. These women have lost their minds. First, D’Andra brings one of her frenemy LeeAnne’s L’Infinity dresses with her and films a scene making fun of her and Kary’s</h5>
                </div>
                <div class="book-part4"  >
                    <h4><a href="#">Book now</a></h4>
                    <h4><a href="./Dallas/Banyan-Tree.php">read more</a></h4> 
                </div>
            </div>
            <div class="booking">
                <div class="book-part1">
                    <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/66e1b082adea2670c0e66a3c_RHOD_S4E3-5_Careyes%2C%20Mexico-1.avif" alt="">
                </div>
                <div class="book-part2">
                    <h2> "Eduardo's" Family Home</h2>
                    <h4>Guerneville, California</h4>
                </div>
                <div class="book-part3"> 
                    <h5>Eduardo’s house is stunning, if two hours from the airport by bus. As per usual, there are room shenanigans. Kary, the hostess, thinks it will be fun to share beds. LeeAnne thinks that having a.</h5>
                </div>
                <div class="book-part4"  >
                    <h4><a href="#">Book now</a></h4>
                    <h4><a href="./Dallas/Eduardo.php">read more</a></h4> 
                </div>
            </div>
        </div>
        <div class="page3"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="../js/Orange County.js"></script>
</body>
</html>