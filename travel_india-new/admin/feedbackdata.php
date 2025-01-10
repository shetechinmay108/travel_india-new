<?php
include("../config/connection.php");
error_reporting(0);

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if (isset($_GET['IDe'])) {
    $sql = "DELETE FROM feedback WHERE msg_Id = " . $_GET['IDe'];
    $Result = $conn->query($sql);
    if ($Result) {
        header("location:feedbackdata.php");
    } else {
        echo "Not Deleted..!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Data</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
    <link rel="stylesheet" href="../Authentication/pwd_update.css">
    <style>
         

        html,
        body {
            width: 100%;
            height: 100%;
        }

        .page1 {
            width: 100%;
            min-height: 150vh;
            padding: 0 2vw;


        }
        .part1 {
            width: 100%;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;

            border: .2vw solid black;
        }
        table {
            font-family: twl;
            width: 100%;
            border-collapse: collapse;
            padding: 2vw;
            /* text-transform: capitalize; */
        }

        th,
        td {
            padding: 1vw;
            text-align: center;
        }

        th {
            font-size: 2vw;
            font-weight: 400;
            text-transform: capitalize;
            font-family: regular;
            border-bottom: .2vw solid black;
        }

        td {
            font-size: 1.3vw;
            border-bottom: 0.2vw solid black;
        }
 
        button {
            font-size: 1.5vw;
            background-color: transparent;
            border: none;
        }
        #msg{
            text-align: left;
        }
    </style>
</head>

<body>
 
        <div class="page1">
        <div class="nav">
        <div class="nav-part1">
            <h2 id="nav-part3">Feedback Data</h2>
        </div>
        <h1>the real travel</h1>
        <div class="nav-part2">
            <h3><a href="adminhomepage.php">Home</a></h3>
            <h3><a href="hotellist.php">hotels</a></h3>
            <h3><a href="tourlist.php">package</a></h3>
        </div>
    </div>

            <div class="part1">
                <?php include("include.php"); ?>
                <table>
                    <tr>
                        <th>message_id</th>
                        <th>Name</th>
                        <th>Email_Id</th>
                        <th>Messages</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['msg_Id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td id="msg"><?php echo $row['massage']; ?></td>
                                <td><button><a href="feedbackdata.php?IDe=<?php echo $row['msg_Id'] ?>" style="text-decoration: none; color:red;">Delete</a></button></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
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