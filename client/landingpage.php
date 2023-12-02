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
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .jumbotron {
      background-image: url('salonbackground.webp');
      background-size: cover;
      color: #fff;
      text-align: center;
      padding: 150px 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Salon</a>
      <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button class="btn btn-secondary">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron">
    <h1 class="display-4">Welcome to our Salon</h1>
    <p class="lead">Book your appointment now!</p>
    <?php
      if (isset($_SESSION["user_id"])) {
        echo "<a class='btn btn-primary btn-lg' href='clienthomepage.php' role='button'>Book Appointment</a>";    
      } else {
        echo "<a class='btn btn-primary btn-lg' href='login.php' role='button'>Book Appointment</a>";
      }
    ?>
    
  </div>

  <!-- Services Section -->
  <section id="services" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Our Services</h2>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="btn btn-secondary">
              <h5 class="card-title">Haircut</h5>
              <p class="card-text">forda short hair</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="btn btn-secondary">
              <h5 class="card-title">Hair Perm</h5>
              <p class="card-text">If you want to curl your hair, click here!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="btn btn-secondary">
              <h5 class="card-title">Rebond</h5>
              <p class="card-text">bagsak na hair para sa bagsak na grades</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">About Us</h2>
      <div class="row">
        <div class="col-md-6">
          <p>We are the Group 6 from BSCS 3B</p>
        </div>
        <div class="col-md-6">
          <p>Prince Lawrence Jacinto, Jayann Rose Gerente, Juliet Bautista</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Contact Us</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
