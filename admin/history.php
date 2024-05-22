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
    <title>Booking History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
    body {
        background-color: #fcf0e1;
        margin-top: 20px;
        margin-bottom: 20px;

    }

    .sidebar {
        background-color: #f8d7da; 
        min-height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px; 
        padding: 20px;
    }

    .sidebar a {
        display: block;
        margin-bottom: 40px;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }


    .btn1{
        background-color: #b55e5a;
        color: #fff;
        border: 1px solid #fff;
        border-radius: 5px;
        transition: all 0.3s ease;
        }

    .btn{
        background-color: #b55e5a;
        color: #fff;
        transition: all 0.3s ease;
        }
        
    .btn:hover{
        border: 1px solid #b55e5a;
        transition: all 0.3s ease;
        }

    .logo{
        font-family: 'Lucida Calligraphy', cursive;
        margin-top: 20px; 
        margin-bottom: 30px;
        color: #381d1a;
        font-weight: 600;
        font-size: 20px;
        margin-left: 10px; 
    }



    </style>
</head>
<body>
    <div class="sidebar">
            <div class="logo">recover.hair</div>
            <hr>

                <ul class="nav flex-column mt-4">
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
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="content.php">Content</a>
                    </li>
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a class="btn btn-dark" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
    
            </nav>
            <div class= "content">
            <div class="text-center mt-5">
                <h2>History</h2>
            </div>

            <div>
            <?php
    // SELECT query
    $selectAllAppointments = "SELECT * FROM tbl_history
    JOIN tbl_users ON tbl_history.booking_user = tbl_users.user_id
    JOIN tbl_booking_status ON tbl_history.booking_status = tbl_booking_status.booking_status_id
    ORDER BY tbl_history.booking_date DESC, tbl_history.booking_time DESC;";

    // Execute the SELECT query
    $query = mysqli_query($conn, $selectAllAppointments);

    if (!$query) {
        // Handle SELECT query errors
        echo "Error fetching appointments: " . mysqli_error($conn);
    } else {
        // Output the table for SELECT results
        echo '<table class="table table-sm table-hover table-light table-borderless text-center" id="bookingTable">
                    <thead>
                        <tr>
                            <th>Booking ID</th> 
                            <th>User</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';

        while ($row = mysqli_fetch_array($query)) {
            echo '<tr data-booking-id="' . $row["booking_id"] . '">';
            echo '<td>' . $row["booking_id"] .  '</td>';
            echo '<td>' . $row["user_firstname"] . " " . $row["user_lastname"] . '</td>';
            $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
            echo '<td>' .  $formattedDate . '</td>';
            $formattedTime = date('h:i A', strtotime($row["booking_time"]));
            echo '<td>' . $formattedTime . '</td>';
            echo '<td>' . $row["booking_status"] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';

        // UPDATE query
        $updateStatusQuery = "UPDATE tbl_history 
            SET booking_status = 2
            WHERE booking_status = 1";

        // Execute the UPDATE query
        if (mysqli_query($conn, $updateStatusQuery)) {
            // Update was successful
        } else {
            // Handle UPDATE query errors
            echo "Error updating status: " . mysqli_error($conn);
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
    }
?>