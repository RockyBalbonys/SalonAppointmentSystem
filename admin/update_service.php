<?php
// Include database connection
include "connection.php";

// Check if form is submitted and service ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["service_id"])) {
  // Sanitize input
  $serviceID = mysqli_real_escape_string($conn, $_POST["service_id"]);
  $serviceName = mysqli_real_escape_string($conn, $_POST["service_name"]);
  $serviceCost = mysqli_real_escape_string($conn, $_POST["service_cost"]);

  // Update service in the database
  $updateQuery = "UPDATE tbl_booking_services SET service = '$serviceName', service_cost = '$serviceCost' WHERE service_id = '$serviceID'";
  
  if (mysqli_query($conn, $updateQuery)) {
    // Prepare success response
    $response = array('success' => true);
    /* echo json_encode($response); */
    header("Location: content.php");
  } else {
    // Error message
    $response = array('success' => false, 'message' => mysqli_error($conn));
    echo json_encode($response);
  }
} else {
  // Invalid request
  $response = array('success' => false, 'message' => 'Invalid request');
  echo json_encode($response);
}
?>
