<?php
    include  "connection.php";  
    include "session.php";
    if (isset($_SESSION["user_firstname"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="#">

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
        }
        .navbar {
            background-color: #b55e5a;
            color: #fff;
        }
        .container {
            margin-top: 20px;
        }
        .picture-box {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .picture-item {
            margin: 10px;
            width: 200px;
            cursor: pointer;
        }
        .picture-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
            transition: border 0.3s ease-in-out;
        }
        .picture-item p {
            margin-top: 5px;
            font-size: 14px;
        }
        .picture-item.selected img {
            border: 2px solid #b55e5a; /* Change border color to indicate selection */
        }
  

    </style>

           

</head>
<body>
<navbar class="navbar">

            <div><a href="landingpage.php">recover.hair</a></div>
            <div><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">logout</a></div>
        </navbar>
        <div class="container">
        
<br>
<br>
<br>

        <label><h1>Services</h1></label>

            <div class= "picture-box">
            <form method = "POST" class="form-group text-center">
                <div class="card-container row">
                    <div class="card col-3 ">
                        <label for="">
                            <img src="assets/haircut.jpg" alt="" class="h-100 w-50">
                            <br>
                            Haircut
                            (P1100)
                        </label>
                        <br><input type="radio" value=1 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/rebond.jpg" alt="" class="h-100 w-50">
                            <br>
                            Hair Rebond
                            (P1200)
                        </label>
                        <br><input type="radio" value=2 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/color.jpg" alt="" class="h-100 w-50">
                            <br>
                            Hair Color
                            (P1000)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/brazilian.jpg" alt="" class="h-100 w-50">
                            <br>
                            Hair Brazilian
                            (P2000)
                        </label>
                        <br><input type="radio" value=4 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/highlights.jpg" alt="" class="h-100 w-50">
                            <br>
                            Hair Highlights
                            (P1400)
                        </label>
                        <br><input type="radio" value=5 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/permhair.jpg" alt="" class="h-100 w-50">
                            <br>
                            Hair Perm
                            (P4000)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/extension.webp" alt="" class="h-100 w-50">
                            <br>
                            Hair Extension
                            (P3500)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/blowdry.jpg" alt="" class="h-100 w-50">
                            <br>
                            Blow Dry
                            (P1000)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/keratin.jpg" alt="" class="h-100 w-50">
                            <br>
                            Keratin Treatment
                            (P2500)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/hairstyles.webp" alt="" class="h-100 w-50">
                            <br>
                            Hair Styling
                            (P3500)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                </div>
                   
               
            </div>
                
        <label for="">Select Time and Date:</label>
                <input name="book_date" type="date" class ="row col-3 mb-2">
                <input name="book_time" type="time" class ="row col-3 mb-2">
                <textarea name="book_comment" id="" cols="15" rows="3" placeholder="Comments..." class="row col-4 mb-2"></textarea>
                <input type="submit" value="Book" class="row col-3 mb-2"  >
                
            </form>
           

            <?php
    
                if (isset($_POST["book_date"])) {
                    $service = $_POST["service"];
                    $book_date = $_POST["book_date"];
                    $book_time = $_POST["book_time"];
                    $book_comment = $_POST["book_comment"];
                    
                    $book = "INSERT INTO `tbl_bookings`(`booking_user`, `booking_service`, `booking_date`, `booking_time`) 
                    VALUES ('{$_SESSION["user_id"]}', '$service','$book_date', '$book_time')";

                    if (mysqli_query($conn, $book)) {
                        echo $service . "<br>";
                        echo $book_date ."<br>";
                        echo $book_time . "<br>";
                        echo $book_comment . "<br>";
                    }
                }
            ?>    
        </div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // JavaScript to handle image selection
        document.addEventListener('DOMContentLoaded', function () {
            let pictures = document.querySelectorAll('.picture-item');

            pictures.forEach(function (picture) {
                picture.addEventListener('click', function () {
                    picture.classList.toggle('selected');
                });
            });
        });
    </script>

</body>
</html>

<?php
    } else {
        header("Location: 404.php");
    }
?>