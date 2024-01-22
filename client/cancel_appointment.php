<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking ID from the form
    $booking_id = $_POST["booking_id"];

    // Prepare and execute the DELETE query
    $deleteAppointmentQuery = "DELETE FROM tbl_bookings WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $deleteAppointmentQuery)) {
        // Appointment canceled successfully, redirect back to the profile page
        header("Location: user_profile.php");
        exit();
    } else {
        // Handle the case where the deletion fails
        echo "Error canceling appointment: " . mysqli_error($conn);
    }
} else {
    // Redirect if accessed directly without a POST request
    header("Location: profile.php");
    exit();
}
?>
