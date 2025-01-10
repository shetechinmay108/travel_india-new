<?php
include("../config/connection.php");
error_reporting(0);

if (isset($_GET['id'])) {
  $sql = "select * from users where user_Id = " . $_GET['id'];
  $result = $conn->query($sql);
  $users = mysqli_fetch_assoc($result);
  if (!$users) {
    echo "Invalid request..!";
    exit;
  }
}

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];

  $sql = "UPDATE users SET fname='$fname', lname='$lname', email='$email' where user_Id = " . $_GET['id'];
  $result = $conn->query($sql);

  if ($result) {
    echo "<script>alert('Data Updated Successfully..!')</script>";
    header("Refresh:0.5; url=user_data.php");
  } else {
    echo "Not Updated..!";
  }
}
?>
<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>user data edit</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
     <link rel="stylesheet" href="../Authentication/pwd_update.css">
     <style>
        @font-face {
  font-family: twl;
  src: url(/font/66bdbff11e188b5245c6ce47_TWKLausanne-400.ttf);
}
@font-face {
  font-family: regular;
  src: url(/font/66bdbfd4186d4f1e46bc84ab_Tartuffo-Regular.ttf);
}
* {
  padding: 0%;
  margin: 0%;
  box-sizing: border-box;
  background-color: #f3f1f1;
}
html,
body {
  height: 100%;
  width: 100%;
}

.page1 {
  width: 100%;
  height: 100vh;
}
.nav {
  width: 100%;
  height: 10vh;

  align-items: center;
  justify-content: space-between;
  display: flex;
  padding: 2vw 4vw;
}
.nav-part1 {
  padding: 1vh;
  font-family: regular;
  border-left: 0.2vw solid #f3f1f1;
}
.nav-part1 h2 {
  font-family: regular;
  font-weight: 400;
  text-transform: capitalize;
  font-size: 2.5vw;
}
.nav-part1 h5 {
  font-weight: 400;
  font-size: 1vw;
}
.nav h1 {
  font-family: regular;
  text-transform: capitalize;
  font-weight: 400;
  font-size: 2.5vw;
}
.nav-part2 {
  gap: 2vw;
  display: flex;
  align-items: center;
  font-family: twl;
  justify-content: space-between;
}
.nav-part2 h3 {
  font-family: twl;
  font-size: 1.5vw;
  font-weight: 400;
}
.nav-part2 a {
  text-decoration: none;
  text-transform: capitalize;
  color: black;
}
.package {
  width: 100%;
  height: 90vh;
  display: flex;
}
.image-section {
  /* flex: 1; */
  width: 50%;
  height: 90vh;

  padding: 2vw;
}

.image-section img {
  width: 100%;
  height: 100%;
  background-position: center;
  background-size: cover;
  /* filter: brightness(70%); */
  object-fit: cover;
}

.form-section {
  flex: 1;
  padding: 2vw 10vw;
  /* background-color: red; */
  width: 50%;
  height: 90vh;
  /* padding: 2vw; */
}

.form-section h2 {
  text-align: center;
  color: black;
  text-transform: capitalize;
  margin-bottom: 1vw;
  font-weight: 400;
  font-family: regular;
  font-size: 4vw;
}

.form-section form {
  display: flex;
  flex-direction: column;
  gap: 1.5vw;
  color: black;
}
.form-section input::placeholder {
  color: black;
}

.form-section form input {
  width: 100%;
  padding: 1vw;
  color: black;
  border: 1px solid black;
  border-radius: 0.5vw;
  font-size: 14px;
}

.form-section .submitButton {
  padding: 0.5vw;
  /* background-color: white; */
  color: black;
  border: 1px solid black;
  /* border: none; */
  border-radius: 0.5vw;
  cursor: pointer;
  font-size: 1.3vw;
}

.form-section .submitButton:hover {
  background-color: black;
  transition: 0.7s;
  color: white;
  border: 1px solid white;
  border-radius: 0.8vw;
}
a {
  align-items: center;
  justify-content: center;
  display: flex;
  text-decoration: none;
  font-family: twl;
  border: none;
  color: black;
  font-weight: 400;
}
.submitButton h3 {
  font-weight: 400;
  font-size: 1.3vw;
  /* color: white; */
}
.submitButton a:hover {
  background-color: black;
  transition: 0.7s;
  color: white;
}

     </style>
 </head>

 <body>
     <div class="page1">
         <div class="nav">
             <div class="nav-part1">
                 <h2>User Update</h2>
             </div>
             <h1>the real travel</h1>
             <div class="nav-part2">
                 <h3><a href="adminhomepage.php">Home</a></h3>
                 <h3><a href="hotellist.php">hotels</a></h3>
                 <h3><a href="tourlist.php">package</a></h3>
             </div>
         </div>
         <div class="package">
            <div class="image-section">
                <img src="https://cdn.prod.website-files.com/66be216df5f5c498bc873efb/672d05fb3d29a2341a311c13_RHONY_S15E3-5__Erin%27s_%20House_1-topaz-upscale-2000w.avif" alt="">
            </div>
            <div class="form-section">
                <h2>Edit User Data</h2>
                <form action=" " method="post">
                    <input type="text" name="fname" placeholder="FirstName " required value="<?php echo $users['fname'] ?>" />
                    <input type="text" name="lname" placeholder="LastName " required value="<?php echo $users['lname'] ?>" />
                    <input type="email" name="email" placeholder="Email " required value="<?php echo $users['email'] ?>" />
                    <!-- <input type="text" name="fname" placeholder="FirstName " required   />
                    <input type="text" name="lname" placeholder="LastName " required   />
                    <input type="email" name="email" placeholder="Email " required  /> -->
                    <button  class="submitButton" type="submit" name="submit">update</button>
                     <!-- <a class="submitButton" href="user_data.php"> <h3>Back</h3></a>  -->
                     <h3  class="submitButton"><a href="user_data.php">back</a></h3>

                </form>
            </div>
        </div>
 




     </div>
     <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
     <script>
         const locoScroll = new LocomotiveScroll({
             el: document.querySelector(".page1"),
             smooth: true,
         });
     </script>
 </body>

 </html>