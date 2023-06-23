<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="User_previous_orders.css">
</head>
<body>
    <div id="cont">
        <div id="nav">
            <ul>
            <li> <a href="About_you_user.php">About you</a> </li>
                <li><a  href="place_order.html">place orders</a></li>
                <li><a class="active" href="User_previous_orders.php">Your previous record</a></li>
                <li><a  href="Edit_profile.html">Edit profile</a></li>
                <li><a href="/Blood_Donation_system/login/login.html">Log out</a></li>
            </ul>
        </div>
        <div id="main">
            <div id="head">
                
            </div>
            <div id="con">
                <h1>Your Previous Records</h1>
                <br><br>
                <table class="center">
                <tr>
                      <th>Sl No</th>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th>Branch ID</th>
                      <th>A+</th>
                      <th>A-</th>
                      <th>B+</th>
                      <th>B-</th>
                      <th>O+</th>
                      <th>O-</th>
                      <th>AB+</th>
                      <th>AB-</th>
                      <th>Status</th>
                    </tr>
                    <?php
                    // Set connection variables
				$server = "localhost";
				$username = "root";
				$password = "";
				$db="Blood_Donation_system";

				// Create a database connection
				$con = mysqli_connect($server, $username, $password,$db);

				// Check for connection success
				if(!$con){
					die("connection to this database failed due to" . mysqli_connect_error());
				}



				$sql="SELECT * FROM orders where user_id=".$_SESSION['user'].";";

				$result=$con->query($sql);
                $i=1;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                      echo "<tr>
                      <td>$i</td>
                      <td>" . $row["ord_id"]. "</td>
                      <td>" . $row["ord_date"]. "</td>
                      <td>" . $row["br_id"]. "</td>
                      <td>" . $row["a_p"]. "</td>
                      <td>" . $row["a_n"]. "</td>
                      <td>" . $row["b_p"]. "</td>
                      <td>" . $row["b_n"]. "</td>
                      <td>" . $row["o_p"]. "</td>
                      <td>" . $row["o_n"]. "</td>
                      <td>" . $row["ab_p"]. "</td>
                      <td>" . $row["ab_n"]. "</td>
                      <td>" . $row["status"]. "</td>
                    </tr>";
                    $i++;
                    }
                  } else {
                    echo "0 results";
                  }
                  $con->close();
                    ?>
                  </table>
            </div>
        </div>
    </div>

    <script src="User.js"></script>
</body>
</html>