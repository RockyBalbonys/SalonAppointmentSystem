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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            padding: 60px 0;
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <div class="text-center mt-5">
            <h2>Log in as Admin</h2>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-s-6 col-lg-6 my-3">
                <form method="post" class="border p-5 border-dark border-3 rounded-4">
                    <div class="form-group">
                        <label for="login_email"><p class="text-3 mb-2">Email:</p></label>
                        <input type="text" class="form-control border-dark" name="admin_username" id="admin_username" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="login_password"><p class="text-3 mb-2">Password:</p></label>
                        <input type="password" class="form-control border-dark" name="admin_password" id="admin_password" placeholder="Enter your password">
                    </div>
                    <div class="text-center mt-2"> 
                        <button type="submit" name="btn_login" class="btn btn-sm btn-dark">Log in</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
            $hashed_admin_password = $row['admin_password'];   
            
            if (password_verify($admin_password, $hashed_admin_password)) {
            
                $_SESSION["admin_username"] = $row["admin_username"];

                header("Location: adminpage.php");
            } else {
                echo "<script>alert('wrong email/password!')</script>";
            }
        } else {
            echo "wrong email/password!";
   
        }
    }
    
?>
<?php
}
?>