<?php
    include  "connection.php";  
    include "sessions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
            <nav class="navbar">
                <div class="nav-item">Bookings</div>
                <div class="nav-item">History</div>
                <div class="nav-item"><a href="logout.php">log out</a></div>
            </nav>
            <div class="h2">
                Welcome, Admin!
            </div>
            <div>
                <?php
                     $selectAllAppointments = "SELECT * FROM tbl_bookings 
                     JOIN tbl_users 
                     ON tbl_bookings.booking_user = tbl_users.user_id
                     ORDER BY booking_date ASC, booking_time ASC;"; 
                   
                    $query = mysqli_query($conn, $selectAllAppointments);
                    
                    if (mysqli_query($conn, $selectAllAppointments)) {
                       echo '<table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>User</th>
                                           <th>Date</th>
                                           <th>Time</th>
                                           <th>Status</th>
                                           <th>Buttons</th>
                                       </tr>
                                   </thead>
                                   <tbody>';
   
                           while ($row = mysqli_fetch_array($query)) {
                               echo '<tr>';
                               echo '<td>' . $row["user_firstname"] . " " . $row["user_lastname"] . '</td>';
                               $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                               echo '<td>' .  $formattedDate . '</td>';
                               $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                               echo '<td>' . $formattedTime . '</td>';
                               echo '<td>' . $row["booking_status"] . '</td>';
                               echo '<td>' . "<div class='btn'>X</div>" . '</td>';
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