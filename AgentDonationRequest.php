<?php
session_start();
include('DbConnection/dbconnect.php');
$uid = $_SESSION['uid'];
include('AgentHeader.php');
?>

<!-- index-block1 -->
<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container1">
      <div class="row align-items-center py-md-5 py-3">
        <div class="col-md-3 content-left pt-md-0 pt-3">
          <img src="assets/images/donationrequest.jpg" style="padding-left: 10px;" class="img-fluid" alt="main image">
          <p style=" margin: auto; color: #cc00ff;font-family:serif;text-align: center;padding-left: 5px;">Listing food Donation Requests from registerd Users with details  . You can approve/reject  Donation based on need for food in the registerd orphnages , can  verify food needs by moving to the Orphanages list  there contains the detals about no of orphants ,locality address details , This procceesd list also contails the details about the current state of food availability ,
          </p>
        </div>
        <div class="col-md-9 content-photo mt-md-0 mt-9">
          <!-- about-block6 -->
          <div class="container">
          </div>
          <section class="w3l-about6 py-5">
            <div class="container py-md-3 text-center">
              <div class="">
                <h1 style="font-family: initial;color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Donation Request</h1> <br><br>
                <center>
                  <!-- ..............start  -->

                  <?php
                  $qry = "SELECT * FROM `donations` d,`orphanage`o,`agent_registration` a WHERE d.`oid`=o.`oid` AND d.`aid`=a.`aid` AND d.`donate_status`='pending' AND a.`aid`='" . $uid . "'";
                  $result = mysqli_query($conn, $qry);
                  if ($result->num_rows > 0) {
                  ?>
                    <table id="cust_table">
                      <tr>
                        <th>Orphanage</th>
                        <th>Address</th>
                        <th>No Of Orphans</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Agent</th>
                        <th>Contact Agent</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Donation Actioin</th>
                      </tr>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {

                      ?>
                        <tr>

                          <td> <?php echo $row[9] ?></td>
                          <td> <?php echo $row['address'] ?></td>
                          <td> <?php echo $row['no_orphans'] ?></td>
                          <td> <?php echo $row[13] ?></td>
                          <td> <?php echo $row['email'] ?></td>
                          <td> <?php echo $row['name'] ?></td>
                          <td> <?php echo $row['phone'] ?></td>
                          <td> <?php echo $row['donate_date'] ?></td>
                          <td> <?php echo $row['donate_description'] ?></td>
                          <td>
                            <a href="AgentDonateAddToColleect.php?id=<?php echo $row['did'] ?>"> Add To Collect </a>
                          </td>

                        </tr>
                    <?php
                      }
                    } else {
                      ?>
                      <img src="assets/images/no_data_found.png"  class="img-fluid" alt="main image">
                      <?php          
                                }
                        
                          
                    ?>
                    </table>
                    <!-- ..............end  -->
                    <br><br><br><br><br><br><br><br></center>
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