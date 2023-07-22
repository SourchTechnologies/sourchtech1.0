<?php 
    include "header.php";
    if(!isset($_SESSION['user_email_address']))
    {
        header("Location:https://www.sourchtech.com/login.php");
    }
    if(isset($_GET['item']) && $_GET['item']!='' )
    {
        $product_slug=htmlspecialchars($_GET['item']);
        $sql = "SELECT * FROM products where category='$product_slug' and name ='Lead Generation'";
        $result = mysqli_query($con,$sql);
        
        
    }else{
       
        header("Location:https://www.sourchtech.com");
        die();
    }
    require_once 'api-stripe/config.php';  
?>
<style>
    .modal 
    {
       z-index: 9999
    }
    .modal-content
    {
      z-index:9999;
    }
    .modal-backdrop 
    {
        z-index: 1;
    }
    #hero
    {
        display:none !important;
    }
    .stripe-button-el{
        margin-top:20px;
    }
</style>
<!-- Modal -->
<!--<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                        <h5 class="modal-title">Modal title</h5>-->
<!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
<!--                    </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="container-fluid">-->
<!--                    Add rows here-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Save</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<script>-->
<!--    $('#exampleModal').on('show.bs.modal', event => {-->
<!--        var button = $(event.relatedTarget);-->
<!--        var modal = $(this);-->
        // Use above variables to manipulate the DOM
        
<!--    });-->
<!--</script>-->

<?php

    $sql1 = "SELECT category FROM products where category = '$product_slug'";
    $result1 = mysqli_query($con,$sql1);
    $des_res = mysqli_fetch_array($result1);
    if($des_res['category'] == "digital-marketing")
    {

?>

<section id="serve" class="services section-bg" style="margin-top: 105px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Lead Generation</h2>
          <p>Choose The Plan That Suits You</p>
        </div>
        <div class="row">
            <?php 
            if (mysqli_num_rows($result) > 0) 
            {   
                while($row = mysqli_fetch_array($result)) 
                {
            ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                            <h4 class="h4"><?php echo $row['price']?> USD</h4>
                            <hr>
                            <p class="description"><?php echo($row['description']) ?></p>
                            <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                            <!-- Payment button -->
                            <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                        
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <button data-toggle="modal" data-target="#modelId"  style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px; border:none; transition: 0.5s;margin-top: 30px;color: #fff;">Fill Questionnaire</button>
                            
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                }
            }
            else
            {
                echo "NO Items Found";
            }
         ?> 
        </div>
    </div>
</section><!-- End Services Section -->

<?php
}


    $sql3 = "SELECT * FROM products where category='$product_slug' and name ='Appointment Setting'";
    $result3 = mysqli_query($con,$sql3);
    if (mysqli_num_rows($result3) > 0) 
    {   

?>
<section id="serve1" class="services section-bg" style="margin-top: 30px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Appointment Setting</h2>
            <p>Choose The Plan That Suits You</p>
        </div>
        <div class="row">
            <?php
                while($row = mysqli_fetch_array($result3)) 
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                    <h4 class="h4"><?php echo $row['price']?> USD</h4>
                    <hr>
                    <p class="description"><?php echo $row['description']?></p>
                    <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                         <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                </div>
             </div>
             <?php
                }
            ?>
        </div>
    </div>
</section><!-- End Services Section -->

<?php

    $sql3 = "SELECT * FROM products where category='$product_slug' and name ='Social Media Marketing'";
    $result3 = mysqli_query($con,$sql3);
    if (mysqli_num_rows($result3) > 0) 
    {   

?>
<section id="serve1" class="services section-bg" style="margin-top: 30px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Socal Media Marketing</h2>
            <p>Choose The Plan That Suits You</p>
        </div>
        <div class="row">
            <?php
                while($row = mysqli_fetch_array($result3)) 
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                    <h4 class="h4"><?php echo $row['price']?> USD</h4>
                    <hr>
                    <p class="description"><?php echo $row['description']?></p>
                    <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                        <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                </div>
             </div>
             <?php
                }
            ?>
        </div>
    </div>
</section><!-- End Services Section -->
<?php } ?>

