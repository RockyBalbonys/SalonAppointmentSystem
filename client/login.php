<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Log in</title>
</head>
<body>
    
   <div>
            <form method="post">
                <input type="text" name="login_email" placeholder = "email....">
                <input type="password" name="login_password" placeholder = "password....">
                <input type="submit" name="btn_login" value = "log in">
            </form>
            <!-- <a href="">register</a> -->
   </div>

</body>
</html>

<?php
    include  "connection.php";  
    if (isset( $_POST["login_email"])) {
        $login_email = $_POST["login_email"];
        $login_password = $_POST["login_password"];
        $check = "SELECT * FROM tbl_users WHERE `user_email` = '$login_email'";
        $query = mysqli_query($conn, $check);

        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
             if ($login_password ===$row['user_password']) {
                header("Location: http://localhost/SalonAppointmentSystem/client/clienthomepage.php");
            } else {
                echo "wrong email/password!";
            }
        } else {
            echo "wrong email/password!";
        }
     }
   
?>