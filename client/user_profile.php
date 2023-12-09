<?php
    include "connection.php";
    include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="#">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/884b91a3a4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js" defer></script>
    

    <style>
        /* Custom styles */
        body {
            background-color: #fcf0e1;
            font-size: 20px;
        }
        .navbar {
            background-color: #b55e5a;
            color: #fff;
        }
        .container {
            margin-top: 1px;
        }
        body {
            background-color: #fcf0e1; 
        
        }
        .navbar {
            background-color: #b55e5a;
            color: #fff;
        }



    </style>

</head>
<body>

    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
            <navbar class="navbar">
                <div class="logo"><a href="landingpage.php">recover.hair</a></div>
                <div class= "logo"><a href="clienthomepage.php">Services</a><span> | </span><a href="logout.php">Logout</a></div>
            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            </navbar>
            <div class="container">
        
        <br>
        <br>
        <br>
        <br>

              <div>
                 <?php 
                $user_id = $_SESSION["user_id"];
                $user_firstname = $_SESSION["user_firstname"];
                $user_lastname = $_SESSION["user_lastname"];
                $user_gender = $_SESSION["user_gender"];
                $user_phonenumber = $_SESSION["user_phonenumber"];

                echo "<div class='h1'>" . $user_firstname . ' ' . "$user_lastname </div>";
                echo "<div class='label'> $user_phonenumber </div>";

                 echo $_SESSION["user_firstname"]. "'s Upcoming Appointment(s)";
                 $selectAllAppointments = "SELECT * FROM tbl_bookings 
                 JOIN tbl_users 
                 ON tbl_bookings.booking_user = tbl_users.user_id 
                 WHERE $user_id = tbl_bookings.booking_user
                 ORDER BY booking_date ASC, booking_time ASC;";
                 $query = mysqli_query($conn, $selectAllAppointments);
                 
                 if (mysqli_query($conn, $selectAllAppointments)) {
                    echo '<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Service Chosen</th>
                                    </tr>
                                </thead>
                                <tbody>';

                        while ($row = mysqli_fetch_array($query)) {
                            echo '<tr>';
                            $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                            echo '<td>' . $formattedDate . '</td>';
                            $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                            echo '<td>' . $formattedTime . '</td>';
                            echo '<td>' . $row["booking_service"] . '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>
                            </table>';

                 }
                 
                 
                 ?>
                 
              </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>


    
</body>
</html>