<?php

    $sql3 = "SELECT * FROM products where category='$product_slug' and name ='Cold Calling'";
    $result3 = mysqli_query($con,$sql3);
    if (mysqli_num_rows($result3) > 0) 
    {   

?>
<section id="serve1" class="services section-bg" style="margin-top: 30px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Cold Calling</h2>
            <p>Choose The Plan That Suits You</p>
        </div>
        <div class="row">
            <?php
                while($row = mysqli_fetch_array($result3)) 
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                    <h4 class="h4"><?php echo $row['price']?> USD</h4>
                    <hr>
                    <p class="description"><?php echo $row['description']?></p>
                    <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                            <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                        
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                </div>
             </div>
             <?php
                }
            ?>
        </div>
    </div>
</section><!-- End Services Section -->
<?php } ?>

<?php

    $sql3 = "SELECT * FROM products where category='$product_slug' and name ='Search Engine Optimization'";
    $result3 = mysqli_query($con,$sql3);
    if (mysqli_num_rows($result3) > 0) 
    {   

?>
<section id="serve1" class="services section-bg" style="margin-top: 30px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Search Engine Optimization</h2>
            <p>Choose The Plan That Suits You</p>
        </div>
        <div class="row">
            <?php
                while($row = mysqli_fetch_array($result3)) 
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                    <h4 class="h4"><?php echo $row['price']?> USD</h4>
                    <hr>
                    <p class="description"><?php echo $row['description']?></p>
                    <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                        <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                </div>
             </div>
             <?php
                }
            ?>
        </div>
    </div>
</section><!-- End Services Section -->
<?php } ?>



<?php } ?>



