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
        .card-container row {
            width: 400px; 
            height: 300px; 
            background-color: lightgray;
            border: 1px solid black;
            padding: 20px;
            box-sizing: border-box;
        }
        .card col{
            width: 300px;
            height: 300px;
            padding: 20px;
        }
        body {
            background-image: url('assets/bgdesign.png');
            font-size: 20px;

        
        }
        .navbar {
            background-color: #b55e5a;
            color: #fff;
        }
        .container {
            margin-top: 1px;
        }
        .picture-box {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 5px;
            margin-left: 70px
        }
        .picture-item {
            margin: 30px;
            width: 300px;
            height: 300px;
            cursor: pointer;
        }
        .picture-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 1px;
            transition: border 0.3s ease-in-out;
        }
        .picture-item p {
            margin-top: 2px;
            font-size: 14px;
        }
        .picture-item.selected img {
            border: 4px solid #b55e5a; 
        }
        .mb-2{
            margin-left: 300px;
            justify-content: center;
        }
        .custom-title{
            font size: 100px;
        }
        .col-3 mb-2{
            color: #381d1a;
        }


    </style>

           

</head>
<body>
        <navbar class="navbar">
        <div class="logo"><a href="landingpage.php">recover.hair<span></span></a></div>
            <div><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">logout</a></div>
        </navbar>
        <div class="container">
        
<br>
<br>
<br>
<br>
<br>

        <label><h1>Services</h1></label>

            <div class= "picture-box">
            <form method = "POST" class="form-group text-center">
                <div class="card-container row">
        <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" value="1" id="radioBtn" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/haircut.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Haircut (P1100)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" value="2" id="radioBtn" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/color.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Color (P1000)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="3" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/brazilian.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Brazilian (P2000)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="4" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/highlights.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Highlights (P1400)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="5" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/permhair.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Perm (P4000)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="6" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/extension.webp" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Extension (P3500)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="7" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/blowdry.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Blow Dry (P1000)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="8" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/keratin.jpg" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Keratin Treatment (P2500)
                        </label>
                         <br>
                    </div>
                    <div class="card col-3 picture-item" onclick="handleImageClick(this)">
                         <input type="radio" id="radioBtn" value="9" name="service" class="sr-only">
                        <label for="radioBtn" >
                         <a href="#">
                         <img src="assets/hairstyles.webp" alt="" class="h-150 w-100">
                         </a>
                         <br>
                         Hair Styling (P3500)
                        </label>
                         <br>
                    </div>

                </div>
                   
               
            </div>
                
        <label for="">Select Time and Date:</label>
                <input name="book_date" type="date" class ="row col-3 mb-2">
                <input name="book_time" type="time" class ="row col-3 mb-2">
                <input type="submit" value="Book" class="btn btn-primary row col-3 mb-2"  >
                
            </form>
           

            <?php
    
                if (isset($_POST["book_date"])) {
                    $service = $_POST["service"];
                    $book_date = $_POST["book_date"];
                    $book_time = $_POST["book_time"];
                    
                    $book = "INSERT INTO `tbl_bookings`(`booking_user`, `booking_service`, `booking_date`, `booking_time`) 
                    VALUES ('{$_SESSION["user_id"]}', '$service','$book_date', '$book_time')";

                    if (mysqli_query($conn, $book)) {
                        echo "<script> alert('booked successfully!') </script>";
                    }
                }
            ?>    
        </div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
            
            function handleImageClick(clickedElement) {
            clickedElement.classList.toggle('selected');


                let radioButton = clickedElement.querySelector('input[type="radio"]');

                if (radioButton) {
                radioButton.checked = !radioButton.checked;
                }
                }
        </script>

</body>
</html>

<?php
    } else {
        header("Location: 404.php");
    }
?>