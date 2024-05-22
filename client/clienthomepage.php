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
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <style>
        /* Custom styles */
        .card-container {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: baseline;
            margin-top: 0;
        }

        .card {
            width: calc(50% - 50px);
            height: auto;
            margin: 50px;
            border: none;
            padding: 4px;
        }

        .booking-container {
            width: 100%;
            padding: 50px;
            box-sizing: border-box;
            margin-top: 20px;
            font-size: 30px;
        }

        .booking-container label {
            display: block;
            margin-bottom: 10px;
        }

        .booking-container select,
        .booking-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .booking-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #b55e5a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .booking-container label,
        .booking-container select,
        .booking-container input[type="date"],
        .booking-container input[type="submit"] {
            font-size: 22px; 
        }

        .card col{
            width: 300px;
            height: 300px;
            padding: 20px;
        }
        body {
            background: #ffffff;
            font-size: 16px;
            font-family: 'Ubuntu', sans-serif;

        
        }
        .navbar {
            background-color: #b55e5a;
            color: #ffff;
            padding: 10px;
            font-family: 'Lucida Calligraphy', cursive;
        }
        .navbar .logo a{
            font-weight: bolder;
        }
       .title h1{
        font-family:'Ubuntu', sans-serif;
       }
        .container {
            margin-top: 7px;
        }
        .picture-box {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 3px;
            margin-left: 70px;
        }
        .picture-item {
            margin: 20px;
            width: calc(30% - 30px);
            height: auto;
            cursor: pointer;
            max-width: 200px;
            max-height: 200px;
        }
        .picture-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            transition: border 0.3s ease-in-out;
            max-width: none; 
            max-height: none; 
            border: 1px solid black;
        }
        .picture-item img:hover{
            border: 3px solid #b55e5a;
            transition: all 0.3s ease;
        }

        .picture-item p {
            margin-top: 5px;
            font-size: 8px;
        }
        .picture-item.selected img {
            border: 8px solid #b55e5a; 
        }

        .custom-title{
            font-size: 100px;
        }
        .col-3 mb-2{
            color: #381d1a;
        }
        .mb-100{
            margin-bottom: 100px;
        }

        .navbar-1 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 200;
            font-size: 18px;
            margin-right: 40px;
            transition: all 0.3s ease;
        }
        .navbar-1:hover{
            text-decoration: underline;
            transition: all 0.3s ease;
        }
        a:link {
  color: whitesmoke;
}
.logo{
    margin-left:50px;
}

