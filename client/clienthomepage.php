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
    <link rel="stylesheet" href="">
</head>
<body>

       
        <div class="container container-sm align-items-center justify">
        <navbar class="navbar border">
            <div><a href="landingpage.php">Salon Name</a></div>
            <div><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">logout</a></div>
        </navbar>
            <label>Services</label>
            <form method = "get" class="form-group text-center">
                <div class="card-container row">
                    <div class="card col-3 ">
                        <label for="">
                            <img src="assets/haircut.jpg" alt=""  class="h-100 w-50">
                            Haircut
                            (P1100)
                        </label>
                        <br><input type="radio" value=1 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/rebond.jpg" alt="" class="h-100 w-50">
                            Hair Rebond
                            (P1200)
                        </label>
                        <br><input type="radio" value=2 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/color.jpg" alt="" class="h-100 w-50">
                            Hair Color
                            (P1000)
                        </label>
                        <br><input type="radio" value=3 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/brazilian.jpg" alt="" class="h-100 w-50">
                            Hair Brazilian
                            (P2000)
                        </label>
                        <br><input type="radio" value=4 name="service">
                    </div>
                    <div class="card col-3">
                        <label for="">
                            <img src="assets/highlights.jpg" alt="" class="h-100 w-50">
                            Hair Highlights
                            (P1400)
                        </label>
                        <br><input type="radio" value=5 name="service">
                    </div>
                </div>
                
        <label for="">Select Time and Date:</label>
                <input name="book_date" type="date" class ="row col-3 mb-2">
                <input name="book_time" type="time" class ="row col-3 mb-2">
                <textarea name="book_comment" id="" cols="15" rows="3" placeholder="Comments..." class="row col-4 mb-2"></textarea>
                <input type="submit" value="Book" class="row col-3 mb-2" >
                
            </form>
           

            <?php
    
                if (isset($_GET["book_date"])) {
                    $service = $_GET["service"];
                    $book_date = $_GET["book_date"];
                    $book_time = $_GET["book_time"];
                    $book_comment = $_GET["book_comment"];
                    
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
            
    
       

</body>
</html>

<?php
    } else {
        header("Location: 404.php");
    }
?>