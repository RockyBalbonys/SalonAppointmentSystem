<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Log in</title>
    
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

   <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="border p-3">
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="text" class="form-control" name="login_email" id="login_email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password">
                    </div>
                    <button type="submit" name="btn_login" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
   </div>

   <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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