<?php
include "connection.php";  
include "sessions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stylistID = mysqli_real_escape_string($conn, $_POST['stylist_id']);

    $query = "DELETE FROM tbl_stylists WHERE stylist_id = '$stylistID'";

    if (mysqli_query($conn, $query)) {
        header("Location: content.php");  // Redirect back to the main page
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
