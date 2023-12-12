<?php
    include "connection.php";  
    include "sessions.php";
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
                <div class="nav-item"><a href  ="adminpage.php">Bookings</a> | <a href  ="users.php">Users</a> | <a href  ="messages.php">Messages</a> | <a href  ="history.php">History</a> | <a href="logout.php">Log Out</a></div>
            </nav>
            <div class="h2">
                Users
            </div>
            <div>
                <?php
                    $selectAllUsers = "SELECT * FROM tbl_users
                     ORDER BY user_id"; 
                   
                    $query = mysqli_query($conn, $selectAllUsers);
                    
                    if (mysqli_query($conn, $selectAllUsers)) {
                       echo '<table class="table table-bordered" id="bookingTable">
                                   <thead>
                                       <tr>
                                           <th>id</th>
                                           <th>Email</th>
                                           <th>Name</th>
                                           <th>Phone Number</th>
                                       </tr>
                                   </thead>
                                   <tbody>';
   
                           while ($row = mysqli_fetch_array($query)) {
                               echo '<tr>';
                               echo '<td>' .  $row["user_id"] . '</td>';
                               echo '<td>' .  $row["user_email"] . '</td>';
                               echo '<td>' . $row["user_firstname"] . " " . $row["user_lastname"] . '</td>';
                               echo '<td>' . $row["user_phonenumber"] . '</td>';
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

                // Send AJAX request to delete.php with bookingId
                $.ajax({
                    type: 'POST',
                    url: 'delete.php',
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
