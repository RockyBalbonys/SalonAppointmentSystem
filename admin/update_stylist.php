<?php
include 'connection.php';

$response = array("success" => false);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stylistID = mysqli_real_escape_string($conn, $_POST['stylist_id']);
    $stylistName = mysqli_real_escape_string($conn, $_POST['stylist_name']);

    $query = "UPDATE tbl_stylists SET stylist_name = '$stylistName' WHERE stylist_id = '$stylistID'";

    if (mysqli_query($conn, $query)) {
        $response["success"] = true;
    } else {
        $response["error"] = mysqli_error($conn);
    }
}

mysqli_close($conn);
echo json_encode($response);
?>
