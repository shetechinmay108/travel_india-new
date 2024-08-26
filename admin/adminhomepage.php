<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Document</title>
    <style>
      *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    
}

body{
    background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("/images/activity/adminpares.jpg");
    background-size: cover;
}

.contener{
    display: flex;
    width: 100%;
    height: 100vh;
    background-color: blue;
    background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("/images/activity/adminpares.jpg");
    
    background-size: cover;
    position:absolute; 
}

.nevbar{
    font-size: 18px;
    display: flex;
    width: 100%;
    background-color:  transparent;
     
}


.nevbar img{
    padding: 13px;
}

.nevbar ul{
    display: flex;
    list-style: none;
    margin-left: 27px;
    padding: 18px;
}

.nevbar ul li{
    margin-left: 37px;
    
}

.nevbar a{
    text-decoration: none;
    font-size: 24;
    font-weight: bold;
    color: white;
    
}

.nevbar a span{
    color: orangered;
}

.nevbar a:hover{
    color: orangered;
}

.btn{
    margin-top: 7.5px;
    width: 600px;
    height: 60px;
    margin-right: 10px;
    margin-right: 10px;
    text-align: end;
}

 mark{
    font-size: 21px;
    margin-right: 15px;
}

.btn button{
    height: 42px;
    width: 110px;
    background-color: orange;
    font-size: 19px;
    border-radius: 13px;
     
}

.btn button:hover{
    background-color: transparent;
    border: 2px solid white;
}

.contener2{
    width: 100%;
    height: 91vh;
    
    text-align: center;
     position: absolute;
     margin-top: 9vh;
     justify-content: center;
     align-items: center;
    
}

.contener2 .h1{
    font-weight: bold;
    font-size: 35px;
    margin: 9px;
    margin-top: 205px;
    color: white;
}

.contener2 .h1 span{
    background-color: red;
    color: white;
}
    
.contener2 .p{
    font-size: 25px;
    color: white;

}

.contener2 .user{
    width: 180px;
    height: 50px;
    background-color: brown;
    padding-top: 9px;
    display: inline-block;
    margin-top: 11px; 
    margin-right: 9px;
    overflow: hidden;
}

.contener2 .user:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
    
}

.contener2 .user a{
    text-decoration: none;
    color: white;
    font-size: 25px;
    
}

.contener2 .package{
    width: 180px;
    height: 50px;
    background-color:chocolate;
    padding-top: 9px;
    display: inline-block;
    margin-top: 11px; 
    margin-right: 9px;
    overflow: hidden;
}

.contener2 .package:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
}

.contener2 .package a{
    text-decoration: none;
    color: white;
    font-size: 25px;
}

.contener2 .hotel{
    width: 180px;
    height: 50px;
    background-color:chartreuse;
    padding-top: 9px;
    display: inline-block;
    margin-top: 11px; 
    margin-right: 9px;
    overflow: hidden;
}

.contener2 .hotel:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
}

.contener2 .hotel a{
    text-decoration: none;
    color: white;
    font-size: 25px;
}

.contener2 .booking{
    width: 180px;
    height: 50px;
    background-color: green;
    padding-top: 9px;
    display: inline-block;
    margin-right: 9px; 
    overflow: hidden;
}

.contener2 .booking:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
    
}

.contener2 .booking a{
    text-decoration: none;
    color: white;
    font-size: 25px;
    
}

.contener2 .hotel_booking{
    width: 180px;
    height: 50px;
    background-color:crimson;
    padding-top: 9px;
    display: inline-block;
    margin-right: 9px; 
    overflow: hidden;
}

.contener2 .hotel_booking:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
    
}

.contener2 .hotel_booking a{
    text-decoration: none;
    color: white;
    font-size: 25px;
    
}





.contener2 .contact{
    width: 180px;
    height: 50px;
    background-color: orange;
    padding-top: 9px;
    display: inline-block;
    overflow: hidden; 
}

.contener2 .contact:hover{
    background-color: black;
    border: 2px solid white;
    color: white;
    
}

.contener2 .contact a{
    text-decoration: none;
    color: white;
    font-size: 25px;
    
}



    </style>
 </head>
 <body>
 <div class="contener">
    <div class="nevbar"><img src="/images/logo.png" alt="" width="100px" height="65px">
      <ul>
         <li><a href="adminhomepage.php"><span>Dashboard</span></a></li>
         <li><a href="user_data.php"> User-Records</a></li>
         <li><a href="booking.php">Booking</a></li>
         <li><a href="contact_data.php">Contact Us</a></li>
      </ul>  
     
      <div class="btn"><mark> admin@gmail.com</mark><button><a href="../index.php">Logout</a></button></div>
    </div>
 </div>

 <div class="contener2">
    <div class="h1">hi ,<span>admin</span> </div>
    <div class="p">this is an admin page</div> 
    
    <div class="user"> <a href="user_data.php">User Record</a></div>
    <div class="package"> <a href="add_packages.php">Add New Tour</a></div>
    <div class="hotel"> <a href="add_hotels.php">Add New Hotels</a></div>
    <div class="booking"> <a href="booking_approvel/book.php">Tour Record</a></div>
    <div class="hotel_booking"> <a href="booking_approvel/hotel_book.php">Hotel Record</a></div>
    <div class="contact"> <a href="feedbackdata.php">Feedback data</a></div>
</div>
 </body>
 </html>