<?php
  include("../config/connection.php");
  error_reporting(0);

  $sql = "select * from users ";
  $result = $conn->query($sql);

  ///*******Delete operation in this page ********* */
  if(isset($_GET['ID'])){
   extract($_GET);
      $sql = "DELETE FROM users WHERE user_Id = " . $_GET['ID'];
      $Result = $conn->query($sql);
      if($Result){
       //echo"data has been deleted..!";
        // echo  "<script>alert('Are you sure..!')</script>";
         header("location:user_data.php");
     }
     else{
         echo "Not  Deleted..!";
     }
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("include.php"); ?>
<?php 
      
    ?>

    <table>
         
        <tr>
        <th>User_Id&nbsp;&nbsp;</th>
        <th>First Name&nbsp;&nbsp;</th>
        <th>Last Name&nbsp;&nbsp;</th>
        <th>Email_Id&nbsp;&nbsp;</th>
        <th>user_Type&nbsp;&nbsp;</th>
        <th>Action&nbsp;&nbsp;</th>
        </tr>
        <?php 
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
           
          ?>
          <tr>
                <td><?php echo $row['user_Id']; ?>&nbsp;&nbsp;</td>  
                <td><?php echo $row['fname']; ?>&nbsp;&nbsp;</td>
                <td><?php echo $row['lname']; ?>&nbsp;&nbsp;</td>
                <td><?php echo $row['email']; ?>&nbsp;&nbsp;</td>
                <td><?php echo $row['user_type']; ?>&nbsp;&nbsp;</td>
                <td><button><a href="edit_user.php?id=<?php echo $row['user_Id'] ?>">Update</a></button></td>
                <td><button><a href="user_data.php?ID=<?php echo $row['user_Id'] ?>">Delete</a></button></td>
            </tr>
                 
                <?php
                  }
                }
                ?>       
    </table>
    <button> <a href="adminhomepage.php">Back</a></button>
</body>
</html>