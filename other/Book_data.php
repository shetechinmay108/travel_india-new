<?php
include("../config/connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>package Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../css/pwd_update.css">
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
        }

        .page1 {
            width: 100%;
            min-height: 100vh;
            padding: 0 2vw;
            overflow-x: hidden;
        }

        .part1 {
            width: 100%;
            min-height: 10vh;
            justify-content: center;
            display: flex;
            border: .2vw solid white;
        }

        table {
            font-family: aeonik;
            width: 100%;
            border-collapse: collapse;
            padding: 2vw;
        }

        th,
        td {
            padding: 1vw;
            text-align: center;
        }

        th {
            font-size: 1.2vw;
            font-weight: 400;
            text-transform: capitalize;
            font-family: aeonik;
            border-bottom: .2vw solid white;
        }

        td {
            font-size: 1.2vw;
            border-bottom: 0.2vw solid white;
        }

        button {
            font-size: 1.5vw;
            background-color: transparent;
            border: none;
        }

        #msg {
            text-align: left;
        }

        .submitButton {
            padding: 0.5vw;
            background-color: transparent;
            color: black;
            border: none;
            border-radius: 0.5vw;
            cursor: pointer;
            margin-bottom: 1vw;
            font-size: 1.2vw;
            border: 1px solid black;
        }

        .submitButton:hover {
            background-color: black;
            transition: 0.7s;
            color: white;
            border: 1px solid white;
            border-radius: 0.8vw;
        }

        @media (max-width: 600px) {
            .page1 {
                padding: 0 4vw;
            }

            table {
                display: block;
                overflow-x: auto;
            }

            th, td {
                font-size: 3vw;
                padding: 2vw;
            }

            .nav h1 {
                font-size: 5vw;
            }

            .nav-part1 h2, .nav-part2 h3 {
                font-size: 3.5vw;
            }

            .submitButton {
                font-size: 3vw;
                padding: 2vw;
            }
        }

    </style>
</head>

<body>
    <div class="page1">
        <div class="nav">
            <div class="nav-part1">
                <h2 id="nav-part3">Tour Records</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="homepage.php">Home</a></h3>
            </div>
        </div>
        <div class="part1">

            <table>
                <tr>
                    <th>Package Name</th>
                    <th>User Name</th>
                    <th>Email_Id</th>
                    <th>Mobile-No</th>
                    <th>Package-Type</th>
                    <th>Tour-Date</th>
                    <th>Package-Duration</th>
                    <th>Booking-Date</th>
                    <th>Package-Price</th>
                    <th>Status</th>
                </tr>
                <?php
           
            


                $user = $_SESSION["email"];
                $query = mysqli_query($conn, "select * from users where email ='$user'");
                $row = mysqli_fetch_array($query);
                $id = $row['user_Id'];
                $sql = "select * from booking where user_Id = '$id'";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                <td>" . $row['Package_Name'] . "</td>
                <td>" . $row['User_Name'] . "</td>
                <td>" . $row['Email_Id'] . "</td>
                <td>" . $row['Mobile_No'] . "</td>
                <td>" . $row['Package_Type'] . "</td>
                <td>" . $row['Tour_Date'] . "</td>
                <td>" . $row['Package_Duration'] . "</td>
                <td>" . $row['Booking_Date'] . "</td>
                <td>" . $row['Package_Price'] . " Rs</td>
                <td class=status-cell>". $row['Status'] . "</td>
              </tr>";
                    }
                }
                ?>
            </table>
        </div>
        <div class="nav1">
            <div class="nav-part1">
                <h2 id="nav-part3">Hotel Records</h2>
            </div>
            <h1>the real travel</h1>
            <div class="nav-part2">
                <h3><a href="#"> </a></h3>
            </div>
        </div>
        <div class="part1">

            <table>
                <tr>
                    <th>Hotel Name</th>
                    <th>User Name</th>
                    <th>Email_Id</th>
                    <th>Mobile-No</th>
                    <!-- <th>Hotel Address</th> -->
                    <th>Staying_Date</th>
                    <th>Staying Days</th>
                    <th>Booking-Date</th>
                    <th>Hotel-Price</th>
                    <th>Status</th>
                </tr>
                <?php
                $user = $_SESSION["email"];
                $query = mysqli_query($conn, "select * from users where email ='$user'");
                $row = mysqli_fetch_array($query);
                $id = $row['user_Id'];
                $sql = "select * from hotel_booking where user_Id = '$id'";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                <td>" . $row['Hotel_Name'] . "</td>
                <td>" . $row['User_Name'] . "</td>
                <td>" . $row['Email_Id'] . "</td>
                <td>" . $row['Mobile_No'] . "</td>
                
                <td>" . $row['date'] . "</td>
                <td>" . $row['Duration'] . "</td>
                <td>" . $row['created_booking'] . "</td>
                <td>" . $row['Price'] . " Rs</td>
                <td class=status-cell>" . $row['Status'] . "</td>
              </tr>";
              //echo style=color:green; font-weight:bold
                    }
                }
                ?>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const statusCells = document.querySelectorAll(".status-cell");
                        statusCells.forEach(function(cell) {
                            if (cell.textContent === "Approved") {
                                cell.style.color = "green";
                                cell.style.fontWeight = "bold";
                            } else if (cell.textContent === "Pending") {
                                cell.style.color = "red";
                                cell.style.fontWeight = "bold";
                            }
                        });
                    });
                </script>
            
            </table>
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