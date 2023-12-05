<?php
include "connection.php";
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salon Appointment Website</title>
  <link rel="icon" type="img/png" href="#">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/884b91a3a4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

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
    <nav class="navbar">
        <div class="width">
            <div class="logo"><a href="#">recover.hair<span></span></a></div>
            <ul class="menu">
                <li><a href="#home">home</a></li>
                <li><a href="#bio">about</a></li>
                <li><a href="#services">services</a></li>
                <li><a href="#contact">contact</a></li>
                <li class="signup"><a href="#signup">sign up</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            </div>
    </nav>

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
                <a href="#booknow" class="text-3">
                    Book now!
                </a>
                <?php
      if (isset($_SESSION["user_id"])) {
        echo "<a class='btn btn-primary btn-lg' href='clienthomepage.php' role='button'>Book Appointment</a>";    
      } else {
        echo "<a class='btn btn-primary btn-lg' href='login.php' role='button'>Book Appointment</a>";
      }
      ?>
            </div>
        </div>
    </section>

<!--About-->
<section class="bio" id="bio">
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
<section class="project" id="activities">
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
                            <div class="sub-title">Lorem</div>
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
                            <div class="sub-title">gerente.jayannrose.bscs2021@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column right">
            <div class="text">Message us</div>
            <form action="https://formspree.io/f/mbjwwpke" method="POST" method="POST">
                <div class="field name">
                    <input type="text" placeholder="Name" required>
                </div>
                <div class="field email">
                    <input type="email" placeholder="Email" required>
                </div>
                
                <div class="field textarea">
                    <textarea cols="30" rows="10" placeholder="Message" required></textarea>
                </div>
                <div class="button">
                    <button type="submit">Send message</button>
                </div>    
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<footer>
    <span class="far fa-copyright"></span>Recover Hair.
</footer>
    <script src="script.js"></script>
</body>
</html>
