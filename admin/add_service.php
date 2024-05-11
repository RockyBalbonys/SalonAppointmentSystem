<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "connection.php";  

    // Prepare data for insertion
    $serviceName = $_POST['service_name'];
    $serviceCost = $_POST['service_cost'];

    // Upload image to the server
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/SalonAppointmentSystem/client/assets/";
    $target_file = $target_dir . basename($_FILES["service_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is selected
    if(isset($_FILES['service_image']) && $_FILES['service_image']['error'] === UPLOAD_ERR_OK) {
        $check = getimagesize($_FILES["service_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        echo "No file selected.";
        $uploadOk = 0;
    }

    // Check if directory exists, if not, create it
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check file size
    if ($_FILES["service_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["service_image"]["tmp_name"], $target_file)) {
            $serviceImage = "assets/" . $_FILES['service_image']['name']; // Add 'assets/' to the filename
            // Insert data into database
            $sql = "INSERT INTO tbl_booking_services (service, service_cost, image, isActive) VALUES ('$serviceName', '$serviceCost', '$serviceImage', 1)";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close connection
    $conn->close();
}
?>
