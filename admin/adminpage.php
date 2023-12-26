<?php
    include "connection.php";  
    include "sessions.php";
    if (!isset($_SESSION["admin_username"])) {
        header("Location: 404.php");
    } else {    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
            <nav class="navbar">
                <div class="nav-item">ADMIN PAGE</div>
                <div class="nav-item"> <a href  ="adminpage.php">Bookings</a> | <a href  ="users.php">Users</a> | <a href  ="messages.php">Messages</a> | <a href  ="history.php">History</a> | <a href="logout.php">Log Out</a></div>
            </nav>
            <div class="h2">
                Welcome, Admin!
            </div>
            <div class="container row text-center mt-5 mb-5">
                <div class="text-center col-6">
                    Upcoming Appointments: 
                    <div class="text-center h1"><?php 
                    $countActive = "SELECT COUNT(*) AS row_count 
                   FROM `tbl_bookings` 
                   WHERE booking_status = 1";
                   $result = mysqli_query($conn, $countActive);
                   // Check if the query was successful
                   if ($result) {
                       // Fetch the result as an associative array
                       $row = mysqli_fetch_assoc($result);
                   
                       // Access the count
                       $rowCount = $row['row_count'];
                   
                       // Output the count
                       echo $rowCount;
                   
                       // Free the result set
                       mysqli_free_result($result);
                   } else {
                       // Handle the query error
                       echo "Error: " . mysqli_error($conn);
                   }
                    ?></div>
                </div>
                <div class="text-center col-6">
                    <div class="text-center "></div>Finished Appointments: 
                    <div class="h1"><?php 
                    $countActive = "SELECT COUNT(*) AS row_count 
                   FROM `tbl_history` 
                   WHERE booking_status = 2";
                   $result = mysqli_query($conn, $countActive);
                   // Check if the query was successful
                   if ($result) {
                       // Fetch the result as an associative array
                       $row = mysqli_fetch_assoc($result);
                   
                       // Access the count
                       $rowCount = $row['row_count'];
                   
                       // Output the count
                       echo $rowCount;
                   
                       // Free the result set
                       mysqli_free_result($result);
                   } else {
                       // Handle the query error
                       echo "Error: " . mysqli_error($conn);
                   }
                    ?></div>
                </div>
            </div>
            <div>
                <?php
                    $selectAllAppointments = "SELECT * FROM tbl_bookings 
                    JOIN tbl_users 
                    ON tbl_bookings.booking_user = tbl_users.user_id
                    JOIN tbl_booking_services
                    ON tbl_bookings.booking_service = tbl_booking_services.service_id
                    JOIN tbl_booking_status
                    ON tbl_bookings.booking_status = tbl_booking_status.booking_status_id
                    ORDER BY booking_date ASC, booking_time ASC;"; 
                   
                    $query = mysqli_query($conn, $selectAllAppointments);
                    
                    if (mysqli_query($conn, $selectAllAppointments)) {
                       echo '<table class="table table-bordered" id="bookingTable">
                                   <thead>
                                       <tr>
                                           <th>Booking_ID</th>
                                           <th>User</th>
                                           <th>Date</th>
                                           <th>Time</th>
                                           <th>Service Chosen</th>
                                           <th>Status</th>
                                           <th>Buttons</th>
                                       </tr>
                                   </thead>
                                   <tbody>';
   
                           while ($row = mysqli_fetch_array($query)) {
                               echo '<tr data-booking-id="' . $row["booking_id"] . '">';
                               echo '<td>' . $row["booking_id"] . '</td>';
                               echo '<td>' . $row["user_firstname"] . " " . $row["user_lastname"] . '</td>';
                               $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                               echo '<td>' .  $formattedDate . '</td>';
                               $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                               echo '<td>' . $formattedTime . '</td>';
                               echo '<td>' . $row["service"] . '</td>';
                               echo '<td>' . $row["booking_status"] . '</td>';
                               echo '<td>' . "<div class='btn delete-btn btn-primary'>Done</div>" . '</td>';
                               echo '</tr>';
                           }
   
                           echo '</tbody>
                               </table>';
   
                    }
                ?>
            </div>
    </div>

    <script>
           $(document).ready(function() {
    // Handle delete button click
    $('.delete-btn').on('click', function() {
        var bookingId = $(this).closest('tr').data('booking-id');

        // Send AJAX request to delete.php with bookingId and move to history
        $.ajax({
            type: 'POST',
            url: 'delete_and_move_to_history.php', // Create a new PHP script for this operation
            data: { bookingId: bookingId },
            success: function(response) {
                // Remove the row from the table
                $('#bookingTable tr[data-booking-id="' + bookingId + '"]').remove();
            },
            error: function(error) {
                console.error('Error deleting booking:', error);
            }
        });
    });
});

        </script>
</body>
</html>
<?php
    }
?>
