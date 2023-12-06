<?php
    include "connection.php";
    include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

        <div class="container">
            <nav class="navbar border">
                <div><a href="landingpage.php">Salon Name</a></div>
                <div><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">logout</a></div>
            </nav>
              <div>
                 <?php 
                $user_id = $_SESSION["user_id"];
                $user_firstname = $_SESSION["user_firstname"];
                $user_lastname = $_SESSION["user_lastname"];
                $user_gender = $_SESSION["user_gender"];
                $user_phonenumber = $_SESSION["user_phonenumber"];

                echo "<div class='h1'>" . $user_firstname . ' ' . "$user_lastname </div>";
                echo "<div class='label'> $user_phonenumber </div>";

                 echo $_SESSION["user_firstname"]. "'s upcoming Appointment(s)";
                 $selectAllAppointments = "SELECT * FROM tbl_bookings 
                 JOIN tbl_users 
                 ON tbl_bookings.booking_user = tbl_users.user_id 
                 WHERE $user_id = tbl_bookings.booking_user
                 ORDER BY booking_date ASC, booking_time ASC;";
                 $query = mysqli_query($conn, $selectAllAppointments);
                 
                 if (mysqli_query($conn, $selectAllAppointments)) {
                    echo '<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Service Chosen</th>
                                    </tr>
                                </thead>
                                <tbody>';

                        while ($row = mysqli_fetch_array($query)) {
                            echo '<tr>';
                            $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                            echo '<td>' . $formattedDate . '</td>';
                            $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                            echo '<td>' . $formattedTime . '</td>';
                            echo '<td>' . $row["booking_service"] . '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>
                            </table>';

                 }
                 
                 
                 ?>
                 
              </div>
        </div>


    
</body>
</html>