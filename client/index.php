<?php
include "connection.php";
include "session.php";

        $contentContact = "SELECT * FROM tbl_content_contact";
        $resultContact = $conn->query($contentContact);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
            $nameQuery = "SELECT * FROM tbl_content_contact WHERE contact = 'name'";
            $query = mysqli_query($conn, $nameQuery);
            while ($row = mysqli_fetch_array($query)) {
                echo $row["contact_info"];
            }
            
        ?>
    </title>
    <link rel="icon" type="png/jpg" href="assets/logo.png">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/884b91a3a4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js" defer></script>
</head>
<body>
<div class="soc-media">
        <a href="#">
        <i class="fa-brands fa-facebook-f" style="color: #b55e5a;"></i></a>
        <a href="#">
        <i class="fa-brands fa-instagram" style="color: #b55e5a;"></i></a>
        <a href="#">
        <i class="fa-brands fa-x-twitter" style="color: #b55e5a;"></i></a>
        <a href="mailto:gerente.jayannrose.bscs2021@gmail.com">
        <i class="fa-thin fa-at" style="color: #b55e5a;"></i></a>
    </div>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar z-5 left-column">
        <div class="width">
            <div class="logo"><a href="#">
            <?php
            $nameQuery = "SELECT * FROM tbl_content_contact WHERE contact = 'name'";
            $query = mysqli_query($conn, $nameQuery);
            while ($row = mysqli_fetch_array($query)) {
                echo $row["contact_info"];
            }
            
        ?>
            </a></div>
            <ul class="menu">
                <li><a href="#home">home</a></li>
                <li><a href="#about">about</a></li>
                <li><a href="#services">services</a></li>
                <li><a href="#contact">contact</a></li>
                <button class="login-btn">
                Book Appointment
                <?php
                    if (isset($_SESSION["user_id"])) {
                        header("location: clienthomepage.php");
                    } 
                ?>
                </button>
            </ul>
            
            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            </div>
    </nav>
    <!-- Popup Form-->
    <div class="blur-bg-overlay">

    </div>
    <div class="form-popup">
        <span class="close-btn material-symbols-outlined">
            close
        </span>
        <div class="form-box login">
            <div class="form-details">
                <h2></h2>
                <p></p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form method="post">
                    <div class="input-field">
                        <input type="text" name="login_email" required >
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="login_password"  required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot Password?</a>
                    <button type="submit">
                        Log In
                    </button>
                    <?php
                if (isset($_POST["login_email"])) {
                    $login_email = $_POST["login_email"];
                    $login_password = $_POST["login_password"];

                    // Using prepared statement to prevent SQL injection
                    $check = "SELECT * FROM tbl_users WHERE `user_email` = ?";
                    $stmt = $conn->prepare($check);
                    $stmt->bind_param("s", $login_email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $hashed_password = $row['user_password'];
                        if (password_verify($login_password, $hashed_password)) {
                            $_SESSION["user_id"] = $row["user_id"];
                            $_SESSION["user_firstname"] = $row["user_firstname"];
                            $_SESSION["user_lastname"] = $row["user_lastname"];
                            $_SESSION["user_gender"] = $row["user_gender"];
                            $_SESSION["user_phonenumber"] = $row["user_phonenumber"];

                            // Redirect to clienthomepage.php
                            header("Location: clienthomepage.php");
                            exit(); // Ensure that the script stops execution after the redirect
                        } else {
                            echo "<script>alert('Wrong password 1!');</script>";

                        }
                    } else {
                        echo "<script>alert('Wrong password 2!');</script>";
                    }

                    $stmt->close();
                }
            ?>

                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>

        <div class="form-box signup">
            <div class="form-details">
                <h2></h2>
                <p></p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form method="post">
                    <div class="input-field">
                        <input type="text" name="reg_firstname"required>
                        <label>First Name</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="reg_lastname"required>
                        <label>Last Name</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="reg_phonenumber" pattern="[0-9]*" maxlength="11" required>
                        <label>Phone Number</label>
                    </div>

                    <div class="input-field">
                        <input type="text" name="reg_email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="reg_password" id="reg_password" required>
                        <label>Create Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <label>Confirm Password</label>
                        <div id="password_match_message" style="color: red;"></div>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" required>
                        <label for="policy">
                            I agree to the
                            <a href="#">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit">
                        Sign Up
                    </button>
                        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $reg_firstname = $_POST["reg_firstname"];
                $reg_lastname = $_POST["reg_lastname"];
                $reg_phonenumber = $_POST["reg_phonenumber"];
                $reg_email = $_POST["reg_email"];
                $reg_password = $_POST["reg_password"];
                $hashed_reg_password = password_hash($reg_password, PASSWORD_DEFAULT);

                // Validate email format
                if (!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Invalid email format!');</script>";
                } else {
                    // Check if the email already exists
                    $check_email_query = "SELECT * FROM `tbl_users` WHERE `user_email` = '$reg_email'";
                    $check_result = mysqli_query($conn, $check_email_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo "<script>alert('Email already exists!');</script>";
                    } else {
                        // Email doesn't exist, proceed to add the new user
                        $add = "INSERT INTO `tbl_users`(`user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_phonenumber`) 
                                VALUES ('$reg_email','$hashed_reg_password','$reg_firstname','$reg_lastname','$reg_phonenumber')";

                        if (mysqli_query($conn, $add)) {
                            echo "user added successfully";
                        } else {
                            echo "failed";
                        }
                    }
                }
            }
    ?>


                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!--HOME-->
    <section class="home" id="home">
        <div class="width">
            <div class="home-subject">
                <div class="text-1">
                    Hey,
                </div>
                <div class="text-2">
                    LUXURIOUS
                </div>
                <div class="text-2">
                    HAIR FOR YOU
                </div>

            </div>
        </div>
    </section>

