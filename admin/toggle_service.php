<?php
// Include database connection
include "connection.php";

// Check if form is submitted and service ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["service_id"])) {
    // Sanitize input
    $serviceID = mysqli_real_escape_string($conn, $_POST["service_id"]);

    // Fetch the current isActive status of the service
    $query = "SELECT isActive, service FROM tbl_booking_services WHERE service_id = '$serviceID'";
    $result = mysqli_query($conn, $query);

    // If service exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $isActive = $row['isActive'];
        $serviceName = $row['service'];

        // Toggle isActive status
        $newIsActive = $isActive ? 0 : 1;

        // Update isActive status in the database
        $updateQuery = "UPDATE tbl_booking_services SET isActive = '$newIsActive' WHERE service_id = '$serviceID'";
        if (mysqli_query($conn, $updateQuery)) {
            // Prepare success response with updated isActive value (optional)
            $response = array('success' => true, 'isActive' => $newIsActive, 'serviceName' => $serviceName);
            echo json_encode($response);
            exit();
        } else {
            // Error message
            $response = array('success' => false, 'message' => 'Error toggling service isActive status: ' . mysqli_error($conn));
            echo json_encode($response);
            exit();
        }
    } else {
        // Service not found
        $response = array('success' => false, 'message' => 'Service not found.');
        echo json_encode($response);
        exit();
    }
} else {
    // Invalid request
    $response = array('success' => false, 'message' => 'Invalid request.');
    echo json_encode($response);
    exit();
}
?>
