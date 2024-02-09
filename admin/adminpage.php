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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style></style>
</head>
<body>
    <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-lg">
                    <span class="fw-bold text-dark align-center justify-content-start d-none d-md-inline">
                    Admin Page
                </span>
            <div class="justify-content-end d-none d-sm-inline">
                <ul class="nav justify-content-end">
                    <li class="nav-item text-dark">
                        <a class="nav-link text-dark fw-bold" href="adminpage.php">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="messages.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="history.php">History</a>
                    </li>
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a class="btn btn-dark" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
                </div>      
            </nav>
            <div class="text-center mt-4">
                <h2>Welcome, Admin!</h2>
            </div>
            <div class="container row justify-content-center align-items-center text-center mt-5 mb-5">
                <div class=" lead text-center col-6">
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
                <div class="lead text-center col-6">
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
                       echo '<table class="table table-lg table-hover table-light table-borderless" id="bookingTable">
                                   <thead class="text-center mb-3">
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
                               echo '<td class="text-center">' . $row["booking_id"] . '</td>';
                               echo '<td class="text-center">' . $row["user_firstname"] . " " . $row["user_lastname"] . '</td>';
                               $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                               echo '<td class="text-center">' .  $formattedDate . '</td>';
                               $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                               echo '<td class="text-center">' . $formattedTime . '</td>';
                               echo '<td class="text-center">' . $row["service"] . '</td>';
                               echo '<td class="text-center">' . $row["booking_status"] . '</td>';
                               echo '<td class="text-center">' . "<div class='btn btn-sm px-2 delete-btn btn-outline-dark'>Done</div>" . '</td>';
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
    }
?>
