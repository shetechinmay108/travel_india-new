<?php
  include("../config/connection.php");
  error_reporting(0);

  $sql = "select * from feedback ";
  $result = $conn->query($sql);

  ///*******Delete operation in this page ********* */
  if(isset($_GET['IDe'])){
   extract($_GET);
      $sql = "DELETE FROM feedback WHERE msg_Id = " . $_GET['IDe'];
      $Result = $conn->query($sql);
      if($Result){
       //echo"data has been deleted..!";
        // echo  "<script>alert('Are you sure..!')</script>";
         header("location:feedbackdata.php");
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
        <th>msg_Id&nbsp;&nbsp;</th>
        <th> Name&nbsp;&nbsp;</th>
        <th>Email_Id&nbsp;&nbsp;</th>
        <th>Massages&nbsp;&nbsp;</th>
        </tr>
        <?php 
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
           
          ?>
          <tr>
                <td><?php echo $row['msg_Id']; ?>&nbsp;&nbsp;</td>  
                <td><?php echo $row['name']; ?>&nbsp;&nbsp;</td>   
                <td><?php echo $row['email']; ?>&nbsp;&nbsp;</td>  
                <td><?php echo $row['massage']; ?>&nbsp;&nbsp;</td>  
                <!-- <td><button><a href="feedbackdata.php?id=<?php //echo $row['Id'] ?>">Update</a></button></td> -->
                <td><button><a href="feedbackdata.php?IDe=<?php echo $row['msg_Id'] ?>">Delete</a></button></td>
            </tr>
                 
                <?php
                  }
                }
                ?>       
    </table>
    <button> <a href="adminhomepage.php">Back</a></button>
</body>
</html>