<?php  
include("../config/connection.php");

if(isset($_POST['Login'])){
    extract($_POST);
    $sql = "select * from users where email='$email' AND password='$password'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    
    if($row["user_type"]=="user" ) {
        if($row['status']== 1){
            header('location:homepage.php');
        } else {
            echo "<script>alert('Your account is not verified , Please check your Email..!')</script>";
        }
    } else if($row["user_type"]=="admin") {
        if($row['status']== 1){
            header('location:../admin/adminhomepage.php');
        } else {
            echo "<script>alert('Your account is not verified , Please check your Email..!')</script>";
        }
    } else {
        echo "<script>alert('Invalid Login info..!')</script>";
    }
}

echo $_SESSION["email"];
?>
<form action="" method="POST">
    <?php  include("../config/alert.php");  ?>
    <div class="login" id="login">
        <i class="ri-close-line"></i>
        <div class="login-part1">
            <h1>login</h1>
            <input type="email" name="email" placeholder="email . . . . ." required /><br /><br />
            <input type="password" name="password" placeholder="password . . . . . ." required /><br /><br />
            <button type="submit" name="Login">login</button>
            <button id="signin-part123">signin</button><br />
            <a href="#">forget password</a>
        </div>
    </div>
</form>
