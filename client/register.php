<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Register</title>
</head>
<body>
    <div>
        <form method="post">
            <input type="text" name="reg_firstname" placeholder="First name">
            <input type="text" name="reg_lastname" placeholder="Last name">
            <select  name="reg_gender" placeholder="Gender">
                    <option value=0>Select Gender</option>
                    <option value=1>Male</option>
                    <option value=2>Female</option>
                    <option value=3>Other</option>
            </select>
            <input type="text" name="reg_phonenumber" placeholder="Phone number">
            <input type="text" name="reg_email" placeholder="E-mail">
            <input type="password" name="reg_password" placeholder="Password">
            <input type="submit" value = "register">
        </form>
    </div>
        <?php
        include "connection.php";
        if (isset($_POST["reg_firstname"])) {
            $reg_firstname = $_POST["reg_firstname"];
            $reg_lastname = $_POST["reg_lastname"];
            $reg_gender = $_POST["reg_gender"];
            $reg_phonenumber = $_POST["reg_phonenumber"];
            $reg_email = $_POST["reg_email"];
            $reg_password = $_POST["reg_password"];
            
            $add = "INSERT INTO `tbl_users`(`user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_gender`, `user_phonenumber`) 
                        VALUES ('$reg_email','$reg_password','$reg_firstname',' $reg_lastname','$reg_gender',' $reg_phonenumber')";
            
            if (mysqli_query($conn, $add)) {
                echo "user added successfully";
            } else {
                echo "failed";
            }
        }
      
        
        ?>
</body>
</html>