<?php

    if($des_res['category'] == "remote-employment")
    {
        $sql4 = "SELECT * FROM products where category='$product_slug' and name ='Remote Work'";
        $result4 = mysqli_query($con,$sql4);
        if (mysqli_num_rows($result4) > 0) 
        { 
?>

<section id="serve" class="services section-bg" style="margin-top: 78px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Remote Human Resource</h2>
          <p>Select What You Are Looking For</p>
        </div>
    
        <div class="row">
            <?php
                while($row = mysqli_fetch_array($result4)) 
                {
            ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                    <h4 class="sub-title"><?php echo $row['description']?></h4>
                    <a href="#" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Book Now</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
</section><!-- End Services Section -->
<?php } } ?>

<?php

    $sql = "SELECT category FROM products where category = '$product_slug'";
    $result = mysqli_query($con,$sql);
    $des_res = mysqli_fetch_array($result);
    if($des_res['category'] == "web-development")
    {
        $sql = "SELECT * FROM products where category='$product_slug' and name ='Web Development'";
        $result = mysqli_query($con,$sql);

?>

<section id="serve" class="services section-bg" style="margin-top: 105px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Web Development</h2>
          <p>Plans and Pricing</p>
        </div>
        <div class="row">
            <?php 
            if (mysqli_num_rows($result) > 0) 
            {   
                while($row = mysqli_fetch_array($result)) 
                {
            ?>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                            <h4 class="h4"><?php echo $row['price']?> USD</h4>
                            <hr>
                            <p class="description"><?php echo($row['description']) ?></p>
                            <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                        <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                }
            }
            else
            {
                echo "NO Items Found";
            }
         ?> 
        </div>
    </div>
</section><!-- End Services Section -->
<?php } ?>

<?php

    $sql = "SELECT category FROM products where category = '$product_slug'";
    $result = mysqli_query($con,$sql);
    $des_res = mysqli_fetch_array($result);
    if($des_res['category'] == "web-development")
    {
        $sql = "SELECT * FROM products where category='$product_slug' and name ='App Development'";
        $result = mysqli_query($con,$sql);

?>

<section id="serve" class="services section-bg" style="margin-top: 15px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>App Development</h2>
          <p>Plans and Pricing</p>
        </div>
        <div class="row">
            <?php 
            if (mysqli_num_rows($result) > 0) 
            {   
                while($row = mysqli_fetch_array($result)) 
                {
            ?>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                            <h4 class="h4"><?php echo $row['price']?> USD</h4>
                            <hr>
                            <p class="description"><?php echo($row['description']) ?></p>
                            <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                        <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                }
            }
            else
            {
                echo "NO Items Found";
            }
         ?> 
        </div>
    </div>
</section><!-- End Services Section -->
<?php } ?>

<?php

    $sql = "SELECT category FROM products where category = '$product_slug'";
    $result = mysqli_query($con,$sql);
    $des_res = mysqli_fetch_array($result);
    if($des_res['category'] == "web-development")
    {
        $sql = "SELECT * FROM products where category='$product_slug' and name ='Data Analytics'";
        $result = mysqli_query($con,$sql);

?>

<section id="serve" class="services section-bg" style="margin-top: 15px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Data Analytics</h2>
          <p>Choose A Plan</p>
        </div>
        <div class="row">
            <?php 
            if (mysqli_num_rows($result) > 0) 
            {   
                while($row = mysqli_fetch_array($result)) 
                {
            ?>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4 class="title text-uppercase"><?php echo $row['level']?></h4>
                            <h4 class="h4"><?php echo $row['price']?> USD</h4>
                            <hr>
                            <p class="description"><?php echo($row['description']) ?></p>
                            <?php 
                                $product_id = $row['id'];
                                $email = $_SESSION['user_email_address'];
                                $check_sql = "SELECT * FROM `payments` WHERE product_id = $product_id AND buyer_email = '$email'";
                                $check_result = mysqli_query($con,$check_sql);
                                if(mysqli_num_rows($check_result) == 0) 
                                {
                            ?>
                            <!--<form class="paypal" action="api-paypal/request.php" method="post" id="paypal_form">-->
                            <!--  <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>" >-->
                            <!--  <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>" >-->
                            <!--  <input type="hidden" name="currency_code" value="USD" >-->
                            <!--  <input type="submit" name="submit" value="Buy Using PAYPAL" class="btn__default" style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">-->
                            <!--</form>-->
                            <!--<a href="api-razorpay/request.php?product=<?php echo $row['id']?>" style="background: #eb5d1e;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Buy Using Razorpay</a>-->
                        <button class="stripe-button payButton btn__default" data-value=<?php echo $row['id']?> id="payButton" 
                            style="background: #287397;font-weight: 500;font-size: 16px;letter-spacing: 1px; border:none; display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="buttonText">Pay Now</span>
                            </button>
                            <?php 
                                }
                                else
                                {
                            ?>          
                            <a href="" style="background: #416816;font-weight: 500;font-size: 16px;letter-spacing: 1px;display: inline-block;padding: 8px 28px;border-radius: 3px;transition: 0.5s;margin-top: 30px;color: #fff;">Already Purchased</a>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                }
            }
            else
            {
                echo "NO Items Found";
            }
         ?> 
        </div>
    </div>
</section><!-- End Services Section -->

<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<!--<script src="api-stripe/stripe-payment.js"></script>-->
<script>
// Set Stripe publishable key to initialize Stripe.js
const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Select payment button
const payBtn = document.querySelectorAll("#payButton");
//const value = payBtn.getAttribute('data-value');
var value;
// Payment request handler
$('.payButton').click(function () {
    value = this.getAttribute('data-value');
    setLoading(true);

    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});
    
// Create a Checkout Session with the selected product
const createCheckoutSession = function (stripe) {
    return fetch("api-stripe/payment_init.php?product_id="+value, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            createCheckoutSession: 1,
        }),
    }).then(function (result) {
        return result.json();
    });
};

// Handle any errors returned from Checkout
const handleResult = function (result) {
    if (result.error) {
        showMessage(result.error.message);
    }
    
    setLoading(false);
};

// Show a spinner on payment processing
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        payBtn.disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#buttonText").classList.add("hidden");
    } else {
        // Enable the button and hide spinner
        payBtn.disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#buttonText").classList.remove("hidden");
    }
}

// Display message
function showMessage(messageText) {
    const messageContainer = document.querySelector("#paymentResponse");
	
    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;
	
    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 5000);
}
</script>


<?php
include "footer.php";
?>
