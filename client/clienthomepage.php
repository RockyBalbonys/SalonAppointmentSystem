<?php
    include  "connection.php";  
    include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
        <?php
            echo "<h1>WELCOME BACK, " . $_SESSION["username"] . "!<h1>";
        ?>
</body>
</html>