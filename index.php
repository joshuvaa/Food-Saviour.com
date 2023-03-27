<?php
session_start();
include('DbConnection/dbconnect.php');
// include('Common Page Header.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Food Saviour</title>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
  <div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container">
        <a class="navbar-brand" href="index.html"><span class="fa fa-diamond"></span>Food Saviour</a>
        <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
           
          </ul>
          <div class="form-inline">
            <a href="#login_div" class="btn btn-primary btn-theme">Login</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- index-block1 -->
  <div class="w3l-index-block1">
    <div class="content py-5">
      <div class="container">
        <div class="row align-items-center py-md-5 py-3">
          <div class="col-md-5 content-left pt-md-0 pt-5">
            <h1>we are reducing that food wastage using this application</h1>
            <p class="mt-3 mb-md-5 mb-4">This project is used to manage wastage foods in a useful way. Every day the people are wasting lots of foods. So, we have to reduce that food wastage problem through online.</p>
            <a href="#login_div" class="btn btn-primary btn-theme">Get Started</a>
          </div>
          <div class="col-md-7 content-photo mt-md-0 mt-5">
            <img src="assets/images/donatefood1.png" class="img-fluid" alt="main image">
            <!-- <img src="fooddonate.png" class="img-fluid" alt="main image"> -->
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <!-- //index-block1 -->
  <!-- index-block2 -->
  <section class="w3l-index-block2 py-5" id="login_div">
    <div class="container py-md-3">
      <div class="heading text-center mx-auto">
        <!-- ...........  -->
        <section class="w3l-login">
          <div class="login-box">
            <div class="container" style="    width: 80%;">
              <div class="login-form py-5 px-4 mx-auto">
                <h3 class="account-title mb-4">Please Log in, or <a href="signup.html">Sign Up</a></h3>
                <form action="#" method="GET">
                  <div class="form-group">
                    <label class="field-info" for="inputUsernameEmail">Username or email</label>
                    <input type="text" class="form-control" name="email" id="inputUsernameEmail" required="">
                  </div>
                  <div class="form-group">
                    <label class="field-info" for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" required="">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-theme">
                    Login
                  </button><br><br>
                  <button type="reset" name="reset" class="btn btn-primary btn-theme">
                    reset
                  </button><br><br>
                  <p>
                    <label class="mb-2" style="margin-right: 35px;color: #1c72ca;"><a href="UserRegistration.php">User SignUp</a></label> <label class="mb-2" style="margin-left: 35px;color: #1c72ca;"><a href="AgentRegistration.php">Agent SignUp</a></label>
                  </p>
                </form>

                <?php
                if (isset($_REQUEST['submit'])) {
                  $email = $_REQUEST['email'];
                  $password = $_REQUEST['password'];
                  $qry = "SELECT * from login WHERE `username`='$email' AND `password`='$password' AND `status`='1'";
                  $result = mysqli_query($conn, $qry);
                  if ($result) {
                    $data = $result->fetch_assoc();
                    $uid = $data['uid'];
                    $type = $data['type'];
                    $_SESSION['uid'] = $uid;
                    $_SESSION['username'] = $email;
                    $_SESSION['type'] = $type;


                    echo "<script>alert('Login Success')</script>";
                    if ($type == "agent") {
                      echo "<script>window.location='AgentHome.php'</script>";
                    } else if ($type == "user") {
                      echo "<script>window.location='UserHome.php'</script>";
                    } else if ($type == "admin") {
                      echo "<script>window.location='AdminHome.php'</script>";
                    }
                  } else {
                    echo "<script>alert('Login failed');window.location('Login.php')</script>";
                  }
                }

                // include('Common Page Footer.php');

                ?>



              </div>
            </div>
          </div>
        </section>
        <!-- ...........  -->

      </div>

    </div>
  </section>
  <!-- /index-block2 -->
  <!-- content-with-photo17 -->
  <section class="w3l-index-block3">
    <div class="section-info py-5">
      <div class="container py-md-3">
        <div class="row cwp17-two align-items-center">
          <div class="col-md-6 cwp17-image">
            <img src="assets/images/donatefood2.jpg" class="img-fluid" alt="" />
          </div>
          <div class="col-md-6 cwp17-text">
            <h2>Start reducing food wastage using this application</h2>
            <p>This project is used to manage wastage foods in a useful way. Every day the people are wasting lots of foods. So, we have to reduce that food wastage problem through online.
              If anyone have wastage foods, they are entering their food quantity details and their address in that application and then the admin maintains the details of food donor. </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- content-with-photo17 -->

  <section class="w3l-index-block5">

  </section>



  <!-- footer-28 block -->
  <section class="w3l-market-footer">
    <footer class="footer-28">
      <div class="footer-bg-layer">
        <div class="container py-lg-3">
          <div class="row footer-top-28">


          </div>
        </div>


        <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
          <div class="container">
            <p class="copy-footer-28 text-center"> &copy; 2020 Food Saviour. All Rights Reserved. Design by <a href="">Lcc Edu</a></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- //footer-28 block -->

  <!-- jQuery, Bootstrap JS -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Template JavaScript -->

  <script src="assets/js/owl.carousel.js"></script>

  <!-- script for owlcarousel -->
  <script>
    $(document).ready(function() {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script for owlcarousel -->

  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function() {
      $('.navbar-toggler').click(function() {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->

  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });

      $('.popup-with-move-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
      });
    });
  </script>

</body>

</html>