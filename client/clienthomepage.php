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
</head>
<body>

       
        <div class="container container-sm align-items-center justify">
        <navbar class="navbar border">
            <div><a href="landingpage.php">Salon Name</a></div>
            <div><a href="user_profile.php"><?php echo $_SESSION["user_firstname"]; ?></a><span> | </span><a href="logout.php">logout</a></div>
        </navbar>
            <form method = "get" class="">
                <input name="book_date" type="date" class ="row col-3 mb-2">
                <input name="book_time" type="time" class ="row col-3 mb-2">
                <textarea name="book_comment" id="" cols="15" rows="3" placeholder="Comments..." class="row col-4 mb-2"></textarea>
                <input type="submit" value="Book" class="row col-3 mb-2">
            </form>
            <?php
    
                if (isset($_GET["book_date"])) {
                    $book_date = $_GET["book_date"];
                    $book_time = $_GET["book_time"];
                    $book_comment = $_GET["book_comment"];
                    
                    $book = "INSERT INTO `tbl_bookings`(`booking_user`, `booking_date`, `booking_time`) 
                    VALUES ('{$_SESSION["user_id"]}', '$book_date', '$book_time')";

                    if (mysqli_query($conn, $book)) {
                    
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