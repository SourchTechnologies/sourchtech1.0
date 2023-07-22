<?php
    include "header-two.php";
?>
<?php
    $dev = mysqli_query($con, "select * from gallery where image_cat='Developments'");
?>
<section id="serve1" class="services section-bg" style="margin-top: 90px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Developments</p>
        </div>
        <div class="row">
           <?php 
                while($dev_row = mysqli_fetch_array($dev))
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <img src="assets/gallery/<?php echo $dev_row['image_name']; ?>" alt="Lights" style="width:100%">
                </div>
             </div>
             <?php } ?>
             
        </div>
    </div>
</section><!-- End Services Section -->


<?php
    $dev = mysqli_query($con, "select * from gallery where image_cat='Employee Activities'");
?>
<section id="serve1" class="services section-bg" style="margin-top: 15px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Employee Activities</p>
        </div>
        <div class="row">
           <?php 
                while($dev_row = mysqli_fetch_array($dev))
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <img src="assets/gallery/<?php echo $dev_row['image_name']; ?>" alt="Lights" style="width:100%">
                </div>
             </div>
             <?php } ?>
        </div>
    </div>
</section><!-- End Services Section -->


<?php
    $dev = mysqli_query($con, "select * from gallery where image_cat='Work Place'");
?>
<section id="serve1" class="services section-bg" style="margin-top: 15px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Our Work Place</p>
        </div>
        <div class="row">
           <?php 
                while($dev_row = mysqli_fetch_array($dev))
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <img src="assets/gallery/<?php echo $dev_row['image_name']; ?>" alt="Lights" style="width:100%">
                </div>
             </div>
             <?php } ?>
        </div>
    </div>
</section><!-- End Services Section -->

<?php
    include "footer.php";
?>