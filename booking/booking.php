<?php
    include("../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="booking.css" />
  </head>
  <body>
    <div class="main">
      <div class="page">
        <form action="" method="POST">
           <div class="input-section">
               <input type="text" placeholder="FirstName" name="" id=""  required/>
               <input type="text" placeholder="LastName" name="" id="" required /> 
               <input type="text" placeholder="address" name="" id="" required />
               <input type="email" placeholder="email" name="" id="" required />
               <input type="tel" placeholder="PhoneNumber" name="" id="" required />
               <input type="tel" placeholder="persons" name="" id="" required />
               <input list="text-options" id="text" placeholder="packages" />
               <datalist id="text-options">
                   <option value="Silver "></option>
                   <option value="Gold"></option>
                  <option value="Dimond"></option>
               </datalist>
               <input list="location-options" id="text" placeholder="Location" />
               <datalist id="location-options">
               <option value="Silver"></option>
               <option value="Gold"></option>
               <option value="Dimond"></option>
              </datalist>
           </div>
        </form>

      </div>
    </div>

    <script src="booking.js"></script>
  </body>
</html>
