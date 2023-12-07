<?php
    include "connection.php";  

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookingId'])) {
        $bookingId = $_POST['bookingId'];

        // Perform the deletion in the database
        $deleteQuery = "DELETE FROM tbl_bookings WHERE booking_id = $bookingId";
        mysqli_query($conn, $deleteQuery);
        
        // You might want to check for success and return appropriate response
        // For simplicity, we assume it always succeeds here
        echo 'success';
    } else {
        // Handle invalid requests
        http_response_code(400);
        echo 'Invalid request';
    }
?>
