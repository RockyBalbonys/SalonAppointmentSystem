<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "salon_appointment_system";
    
 //create a connection
    $conn = mysqli_connect($hostname, $username, $password, $database);

// check connection

if ($conn->connect_error) {
    die("connection failed: " .  $conn->connect_error);
}
?>