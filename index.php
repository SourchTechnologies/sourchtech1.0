<?php

  include "header.php";
 //include "config/config.php";
  $product_query = "SELECT * FROM product_category;";
  $result = mysqli_query($con,$product_query);

?>

  <style>
  ul{
      list-style:none;
  }
  </style>
<?php
    $about_query = mysqli_query($con, 'select * from about');
    $about_res = mysqli_fetch_array($about_query);
?>
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">About Sourch Technologies</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              Where data and technology outflow.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Sourch Technologies Goal</h4>
                <p><?php echo $about_res['mission']; ?></p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Sourch Technologies Vision</h4>
                <p><?php echo $about_res['vision']; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Check out the great services we offer</p>
        </div>

        <div class="row">
            <?php if(mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) { ?>
          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href=""><?=$row['name']?></a></h4>
              <p class="description" ><?=$row['description']?></p>
            <a href="checkout.php?item=<?=$row['slug']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Explore</a>
            </div>

          </div>
          <?php }
          }?>
          

         

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Team</p>
        </div>
        
        <div class="row">
            <?php
                $team_query = mysqli_query($con, 'select * from team');
                while($team_res = mysqli_fetch_array($team_query))
                {
            ?>
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/<?php echo $team_res['image_name']; ?>" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?php echo $team_res['name']; ?></h4>
                  <span><?php echo $team_res['designation']; ?></span>
                </div>
                <div class="social">
                  <a target = "_blank" href="<?php echo $team_res['twitter']; ?>"><i class="bi bi-twitter"></i></a>
                  <a target = "_blank" href="<?php echo $team_res['facebook']; ?>"><i class="bi bi-facebook"></i></a>
                  <a target = "_blank" href="<?php echo $team_res['instagram']; ?>"><i class="bi bi-instagram"></i></a>
                  <a target = "_blank" href="<?php echo $team_res['linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= 
    <section id="clients" class="clients section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Clients</p>
        </div>

        <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper align-items-center">
            <!--<div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div> 
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
            <div class="swiper-slide">Coming Soon!</div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
     End Clients Section -->


    <?php
        $contact_query = mysqli_query($con, 'select * from address_details');
        $contact_res = mysqli_fetch_array($contact_query);
    ?>
    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Contact Us</h2> -->
          <p>Contact Us</p>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p><?php echo $contact_res['address'] ?></p>
                        </div>
                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $contact_res['email_id'] ?></p>
                        </div>
                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p><?php echo $contact_res['phone_number'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105735.8441233188!2d74.50579834999999!3d34.0888603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e1bda741e90905%3A0x76606ecc9e95e67f!2sBadran%20193401!5e0!3m2!1sen!2sin!4v1674364520620!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 315px;" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <?php 
  include "footer.php";
  ?>