<!--About-->
<section class="bio" id="about">
        <div class="about-row">
            <div class="col content-col">
                <h1>About Our Salon</h1>
                <p>
                        <?php
                            $contentAbout = "SELECT * FROM tbl_content_about";
                            $resultAbout = $conn->query($contentAbout);
                            // Check if query was successful
                            if ($resultAbout === false) {
                                echo "Error executing query: " . $conn->error;
                            } else {
                                // Fetch data and display
                                while ($row = $resultAbout->fetch_assoc()) {
                                    // Assuming you have a column named 'content' that you want to display
                                    echo $row['content'];
                                }
                            }
                        ?>

                </p>
            </div>
            <div class="col image-col">
                <div class="image-gallery">
                    <img src="assets/place1.jpg" alt="">
                    <img src="assets/place2.jpg" alt="">
                    <img src="assets/place3.jpg" alt="">
                    <img src="assets/place4.jpg" alt="">
                </div>
            </div>
        </div>
</section>


<?php
// Fetching data from the database
$sql = "SELECT * FROM tbl_booking_services WHERE isActive = 1";
$result = $conn->query($sql);
?>

<!--Services-->
<section class="project" id="services">
    <div class="width">
        <h2 class="title">Our Services</h2>
        <div class="carousel owl-carousel">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="card">
                <div class="box">
                    <a href="#<?php echo $row['service_id']; ?>">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['service']; ?>" width="600" height="600">
                    </a>
                    <div class="text"><?php echo $row['service']; ?></div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "No services found";
            }
            ?>
        </div>
    </div>
</section>




<!--Contacts-->
<section class="contact" id="contact">
    <div class="width">
        <h2 class="title">Contact Us</h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">
                    Don't hesitate to reach out
                </div>
                <?php
                                            //here
                while($row = mysqli_fetch_assoc($resultContact)){
                        ?> 

                <div class="icons">
                    <div class="row">
                        <div class="info">
                            <div class="head"><?php echo $row["contact"] . ": " . $row["contact_info"] ?></div>
                            <div class="sub-title"></div>
                        </div>
                    </div>
                    <?php
                }
            ?>
                    
                </div>
            </div>
            
            <div class="column right">
            <div class="text">Message us</div>
            <form method="POST">
                <div class="field name">
                    <input type="text" name="mess_sender"placeholder="Name" required>
                </div>
                <div class="field email">
                    <input type="email" name="mess_email" placeholder="Email" required>
                </div>
                
                <div class="field textarea">
                    <textarea cols="30" rows="10" name="mess_content" placeholder="Message" required></textarea>
                </div>
                <div class="button">
                    <button type="submit">Send message</button>
                </div>    
                </div>
            </form>
                    <?php
                        if (isset($_POST["mess_content"])) {
                            $mess_sender = $_POST["mess_sender"];
                            $mess_email = $_POST["mess_email"];
                            $mess_content = $_POST["mess_content"];
                            
                            $book = "INSERT INTO `tbl_messages`(`mess_sender`, `mess_email`, `mess_content`) 
                            VALUES ('$mess_sender', '$mess_email','$mess_content')";
        
                            if (mysqli_query($conn, $book)) {
                                echo "<script> alert('message sent!'); </script";
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<footer>
    <div class="footer-text">
        <span class="far fa-copyright"></span>Recover Hair.
    </div>
</footer>

<script>
    $(document).ready(function () {
        // Function to check if the passwords match
        function checkPasswordMatch() {
            var password = $("#reg_password").val();
            var confirmPassword = $("#confirm_password").val();

            if (password != confirmPassword) {
                $("#password_match_message").html("Passwords do not match!");
                return false;
            } else {
                $("#password_match_message").html("");
                return true;
            }
        }

        // Event handler for password and confirm password fields
        $("#reg_password, #confirm_password").keyup(checkPasswordMatch);

        // Event handler for form submission
        $("form").submit(function (e) {
            if (!checkPasswordMatch()) {
                alert("Passwords do not match. Please check your passwords.");
                e.preventDefault(); // Prevent form submission if passwords don't match
            }
        });
    });
</script>


    
</body>
</html>