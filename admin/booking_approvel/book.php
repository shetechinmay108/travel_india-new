<?php  
    include("../../config/connection.php"); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	

<h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
    <th scope="col">#</th>
     <th scope="col">Package Name</th>
     <th scope="col">User Name</th>
     <th scope="col">Email_Id</th>
     <th scope="col">Mobile-No</th>
     <th scope="col">Package-Type</th>
     <th scope="col">Tour-Date</th>
     <th scope="col">Package-Duration</th>
     <th scope="col">Booking-Date</th>
     <!-- <th>Package Name</th> -->
     <th scope="col">Package-Price</th>
     <!-- <th>Package-Duration</th> -->
     <!-- <th>Package-Type</th> -->
     <!-- <th>Booking-Date</th> -->
     <th scope="col">Status</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM  booking WHERE status = 'pending' ORDER BY user_Id";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
     
      <th scope="row"><?php echo $row['user_Id']; ?></th>
      <td><?php echo $row['Package_Name']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo $row['Email_Id']; ?></td>
    <td> <?php echo $row['Mobile_No']; ?></td>
     <td><?php echo $row['Package_Type']; ?> </td>
    <td><?php echo $row['Tour_Date']; ?></td>  
    <td><?php echo $row['Package_Duration']; ?></td>
     <td><?php echo $row['Booking_Date']; ?></td>
      <td><?php echo $row['Package_Price']; ?> Rs</td>
       

     <td>
		<form action="book.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['user_Id']; ?>"/>
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp <br>
		<input type="submit" name="delete" value="delete"> 

		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>


<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
	$select = "UPDATE booking SET status = 'approved' WHERE user_Id = '$id' ";
	$resut = mysqli_query($conn,$select);
	//header("location:book.php");
    echo "<script>alert('Your Package Approved Succesfully..!')</script>";
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM booking  WHERE user_Id = '$id' ";
	$resut = mysqli_query($conn,$select);
	//header("location:book.php");
}

 ?>






<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 


 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
    <th scope="col">#</th>
     <th scope="col">Package Name</th>
     <th scope="col">User Name</th>
     <th scope="col">Email_Id</th>
     <th scope="col">Mobile-No</th>
     <th scope="col">Package-Type</th>
     <th scope="col">Tour-Date</th>
     <th scope="col">Package-Duration</th>
     <th scope="col">Booking-Date</th>
     <!-- <th>Package Name</th> -->
     <th scope="col">Package-Price</th>
     <!-- <th>Package-Duration</th> -->
     <!-- <th>Package-Type</th> -->
     <!-- <th>Booking-Date</th> -->
     <th scope="col">Status</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  booking";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      

      <th scope="row"><?php echo $row['user_Id']; ?></th>
      <td><?php echo $row['Package_Name']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo $row['Email_Id']; ?></td>
    <td> <?php echo $row['Mobile_No']; ?></td>
     <td><?php echo $row['Package_Type']; ?> </td>
    <td><?php echo $row['Tour_Date']; ?></td>  
    <td><?php echo $row['Package_Duration']; ?></td>
     <td><?php echo $row['Booking_Date']; ?></td>
      <td><?php echo $row['Package_Price']; ?> Rs</td>
      <td style=color:green; font-weight:bold;><?php echo $row['Status']; ?></td>


    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>