<?php 

include("../config/connection.php");
//include("../");
// include("../")
error_reporting(0);
    // include_once('./includes/navbar.php');
    // include_once('./includes/restriction.php');
    // if(!(isset($_SESSION['role']))){
    //     header("Location:login.php?unauthorizedAccess");
    //   }
    if(isset($_POST['submit'])){
        $Package_Name = $_POST['package_name'];
        $Package_Type = $_POST['package_type'];
        $Package_Location = $_POST['Package_Location'];
        $Package_Price = $_POST['Package_price'];
        $Package_Features = $_POST['package_features'];
        $Package_Details = $_POST['package_details'];

        $file = $_FILES['package-img']['name'];
        $tempname = $_FILES['package-img']['tmp_name'];
        $folder = '../image/'.$file;
        move_uploaded_file( $tempname,$folder);

        // "insert into tour_package(  Package_Name, Package_Type , Package_Location , Price , Package_Features , Package_Details, Package_Image) values 
        // ('$Package_Name','$Package_Type','$Package_Location','$Package_Price','$Package_Features','$Package_Details','$Package_image ')";
     
        $sql = "insert into tour_package(  Package_Name, Package_Type , Package_Location , Price , Package_Features , Package_Details, Package_Image) values 
        ('$Package_Name','$Package_Type','$Package_Location','$Package_Price','$Package_Features','$Package_Details','$folder ')";
        $result = $conn->query($sql);
     
        if($result){
           //echo "<script>alert('Your Registration succesfully..!')</script>";
           //move_uploaded_file($_FILES['package-img']['tmp_name'], "$folder");
           echo "<script>alert('New Tour Package Add succesfully..!')</script>";
           header("Refresh:0.5; url=tourlist.php");
        }
        else{
           echo "Invalid Query..!";
        }
     
     }

 ?>
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



 <h4 class='adm-h4' style="text-align: center; font-size:24px; margin-top:40px;">Create Tour Package</h4>
 <ul>
    <li><a href="adminhomepage.php">home</a></li>
    <li><a href="tourlist.php">Tour-list</a></li>
 </ul>
 <div class="addpost">

 
  <!-- Form -->
  <form  action=" " method="POST" enctype="multipart/form-data">
                     
                         <div><label for="post_title"   >Package Name</label></div> 
                          <input style="width:80%; height:35px" type="text" name="package_name" placeholder="Create Package" autocomplete="off" required> <br>
                    
                          <div> <label for="product-author">Package Type</label></div>
                          <input style="width:80%; height:35px" type="text" name="package_type"  placeholder="Pacakge type eg: Familly Package / Couple Package" required />
                          
                          <div> <label for="product-Location">Package Location</label></div>
                          <input style="width:80%; height:35px" type="text" name="Package_Location" placeholder="Package Location"  value="" required />
                          
                     
                          <div> <label for="product-price">Price </label></div>
                          <input style="width:80%; height:35px" type="number" name="Package_price" placeholder="Package price"  value="" required />

                          <div><label for="package_features">Package Features</label></div> 
                          <input style="width:80%; height:35px" type="text" name="package_features" placeholder="Package features..!" autocomplete="off" required> <br>
                         
                          <div><label for="package_details">Package Details</label></div>
                          <textarea rows='4' cols='1' style="width:80%;" name="package_details" placeholder="Package Details"  required></textarea>  
            
                          <div > <label  for="image-post">Package Image</label>       
                          <input style="width:50%;" name="package-img" type="file"  required>
                
                      <input style="width:100px;margin-top:5px" type="submit" name="submit"  value="Create" required /></div>
                  </form>
                  <!--/Form -->

                   <!-- <div> <label for="product-date">Date of Publication</label></div>
                          <input style="width:80%; height:35px" type="text" name="prod-date"  value="" required /> -->

                  <!-- <div> <label for="catagory">Category</label></div>
                          <select style="width:80%;height:30px" name="prod-category" value="">
                            <option value="adventure" selected>Adventure</option>
                            <option value="thriller">Thriller</option>
                            <option value="romantic">Romantic</option>
                            <option value="comedy">Comedy</option>
                          </select>   -->
                          <!-- <div><label for="type"> Type</label> <br></div>
                          <select style="width:80%;height:30px" name="prod-type" value="">
                            <option value="new">New</option>
                            <option value="old">Old</option>
                          </select>  <br> -->


 </div>




