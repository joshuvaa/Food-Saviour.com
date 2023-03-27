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
            <a href="#login_div" class="btn btn-primary btn-theme">Sigin Up</a>
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
                <h3 class="account-title mb-4">Agent <a href=""> Sign Up</a></h3>

                <form action="#" method="GET">
                  <div class="form-group">
                    <label class="field-info" for="text">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required title="enter characters only">
                  </div>
                  <div class="form-group">
                    <label class="field-info" for="Name">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Location" required pattern="[A-Za-z-]+" title="enter characters only">
                  </div>
                  <div class="form-group">
                    <label class="field-info" for="Name">District</label>
                    <input type="text" name="district" class="form-control" placeholder="District" required pattern="[A-Za-z-]+" title="enter characters only"> </div>
                  <div class="form-group">
                    <label class="field-info" for="Name">Phone</label>
                    <input type="text" name="phone" class="form-control" maxlength="10" placeholder="Phone" required pattern="[0-9]{10}" title="enter 10 digits only">
                  </div>
                  <div class="form-group">
                    <label class="field-info" for="Email">SignUp</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                  </div>
                  <div class="form-group">
                    <label class="field-info" for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" name="password" id="inputPassword" required="">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-theme">
                    SiginUp
                  </button><br><br>
                </form>

                <?php
                if (isset($_REQUEST['submit'])) {
                  $name = $_REQUEST['name'];
                  $location = $_REQUEST['location'];
                  $district = $_REQUEST['district'];
                  $phone = $_REQUEST['phone'];
                  $email = $_REQUEST['email'];
                  $password = $_REQUEST['password'];

                  $qryCheck = "SELECT COUNT(*) AS cnt FROM agent_registration WHERE email = '$email' OR phone = '$password'";

                  $qryOut = mysqli_query($conn, $qryCheck);

                  $fetchDAta = mysqli_fetch_array($qryOut);

                  if($fetchDAta['cnt']>0){
                    echo "<script>alert('Already exist an Account with same Email/Phone Number');window.location = 'UserRegistration.php';</script>";
                  }else{

                  $qryReg = "INSERT INTO `agent_registration` (`name`,`district`,`location`,`phone`,`email`) values('$name','$district','$location','$phone','$email')";
                  $qryLog = "INSERT INTO login (uid,username,password,type,`status`)values((select max(aid)from agent_registration),'$email','$password','agent','0')";
                  //    echo $qryReg."<br>".$qryLog;
                  if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {

                    echo "<script>alert('Registration Completed Successfully');window.location='index.php'</script>";
                  } else {
                    echo "<script>alert('Registration failed');window.location='AgentRegistration.php'</script>";
                  }
                }
              }
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