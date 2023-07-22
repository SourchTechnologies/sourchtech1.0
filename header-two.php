
<?php 
try{
include "auth.php";
}catch(Exception $e){
    echo 'error:'.$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sourch Tech - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!--<h1 class="text-light"><a href="index.html"><span>SourchTech</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid" ></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="gallery.php">Gallery</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          
          
                                    <?php 
                                    if (isset($_SESSION['access_token'])){
                                    ?>
                                    
                                        <li class="nav-item dropdown">
                                          <a  class="nav-link dropdown-toggle" href="#" id="navbardrop" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?=$_SESSION['user_first_name'] ?>
                                          </a>
                                          <div class="dropdown-menu">
                                              <a class = "dropdown-item" href=""><img src="<?php echo $_SESSION['user_image']; ?>" height="35" class="rounded-circle" alt="Responsive image"></a>
                                            <a class="dropdown-item" style="border-bottom:1px solid;" href="#"><?=$_SESSION['user_first_name'] ?></a>
                                            
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                            
                                          </div>
                                        </li>
                                    <?php }?>
          
        
        <?php if(!isset($_SESSION['access_token'])){ ?>
                                <li>
                                    <a class="nav-link scrollto" href="login.php?next=index" style="background: #eb5d1e; color: #fff; padding: 10px 25px; margin-left: 30px; border-radius: 50px;">Login</a>
                                </li>
                               <!-- <div class="buttons">
                                    <a href="login.php?next=index"><input type="button" value="Login" ></a>
                                </div>-->
                                <?php } ?>
            </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  