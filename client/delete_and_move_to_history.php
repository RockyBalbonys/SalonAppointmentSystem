<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bookingId"])) {
    $bookingId = $_POST["bookingId"];

    // Start a transaction
    mysqli_begin_transaction($conn);

    // Insert into tbl_history
    $insertIntoHistory = "INSERT INTO tbl_history SELECT * FROM tbl_bookings WHERE booking_id = $bookingId";
    $resultInsert = mysqli_query($conn, $insertIntoHistory);

    // Delete from tbl_bookings
    $deleteFromBookings = "DELETE FROM tbl_bookings WHERE booking_id = $bookingId";
    $resultDelete = mysqli_query($conn, $deleteFromBookings);

    if ($resultInsert && $resultDelete) {
        // Both operations succeeded, commit the transaction
        mysqli_commit($conn);
        echo "Success"; // You can return any message you want
    } else {
        // An error occurred, rollback the transaction
        mysqli_rollback($conn);
        echo "Error"; // You can return any error message you want
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
