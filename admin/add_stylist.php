<?php
include "connection.php";  
include "sessions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stylistName = mysqli_real_escape_string($conn, $_POST['new_stylist_name']);

    $query = "INSERT INTO tbl_stylists (stylist_name) VALUES ('$stylistName')";

    if (mysqli_query($conn, $query)) {
        header("Location: content.php");  // Redirect back to the main page
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
