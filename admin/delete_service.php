<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["service_id"])) {
        $serviceID = $_POST["service_id"];

        // SQL to delete a service by its ID
        $sql = "DELETE FROM tbl_booking_services WHERE service_id = $serviceID";

        if (mysqli_query($conn, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    header("Location: 404.php");
}
?>
