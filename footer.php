<?php
    $contact_query = mysqli_query($con, 'select * from address_details');
    $contact_res = mysqli_fetch_array($contact_query);
?>
<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!--<div class="col-lg-3 col-md-6 footer-contact">
            <img style="height: 65px;" src="assets/img/logo.png" alt="" class="img-fluid">
            <p>
              <?php echo $contact_res['address'] ?><br><br>
              <strong>Phone:</strong> <?php echo $contact_res['phone_number'] ?><br><br>
              <strong>Email:</strong> <?php echo $contact_res['email_id'] ?><br>
            </p>
          </div>-->

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="privacy-policy.php">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="privacy-policy.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="checkout.php?item=digital-marketing">Digital Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="checkout.php?item=web-development">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="checkout.php?item=remote-employment">Remote Human Resource</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="careers.php">Careers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target = "_blank" href="https://fastor7.com/">Partners</a></li>
            </ul>
          </div>
          
          

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Follow Us On</h4>
            <div class="social-links mt-3">
              <a target = "_blank" href="https://twitter.com/SourchTech" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a target = "_blank" href="https://www.facebook.com/profile.php?id=100087385240967" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a target = "_blank" href="https://www.instagram.com/sourchtech/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a target = "_blank" href="https://www.linkedin.com/company/sourch/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-md-6 footer-links">
            <h4>YouTube Videos</h4>
            <iframe src="https://www.youtube.com/embed/LVYUZRgXqNE?autoplay=1" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
<a href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/sourchtech'});return false;">Schedule time with me</a>
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span><img style="height: 25px;" src="assets/img/logo.png" alt="" class="img-fluid"></span></strong> All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href=""><img style="height: 25px;" src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

<!-- Calendly link widget end -->
  <!-- Vendor JS Files -->
  <script src="//code.tidio.co/bslgptyyeaxnx50yc7ijzknniraxiamd.js" async></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>