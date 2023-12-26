<?php
    include "connection.php";
    include "sessions.php";
    if (isset($_SESSION["admin_username"])) {
        header("Location: adminpage.php");
    } else {    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="col-md-6">
    <p class="display">Log in as Admin</p>
                <form method="post" class="border p-3">
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="text" class="form-control" name="admin_username" id="admin_username" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Enter your password">
                    </div>
                    <button type="submit" name="btn_login" class="btn btn-primary">Log in</button>
                </form>
            </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
  
    if (isset( $_POST["admin_username"])) {
        $admin_username = $_POST["admin_username"];
        $admin_password = $_POST["admin_password"];
        $check = "SELECT * FROM tbl_admin_users WHERE `admin_username` = '$admin_username'";
        $query = mysqli_query($conn, $check);

        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
             if ($admin_password ===$row['admin_password']) {
            
                $_SESSION["admin_username"] = $row["admin_username"];

                header("Location: adminpage.php");
            } else {
                echo "wrong email/password!";
            }
        } else {
            echo "wrong email/password!";
        }
    }
    
?>
<?php
}
?>