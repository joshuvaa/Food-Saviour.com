<?php
session_start();
include('DbConnection/dbconnect.php');
$uid = $_SESSION['uid'];
include('UserHeader.php');
?>

<!-- index-block1 -->
<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container1">
      <div class="row ">
        <div class="col-md-3 content-left pt-md-0 pt-3" style="margin-top:120px;">
          <img src="assets/images/donation_add.png" style="padding-left: 10px;" class="img-fluid" alt="main image">
          <p style=" margin: auto; color: #cc00ff;font-family:serif;text-align: center;padding-left: 5px;">Every day the people are wasting lots of foods. So, we have to reduce that food wastage problem through online. If anyone have wastage foods, they are entering their food quantity details and their address in that application and then the admin maintains the details of food donor
          </p>
        </div>
        <div class="col-md-9 content-photo mt-md-0 mt-9">
          <!-- about-block6 -->
          <div class="container">
          </div>
          <section class="w3l-about6 py-5">
            <div class="container py-md-3 text-center">
              <div class="">
                <h1 style="font-family: initial;color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Donate Food</h1> <br><br>
                <center>
                  <!-- ..............start  -->
                  <!-- index-block2 -->
                  <div class="container" style="    width: 60%;">
                    <div class="login-form py-5 px-4 mx-auto">


                      <?php
                      $oid  = $_REQUEST['id'];
                      $qry = "SELECT * FROM `orphanage` WHERE oid='" . $oid . "'";;
                      $result = mysqli_query($conn, $qry);
                      $row = mysqli_fetch_array($result)
                      ?>
                      <form method="post">

                        <div class="form-group">
                          <input type='text' class="form-control" value="<?php echo $row['name'] ?> " name="farm_name" disabled> </div>
                        <div class="form-group">
                          <input type='text' class="form-control" value='<?php echo $row['address'] ?> ' name="category" disabled> </div>
                        <div class="form-group">
                          <input type='text'  class="form-control" value='<?php echo $row['phone'] ?>' name="price" disabled> </div>
                        <div class="form-group">
                          <input type='text' class="form-control" name="date" value='<?php echo $row['no_orphans'] ?>' disabled> </div>
                        <div class="form-group">
                          <textarea name="description"  class="form-control" required></textarea>
                        </div>
                        <button type="submit" name="submit"class="btn btn-primary btn-theme">Donate Now</button><br><br>
                      </form>
                      <?php
                      if (isset($_REQUEST['submit'])) {
                        $uid = $_SESSION['uid'];
                        $aid = $row['aid'];
                        $date = date('Y-m-d');
                        $description = $_REQUEST['description'];


                        $qry = "INSERT INTO `donations` (`uid`,`aid`,`oid`,`donate_date`,`donate_description`,`donate_status`)  VALUES('$uid','$aid','$oid','$date','$description','pending')";

                        // echo $qry;
                        if ($conn->query($qry) == TRUE) {
                          echo "<script>alert('booking Successfully');window.location='UserHome.php'</script>";
                        } else {
                          echo "<script>alert('failed');window.location='UserHome.php'</script>";
                        }
                      }

                      ?>

                    </div>
                  </div>
                  <!-- /index-block2 -->
                  <!-- ..............end  -->
                  <br><br><br><br><br><br><br><br>
                </center>
              </div>

            </div>
          </section>
          <!-- / about-block6 -->
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!-- //index-block1 -->




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