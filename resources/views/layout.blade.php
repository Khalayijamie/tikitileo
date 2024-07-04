<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TikitiLeo - Your Ticket Booking Solution</title>
  <meta content="Book tickets for events and pay in installments" name="description">
  <meta content="ticket booking, installments, events" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TikitiLeo
  * Template URL: https://yourwebsite.com/
  * Updated: Jul 02 2024 with Bootstrap v5.3.3
  * Author: YourName
  * License: https://yourwebsite.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="{{ route('home') }}">Tikiti<span>Leo</span></a></h1>
        <!-- <a href="{{ route('home') }}" class="scrollto"><img src="{{ asset('assets/img/logo.png') }}" alt="" title=""></a> -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('events.index') }}">Events</a></li>


          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#payment-plans">Payment Plans</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">SignUp</a></li>
          <li><a class="nav-link" href="{{ route('lockscreen') }}">Lock Screen
            <i class=<i class="bi bi-lock"></i></a>
          </li>
          @else
          <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li><a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endguest
        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
      <!-- </nav> -->
      <!-- .navbar -->
      <!-- <a class="buy-tickets scrollto" href="#buy-tickets">Buy Tickets</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Your Gateway to<br><span>Amazing Events</span></h1>
      <p class="mb-4 pb-0">Book tickets and pay in easy installments</p>
      <a href="#about" class="about-btn scrollto">Learn More</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>About Us</h2>
            <p>Welcome to TikitiLeo, your go-to platform for booking tickets to your favorite events with the flexibility of paying in installments. Whether it's concerts, conferences, or sports events, we've got you covered.</p>
          </div>
          <div class="col-lg-3">
            <h3>Why Choose Us?</h3>
            <p>We offer a hassle-free booking experience, competitive pricing, and flexible payment plans to suit your needs.</p>
          </div>
          <div class="col-lg-3">
            <h3>Our Mission</h3>
            <p>To make event attendance accessible and affordable for everyone by providing flexible payment options and exceptional customer service.</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    @yield('content')

    <!-- ======= Events Section ======= -->

<!-- End Events Section -->



    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{ asset('assets/img/logo.png') }}" alt="TikitiLeo">
            <p>Join us in making event attendance easier and more affordable. For any inquiries, reach out to us through the contact details provided.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">About Us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#events">Events</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#payment-plans">Payment Plans</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Ticket Booking</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Flexible Payments</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Customer Support</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Event Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Event Promotion</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@tikitiLeo.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-google"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TikitiLeo</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://yourwebsite.com/">YourName</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>