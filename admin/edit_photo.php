<?php
    include "connection.php";
    
    // Check if service ID is set and a file was uploaded
    if(isset($_POST['service_id']) && isset($_FILES['service_photo']) && $_FILES['service_photo']['error'] == 0) {
        $serviceID = $_POST['service_id'];
        
        // Check if the file is an image
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if(in_array($_FILES['service_photo']['type'], $allowedTypes)) {
            // Define the directory to store the uploaded file
            $uploadDir = '../client/assets/';
            // Create the directory if it doesn't exist
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            // Generate a unique name for the file
            $fileName = 'assets/' . uniqid() . '_' . $_FILES['service_photo']['name'];
            // Move the uploaded file to the specified directory
            if(move_uploaded_file($_FILES['service_photo']['tmp_name'], '../client/' . $fileName)) {
                // Update the service photo in the database
                $updatePhotoQuery = "UPDATE tbl_booking_services SET image = '$fileName' WHERE service_id = $serviceID";
                if(mysqli_query($conn, $updatePhotoQuery)) {
                    echo "success";
                } else {
                    echo "error";
                }
            } else {
                echo "error";
            }
        } else {
            echo "invalid";
        }
    } else {
        echo "error";
    }
?>