footer {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #b55e5a;
    color: #fff;
    padding: 18px;
    text-align: center;
    margin: 0; 
    font-family: 'Poppins', sans-serif;
}
a:visited {
  color: whitesmoke;
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
        <div class="logo"><a class="text-light link-offset-2 link-underline link-underline-opacity-0" href="landingpage.php">recover.hair</a></div>
        
        <div class="navbar-1"><a class="link-offset-2 link-underline link-underline-opacity-0" href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a>
        
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="logout.php"><button class="btn1 btn-m ms-3 p-2"><i class="bi bi-box-arrow-right"></i> Log Out</a></button></div>
        </navbar>
        <div class="container-lg">
        
 <div class="text-center fw-bolder mt-4 mb-2">
    <div class="title">
        <h1>Services</h1>
    </div>    
    </div>
            <div class= "picture-box">
            <form method="POST" class="form-group text-center" required>
    <div class="card-container row img-fluid">
        <?php
            $selectAllServices = "SELECT * FROM `tbl_booking_services` WHERE isActive = 1";
            $services = mysqli_query($conn, $selectAllServices);

            foreach ($services as $service) {
                $serviceName = $service['service'];
                $imagePath = $service['image'];
                $serviceID = $service['service_id'];
                $serviceCost = $service['service_cost'];
            ?>
                <div class="card col-3 picture-item" onclick="handleImageClick(this, event)"
                    style="background: none;
                    border:1px solid #fff;
                    border-radius: 5px;">
                    <input type="radio" value="<?= $serviceID ?>" id="radioBtn<?= $serviceID ?>" name="service" class="sr-only" required>
                    <label for="radioBtn<?= $serviceID ?>" 
                        style="
                        font-family: 'Poppins', sans-serif;
                        font-size:15px;
                        font-weight:500;
                        padding-bottom:20px;
                        ">
                        <a href="#">
                            <img src="<?= $imagePath ?>" alt="" class="h-150 w-100">
                        </a>
                        <br>
                        <?= $serviceName . " - P" . $serviceCost?>
                    </label>
                    <br>
                </div>
            <?php } ?>
            
    </div>
    <form method="POST" class="booking-container form-group text-center" required>
                <div class="row justify-content-center mt-3">
                    <div class="col-12 text-center">
                        <label for="" class="text-center" 
                        style="font-family: 'Poppins', sans-serif;">
                        Select Time, Date, and Stylist:</label>
                    </div>
                    <div class="col-12 text-center mb-100" style="font-family:'Poppins', sans-serif">
                        <input name="book_date" type="date" class="mb-2" required>
                            <select name="book_time" type="text" class="mb-2">
                                <option value="select time" selected>Select time</option>
                                <option value="9:00 AM">9:00 am - 11:00 am</option>
                                <option value="11:00 AM">11:00 am - 1:00 pm</option>
                                <option value="1:00 PM">1:00 pm - 3:00 pm</option>
                                <option value="3:00 PM">3:00 pm - 5:00 pm</option>
                                <option value="5:00 PM">5:00 pm - 7:00 pm</option>
                            </select>
                            <?php
                                $query = "SELECT stylist_id, stylist_name FROM tbl_stylists";
                                $result = mysqli_query($conn, $query);

                                $stylists = [];
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $stylists[] = $row;
                                    }
                                }
                                ?>
                        <select name="book_stylist" type="text" class="mb-2">
                            <option value="select stylist" selected>Select Stylist</option>
                            <?php foreach ($stylists as $stylist): ?>
                        <option value="<?= htmlspecialchars($stylist['stylist_id']) ?>"><?= htmlspecialchars($stylist['stylist_name']) ?></option>
                    <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Book" class="btn mb-2">
                    </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST["book_date"])) {
    $service = $_POST["service"];
    $book_date = $_POST["book_date"];
    $book_time = $_POST["book_time"];
    $book_stylist = $_POST["book_stylist"];
    $book_weekday = date('w', strtotime($book_date));
    $formattedbookdate = strtotime($book_date);
    $dateTime = new DateTime($book_time);
    $formattedbooktime = $dateTime->format('H:i:s'); // Ensure the format matches the database
    $currentdate = strtotime(date("Y-m-d"));

    if ($book_weekday != 0) {
        if ($formattedbookdate > $currentdate) {
            // Check if there is an existing booking with the same date and time
            $existingBookingQuery = "SELECT * FROM `tbl_bookings` WHERE `booking_date` = ? AND `booking_time` = ? AND `booking_stylist` = ?";
            if ($stmt = mysqli_prepare($conn, $existingBookingQuery)) {
                mysqli_stmt_bind_param($stmt, "sss", $book_date, $formattedbooktime, $book_stylist);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    echo "<script> alert('Booking conflict! Please choose a different date/time/stylist.')</script>";
                } else {
                    // If no conflict, proceed with the booking
                    $book = "INSERT INTO `tbl_bookings`(`booking_user`, `booking_service`, `booking_date`, `booking_time`, `booking_stylist`) 
                                VALUES (?, ?, ?, ?, ?)";
                    
                    if ($insert_stmt = mysqli_prepare($conn, $book)) {
                        mysqli_stmt_bind_param($insert_stmt, "sssss", $_SESSION["user_id"], $service, $book_date, $formattedbooktime, $book_stylist);
                        
                        if (mysqli_stmt_execute($insert_stmt)) {
                            echo "<script> alert('Booked successfully! You can check it on your profile. Thank you!')</script>";
                        } else {
                            echo "<script> alert('Error booking!')</script>";
                        }
                        
                        mysqli_stmt_close($insert_stmt);
                    }
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "<script> alert('Failed to prepare the SQL statement.')</script>";
            }
        } else {
            echo "<script> alert('Invalid Date! Please try again.')</script>";
        }
    } else {
        echo "<script>alert('SUNDAY IS NOT AVAILABLE, PLEASE SELECT ANOTHER DAY')</script>";
    }
}
?>


        </div>
            <!--footer-->
<footer>
    <div class="footer-text text-start" >
    <i class="bi bi-c-circle"></i>
    Recover Hair.
    </div>
</footer>
    
    <script>

        //Tooltip
        const tooltips = document.querySelectorAll('.tt')
      tooltips.forEach(t =>{
        new bootstrap.Tooltip(t)
      })         
            function handleImageClick(clickedElement, event) {
    // Prevent the default behavior of the click event
    event.preventDefault();

    // Get the radio button within the clicked card
    const radioButton = clickedElement.querySelector('input[type="radio"]');

    // Check the radio button if it's not already checked
    if (radioButton && !radioButton.checked) {
        radioButton.checked = true;

        // Uncheck all other radio buttons in the same group
        const radioGroupName = radioButton.getAttribute('name');
        const otherRadioButtons = document.querySelectorAll(`.card-container input[name="${radioGroupName}"]:not(#${radioButton.id})`);
        
        otherRadioButtons.forEach(button => {
            button.checked = false;
        });
    }

    // Toggle the 'selected' class for styling
    clickedElement.classList.toggle('selected');
}


        </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php
    }
?>