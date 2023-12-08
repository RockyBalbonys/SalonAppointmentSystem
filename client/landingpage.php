<?php
include "connection.php";
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recover.hair</title>
  <link rel="icon" type="png/jpg" href="assets/logo.png">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/884b91a3a4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js" defer></script>
</head>
<body>
<div class="soc-media">
        <a href="https://www.facebook.com/jayannrose.g/">
        <i class="fa-brands fa-facebook-f" style="color: #b55e5a;"></i></a>
        <a href="https://www.instagram.com/jayannrose_/">
        <i class="fa-brands fa-instagram" style="color: #b55e5a;"></i></a>
        <a href="https://twitter.com/jayyyyannn">
        <i class="fa-brands fa-x-twitter" style="color: #b55e5a;"></i></a>
        <a href="mailto:gerente.jayannrose.bscs2021@gmail.com">
        <i class="fa-thin fa-at" style="color: #b55e5a;"></i></a>
    </div>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar z-5">
        <div class="width">
            <div class="logo"><a href="#">recover.hair<span></span></a></div>
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
                        echo $hashed_password;
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
                            echo "<script>alert('Wrong password!');</script>";
                        }
                    } else {
                        echo "<script>alert('Wrong password!');</script>";
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
                        <input type="text" name="reg_phonenumber" required>
                        <label>Phone Number</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="reg_email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="reg_password" required>
                        <label>Create Password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox">
                        <label for="policy">
                            I agree the
                            <a href="#">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit">
                        Sign Up
                    </button>
                    <?php
                        if (isset($_POST["reg_firstname"])) {
                            $reg_firstname = $_POST["reg_firstname"];
                            $reg_lastname = $_POST["reg_lastname"];
                            $reg_gender = $_POST["reg_gender"];
                            $reg_phonenumber = $_POST["reg_phonenumber"];
                            $reg_email = $_POST["reg_email"];
                            $reg_password = $_POST["reg_password"];
                            $hashed_reg_password = password_hash($reg_password, PASSWORD_DEFAULT);
                            
                            $add = "INSERT INTO `tbl_users`(`user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_gender`, `user_phonenumber`) 
                                        VALUES ('$reg_email','$hashed_reg_password','$reg_firstname',' $reg_lastname','$reg_gender',' $reg_phonenumber')";
                            
                            if (mysqli_query($conn, $add)) {
                                echo "user added successfully";
                            } else {
                                echo "failed";
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
    <div class="width">
        <h2 class="title">About Our Salon</h2>
        <div class="bio-subject">
            <div class="column left">
                <img src="assets/hairabout2.png" alt="">
            </div>
            <div class="column right">
                <div class="text">
                   Recover <span>Hair.</span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mauris et magna tincidunt consequat..<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mauris et magna tincidunt consequat.</p>
                <a href="file:///C:/Users/Jay%20Ann/Downloads/_Resume.pdf">View Full Details</a>
            </div>
        </div>
    </div>
</section>

<!--Services-->
<section class="project" id="services">
    <div class="width">
        <h2 class="title">Our Services</h2>
        <p>Gallery</p>
        <div class="carousel owl-carousel">
            <div class="card">
            <div class="box">
                <a href="#1">
                <img src="assets/haircut.jpg" alt="" width="600" height="600"></a>
                <div class="text">Haircut</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#1">
                <img src="assets/rebond.jpg" alt="" width="600" height="600"></a>
                <div class="text">Hair Rebond</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#3">
                <img src="assets/color.jpg" alt="" width="600" height="600"></a>
                <div class="text">Hair Color</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#4">
                <img src="assets/brazilian.jpg" alt="" width="600" height="600"></a>
                <div class="text">Hair Brazilian</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#5">
                <img src="assets/highlights.jpg" alt="" width="600" height="600"></a>
                <div class="text">Highlights</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#6">
                <img src="../Personal Portfolio/assets/Project6.png" alt="" width="600" height="600"></a>
                <div class="text">Idk</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#7">
                <img src="../Personal Portfolio/assets/Project7.png" alt="" width="600" height="600"></a>
                <div class="text">idk</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <a href="#8">
                <img src="../Personal Portfolio/assets/Project8.png" alt="" width="600" height="600"></a>
                <div class="text">idk</div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <img src="../Personal Portfolio/assets/Project9.jpg" alt="" width="600" height="600">
                <div class="text">idk</div>
            </div>
        </div>

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
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <div class="info">
                            <div class="head">Name</div>
                            <div class="sub-title">Hair Recover.</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info">
                            <div class="head">Address</div>
                            <div class="sub-title">Caloocan City</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fa-solid fa-phone"></i>
                        <div class="info">
                            <div class="head">Tel No:</div>
                            <div class="sub-title">09XXXXXXXXX</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head">Email</div>
                            <div class="sub-title">recover.hair@gmail.com</div>
                        </div>
                    </div>
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
    
</body>
</html>
