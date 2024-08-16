<?php
   include("../config/connection.php");
   error_reporting(0);




   //step 1 => Get users data by users id

   if(isset($_GET['id'])){
    $sql = "select * from tour_package where TourPackage_Id = " .  $_GET['id'];
     $result = $conn->query($sql);
     // echo"<pre>";
     // print_r($result);
     $data = mysqli_fetch_assoc($result);
     // echo "<pre>";
     // print_r($users);
     if($data){
         //echo "Data collected successes..!";
     }
 }
 else{
     echo "Invalid request..!";
     exit;
 }



 //step 2 => update user data by from submit
      

 if(isset($_POST['submit'])){
   // extract($_POST);   
    $Package_Name = $_POST['package_name'];
    $Package_Type = $_POST['package_type'];
    $Package_Location = $_POST['Package_Location'];
    $Package_Price = $_POST['Package_price'];
    $Package_Features = $_POST['package_features'];
    $Package_Details = $_POST['package_details'];
    //$folder = $_POST['package-img_old'];
    $file = $_FILES['package-img']['name'];
    $tempname = $_FILES['package-img']['tmp_name'];
    $folder = '../image/'.$file;
    move_uploaded_file( $tempname,$folder);

    
// ('$Package_Name','$Package_Type','$Package_Location','$Package_Price','$Package_Features','$Package_Details','$folder ')";
//$result = $conn->query($sql);
 //$sql=  "update stdinfo set name ='$name', number = '$number', address='$address' where id = ".$_POST['id'];
 //$sql ="UPDATE tour_package SET fname='$fname', lname='$lname',email='$email' where id = ".$_GET['id'] ; 
 $sql ="UPDATE tour_package SET Package_Name='$Package_Name', Package_Type='$Package_Type', Package_Location='$Package_Location', Price='$Package_Price', Package_Features='$Package_Features', Package_Details='$Package_Details', Package_Image='$folder' WHERE TourPackage_Id = " .  $_GET['id'];
   $result = $conn->query($sql);

   if($result){
    echo  "<script>alert('Data updated Successfully..!')</script>";
       
      // header("location:tourlist.php");
       header("Refresh:0.5; url=tourlist.php");
   }
   else{
       echo "Not Updated..!";
   }
 }     


 ?>



<html>
<head>
     <style>
         .addpost{
             width:40%;
             position:absolute;
             top:14%;            
             left:29%;
             background-color:rgb(60, 124, 197);
             box-shadow:2px 2px 3px 2px skyblue;
             font-size:20px;
             font-weight:bold;
             text-align:center;
         }

         a{
            text-decoration: none;
             
         }
          
          

     </style>
 </head>

<body>

 <h4 class='adm-h4' style="text-align: center; font-size:24px; margin-top:40px;">Update Tour Package</h4>
<div class="addpost">

 
  <!-- Form -->
  <form  action=" " method="POST" enctype="multipart/form-data">
                     
                         <div><label for="post_title"   >Package Name</label></div> 
                          <input style="width:80%; height:35px" value="<?php echo $data['Package_Name'] ?>" type="text" name="package_name" placeholder="Create Package"  autocomplete="off" required> <br>
                    
                          <div> <label for="product-author">Package Type</label></div>
                          <input style="width:80%; height:35px" value="<?php echo $data['Package_Type'] ?>" type="text" name="package_type"  placeholder="Pacakge type eg: Familly Package / Couple Package" required />
                          
                          <div> <label for="product-Location">Package Location</label></div>
                          <input style="width:80%; height:35px" value="<?php echo $data['Package_Location'] ?>" type="text" name="Package_Location" placeholder="Package Location"  value="" required />
                          
                     
                          <div> <label for="product-price">Price </label></div>
                          <input style="width:80%; height:35px" value="<?php echo $data['Price'] ?>" type="number" name="Package_price" placeholder="Package price"  value="" required />

                          <div><label for="package_features">Package Features</label></div> 
                          <input style="width:80%; height:35px" value="<?php echo $data['Package_Features'] ?>" type="text" name="package_features" placeholder="Package features..!" autocomplete="off" required> <br>
                         
                          <div><label for="package_details">Package Details</label></div>
                          <textarea rows='4' cols='1' style="width:80%;"   name="package_details" placeholder="Package Details"  required><?php echo $data['Package_Details'] ?></textarea>  
                           <!-- <input type="text" value="" style="width:80%;" name="package_details" placeholder="Package Details"  required> -->
            
                           <div > <label  for="image-post">Package Image</label>       
                           <input style="width:50%;" name="package-img" type="file" required>
                            
                      <input style="width:100px;margin-top:5px" type="submit" name="submit"  value="Update" required /></div>
                  </form>
                  


 </div>


     </body>
</html>


