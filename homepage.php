<?php
   include("config/connection.php");
   //include("config/user_auth_acces.php");
   //include("./config/logout.php");
 
  
  
?>

<?php       

//echo $_SESSION["email"];
 


                ?>
               

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="curser"></div>
    <div class="main">
      <div class="overlay"></div>
      <div class="page1">
      

        <div class="navbar">
          <h3>travel india     </h3>

          <h3 id="menu">menu</h3>
        </div>
        <div class="heading-section">
          <div class="heading-part1">
             
            <h1>welcome to</h1>
          </div>
          <div class="heading-part2">
            <h1>travel india</h1>
            <h3>reach your destiny with us!</h3>
          </div>
        </div>
        <div class="menu-section">
          <div class="menu-part1">
             <h2 id="account" style="color:chartreuse;"><?php echo $_SESSION["email"]; ?></h2>
            <h2 id="home">home</h2>
            <h2 id="#">Services</h2>
            <h2 id="#"> <a href="Lakshadweep/tourlist.php"> Packages</a></h2>
            <h2 id="#"><a href="Book_data.php">Booking</a></h2>
            <h2 id="logout">Logout</h2>
            <h2 id="signin"></h2>
            <h2 id="Login-part2"></h2>
            <i class="ri-close-circle-line"></i>
          </div>
        </div>



          
 
        <!-- *******Login form****** -->
        <?php  
          
        //     if(isset($_POST['Login'])){
        //       extract($_POST);
         
        //       //Sql query to login
         
        //       //$Pass = md5($password);
         
        //       $sql = "select * from users where email='$email' AND password='$password'";
              
        //       $result = $conn->query($sql);
        //       if($result->num_rows){
        //           $_SESSION['is_user_loggedin'] = true;
        //           $_SESSION['user_data'] = mysqli_fetch_assoc(($result));
         
        //          header("location:Lakshadweep/Lakshadweep.php");         
        //       }
        //       else{
        //           $_SESSION['error'] = "<script>alert('Invalid Login info..!')</script>";
        //       }
         
             
        //  }

         ?>


        
        
        <form action="" method="POST">
        <?php  include("config/alert.php"); ?>
           <div class="login" id="login"   >
               <i class="ri-close-line"></i>
              <div class="login-part1">
                 <h1>login</h1>
                 <input
                   type="email"
                   name="email"
                  placeholder="email . . . . ." required
                  /><br /><br />
                 <input
                   type="password"
                   name="password"
                  placeholder="password . . . . . ." required
                 /><br /><br />
                 <button type="submit" name="Login">login</button>
                 <button id="signin-part123">signin</button><br />
                 <a href="#">forget password</a>
              </div>
           </div>
        </form>


        <form action=" login " method="post">
        <div class="signin">
           
               <i class="ri-close-circle-fill"></i>
             <div class="signin-part1">
               <h1>Sign in</h1>
               <input
                 type="text"
                 name="fname"
                 placeholder="FirstName . . . . . ." required
               /><br /><br />
               <input
                 type="text"
                 name="lname"
                 placeholder="LastName . . . . . ." required
               /><br /><br />
               <input
                 type="email"
                 name="email"
                 placeholder="Email . . . . . ." required
               /><br /><br />
               <input
                 type="password"
                 name="password"
                 placeholder="Password . . . . . ." required
                /><br /><br />
               <button id="login_part12">Login in</button>
               <button type="submit" name="submit">signin</button>
               <button id="Cancel">Cancel</button>
              </div>

           
        </div>
        </form>
       
        <div class="bottom-section">
          <div class="bottom-part1">
            <div class="bottom-part2">
              <a href="#"
                >enjoymental <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
            <div class="bottom-part2">
              <a href="#"
                >mythological <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
            <div class="bottom-part2">
              <a href="#"
                >educational <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="page2" data-scroll>
        <div class="photo-parent">
          <div class="photo-section">
            <div class="photo-part1">
              <div class="image1">
                <img
                data-scroll data-scroll-speed="-1" data-scroll-direction="horizontal"
                  src="https://images.unsplash.com/photo-1587922546307-776227941871?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
                  alt=""
                />
              </div>
            </div>
            <h2>lakshadweep</h2>
            <h4>see a amazing beach</h4>
          </div>

          <div class="photo-section2">
            <div class="photo-part2">
              <img
              data-scroll data-scroll-speed="1" data-scroll-direction="horizontal"
                src="https://images.unsplash.com/photo-1616606484004-5ef3cc46e39d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
                alt=""
              />
            </div>
            <h2>hampi</h2>
            <h4>visit a historical site</h4>
          </div>
        </div>
        <div class="photo-parent2">
          <div class="photo-section3">
            <img
            data-scroll data-scroll-speed="-1" data-scroll-direction="horizontal"
              src="https://images.unsplash.com/photo-1679022581490-884295ed5d52?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
              alt=""
            />
            <h2>kerla</h2>
            <h4>visit a nature site</h4>
          </div>
          <div class="photo-section4">
            <img
            data-scroll data-scroll-speed="1" data-scroll-direction="horizontal"
              src="https://images.unsplash.com/photo-1569096610945-1a094be04c74?q=80&w=1430&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA=="
              alt=""
            />
            <h2>hampi</h2>
            <h4>visit a historical site</h4>
          </div>
        </div>
        <div class="parent-parent3">
          <div
            class="photo-section5"
            data-scroll data-scroll-speed="2" data-scroll-direction="vertical"
          >
            <img
              src="https://img.veenaworld.com/wp-content/uploads/2021/03/Konark-Sun-Temple-History-Architecture-and-Information.jpeg"
              alt=""
            />
            <h2>konark</h2>
            <h4>visit a historical sun temple</h4>
          </div>
        </div>
      </div>
      <div class="page3">
        <h1>Explore</h1>
      </div>
     
      <div class="second">
        <div class="elem one"  >
            <img src="https://www.livemint.com/lm-img/img/2024/01/21/1600x900/AyodhyaRamMandir_1705830011571_1705849061281.jpg" alt="">
            <h1 > ayodhya</h1>
            <h5>jai shree ram</h5>
        </div>
        <div class="elem">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSArmtBam6dAdSqw_pgqdXUSd2KN1AK1iGW9g&s" alt="">
            <h1> kedarnath</h1>
            <h5>mahadev</h5>
        </div>
        <div class="elem elemlast">
            <img src=https://hblimg.mmtcdn.com/content/hubble/img/dwarka/mmt/activities/t_ufs/m_Dwarkadhish%20Temple-1_l_498_640.jpg alt="">
            <h1> dwarka</h1>
            <h5>shree krishna</h5>
        </div>
        
        
    </div>
    
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
      integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
      integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
      integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="script.js"></script>
  </body>
</html>
