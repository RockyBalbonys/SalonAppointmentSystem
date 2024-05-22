<?php
    include "connection.php";
    include "session.php";
    if (!isset($_SESSION["user_firstname"])) {
        header("Location: 404.php");
    } else {    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@500&display=swap" rel="stylesheet">   

    <style>
        /* Custom styles */
        .container {
            margin-top: 50px;
            align-items: stretch;
            text-align: center;
            border: 3px solid black;
            border-radius: 5px;
            background-color: #fcf0e1;
            padding: 10px;
            margin-bottom: 20px;
        }
        body {
            background-color: #ffffff; 
        
        }
        .navbar-2{
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            margin-right: 30px;
        }
        a:link {
        color: whitesmoke;
        }
        .logo {
            margin-left: 50px;
        }

        /* visited link */
        a:visited {
        color: whitesmoke;
        }

        .navbar {
            background-color: #b55e5a;
            color: #ffff;
            padding: 10px;
            font-family: 'Lucida Calligraphy', cursive;
        }
        .navbar-2 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 200;
            font-size: 18px;
            margin-right: 40px;
            transition: all 0.3s ease;
        }
        .navbar-2:hover{
            text-decoration: underline;
            transition: all 0.3s ease;
        }
        .navbar .logo a{
            text-decoration: none;
        }
        .navbar .navbar-2 a{
            text-decoration: none;
        }

        .btn1{
        background-color: #b55e5a;
        color: #fff;
        border: 1px solid #fff;
        border-radius: 5px;
        transition: all 0.3s ease;
        }
        .btn{
        background-color: #b55e5a;
        color: #fff;
        transition: all 0.3s ease;
        }
        .btn:hover{
        border: 1px solid #b55e5a;
        transition: all 0.3s ease;
        }
            </style>

</head>
<body>

            <navbar class="navbar">
                <div class="logo"><a class="fw-bolder" href="index.php"><?php
            $nameQuery = "SELECT * FROM tbl_content_contact WHERE contact = 'name'";
            $query = mysqli_query($conn, $nameQuery);
            while ($row = mysqli_fetch_array($query)) {
                echo $row["contact_info"];
            }
            
        ?></a></div>
                <div class= "navbar-2 d-sm-none d-md-block"><a href="clienthomepage.php">Services</a>
                <a href="logout.php"><button class= "btn1 btn-m ms-3 p-2"><i class="bi bi-box-arrow-right"></i> Log Out</button></a></div>
            </navbar>
            <div class="container">
                

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
                JOIN tbl_booking_services
                ON tbl_bookings.booking_service = tbl_booking_services.service_id
                JOIN tbl_stylists
                ON  tbl_bookings.booking_stylist = tbl_stylists.stylist_id
                WHERE $user_id = tbl_bookings.booking_user
                ORDER BY booking_date ASC, booking_time ASC;";
                $query = mysqli_query($conn, $selectAllAppointments);
                
                if (mysqli_query($conn, $selectAllAppointments)) {
                    echo '<table class="table table-bordered text-center mt-5" style="">
                                <thead>
                                    <tr style="border: 3px solid #fff">
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Booking ID</th>
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Date</th>
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Time</th>
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Service Chosen</th>
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Stylist</th>
                                        <th style="border: 3px solid #fff;
                                        background-color: #b55e5a;
                                        color: #fff;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="background: #fff;">';

                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<tr>';
                                    echo '<td style="border: 2px solid #fff">' . $row["booking_id"] . '</td>';
                                    $formattedDate = date('F j, Y', strtotime($row["booking_date"]));
                                    echo '<td style="border: 2px solid #fff">' . $formattedDate . '</td>';
                                    $formattedTime = date('h:i A', strtotime($row["booking_time"]));
                                    echo '<td style="border: 2px solid #fff">' . $formattedTime . '</td>';
                                    echo '<td style="border: 2px solid #fff">' . $row["service"] . '</td>';
                                    echo '<td style="border: 2px solid #fff">' . $row["stylist_name"] . '</td>';
                                    echo '<td style="border: 2px solid #fff">';
                                    echo '<form method="post" action="cancel_appointment.php">';
                                    echo '<input type="hidden" name="booking_id" value="' . $row["booking_id"] . '">';
                                    echo '<button type="submit" class="btn btn-sm">Cancel</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                        echo '</tbody>
                            </table>';
                 }      
                 ?>        
              </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } 
?>