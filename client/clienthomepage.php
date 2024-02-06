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
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/884b91a3a4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js" defer></script>



    <style>
        /* Custom styles */
        .card-container {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: calc(50% - 50px);
            height: auto;
            margin: 50px;
            border: 1px solid #b55e5a;
            padding: 4px;
            box-sizing: border-box;
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
            background: #fcf0e1;
            font-size: 16px;
            font-family: 'Ubuntu', sans-serif;

        
        }
        .navbar {
            background-color: #b55e5a;
            color: #fff;
            padding: 18px;
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
            margin: 10px;
            width: calc(30% - 30px);
            height: auto;
            cursor: pointer;
            max-width: 300px;
            max-height: 300px;
        }
        .picture-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1px;
            transition: border 0.3s ease-in-out;
            max-width: none; 
            max-height: none; 
        }

        .picture-item p {
            margin-top: 2px;
            font-size: 8px;
        }
        .picture-item.selected img {
            border: 4px solid #b55e5a; 
        }

        .custom-title{
            font size: 100px;
        }
        .col-3 mb-2{
            color: #381d1a;
        }
        .mb-100{
            margin-bottom: 100px;
        }

        .navbar-1 {

            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            margin-right: 30px;
            
        }
        a:link {
  color: whitesmoke;
}
.logo{
    margin-left:50px;
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #b55e5a;
    color: #fff;
    padding: 18px;
    text-align: center;
    margin: 0; 
}


/* visited link */
a:visited {
  color: whitesmoke;
}


    </style>





           

</head>
<body>
        <navbar class="navbar">
        <div class="logo"><a href="landingpage.php">recover.hair<span></span></a></div>
            <div class="navbar-1"><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">Logout</a></div>
        </navbar>
        <div class="container">
        
<br>
<br>
<br>
<br>
<br>

        <label><h1>Services</h1></label>
            <div class= "picture-box">
            <form method="POST" class="form-group text-center" required>
    <div class="card-container row">
        <?php
            $services = [
                ["Haircut (P1100)", "assets/haircut.jpg", "1"],
                ["Hair Color (P1000)", "assets/color.jpg", "2"],
                ["Hair Brazilian (P2000)", "assets/brazilian.jpg", "3"],
                ["Hair Highlights (P1400)", "assets/highlights.jpg", "4"],
                ["Hair Perm (P4000)", "assets/permhair.jpg", "5"],
                ["Hair Extension (P3500)", "assets/extension.webp", "6"],
                ["Blow Dry (P1000)", "assets/blowdry.jpg", "7"],
                ["Keratin Treatment (P2500)", "assets/keratin.jpg", "8"],
                ["Hair Styling (P3500)", "assets/hairstyles.webp", "9"]
            ];

            foreach ($services as $service) {
        ?>
        <div class="card col-3 picture-item" onclick="handleImageClick(this, event)">
            <input type="radio" value="<?= $service[2] ?>" id="radioBtn<?= $service[2] ?>" name="service" class="sr-only" required>
            <label for="radioBtn<?= $service[2] ?>">
                <a href="#">
                    <img src="<?= $service[1] ?>" alt="" class="h-150 w-100">
                </a>
                <br>
                <?= $service[0] ?>
            </label>
            <br>
        </div>
        <?php } ?>
    </div>

    <form method="POST" class="booking-container form-group text-center" required>
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <label for="" class="text-center">Select Time and Date:</label>
                    </div>
                    <div class="col-12 text-center mb-100">
                        <input name="book_date" type="date" class="mb-2" required>
                        <select name="book_time" type="text" class="mb-2">
                    <option value="9:00 AM">9:00 am - 11:00 am</option>
                    <option value="11:00 AM">11:00 am - 1:00 pm</option>
                    <option value="1:00 PM">1:00 pm - 3:00 pm</option>
                    <option value="3:00 PM">3:00 pm - 5:00 pm</option>
                    <option value="5:00 PM">5:00 pm - 7:00 pm</option>
                </select>
                <input type="submit" value="Book" class="btn btn-primary mb-2">
            </div>
        </div>
    </div>
</form>

           

            <?php
if (isset($_POST["book_date"])) {
    $service = $_POST["service"];
    $book_date = $_POST["book_date"];
    $book_time = $_POST["book_time"];
    $book_weekday = date('w', strtotime($book_date));
    $formattedbookdate = strtotime($book_date);
    $dateTime = new DateTime($book_time);
    $formattedbooktime = $dateTime->format('h:i a');
    $currentdate = strtotime(date("Y-m-d"));

    if ($book_weekday != 0) {
        if ($formattedbookdate > $currentdate) {
            // Check if there is an existing booking with the same date and time
            $existingBookingQuery = "SELECT * FROM `tbl_bookings` WHERE `booking_date` = '$book_date' AND `booking_time` = '$formattedbooktime'";
            $existingBookingResult = mysqli_query($conn, $existingBookingQuery);
            if (mysqli_num_rows($existingBookingResult) > 0) {
                echo "<script> alert('Booking conflict! Please choose a different date and time.')</script>";
            } else {
                // If no conflict, proceed with the booking
                $book = "INSERT INTO `tbl_bookings`(`booking_user`, `booking_service`, `booking_date`, `booking_time`) 
                            VALUES ('{$_SESSION["user_id"]}', '$service','$book_date', '$book_time')";
                
                if (mysqli_query($conn, $book)) {
                    echo "<script> alert('Booked successfully!')</script>";
                } else {
                    echo "<script> alert('Error booking!')</script>";
                }
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
    <div class="footer-text" >
        <span class="far fa-copyright"></span>Recover Hair.
    </div>
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
            
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

</body>
</html>

<?php
    }
?>