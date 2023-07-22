<?php 
    $title = "Sign In | SourchTech";
    if(isset($_SESSION['user_email_address'])){
        header("Location:https://www.sourchtech.com");
    }
    include 'header.php';
    
    
        $login_button = '';
        $error_msg="";
        
        if($_GET['error'])
        {
            $error_msg = htmlspecialchars($_GET['error']);
        }
        
        
         $google_client->setRedirectUri('https://www.sourchtech.com');
       
        
        //This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
        if(!isset($_SESSION['access_token']))
        {
            
            
         //Create a URL to obtain user authorization
         $login_button = '<a href="'.$google_client->createAuthUrl().'"><button><img class="google-icon" height="40px" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/> &nbsp; Sign In With Google</button></a>';
         
         
        }
        else{
             //echo "<script>window.location.href='index.php';</script>";
                exit();
        }
?> 
<style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

body 
{
  background: linear-gradient(90deg, #F3FBFB 100%, #FFD803 0%);
}

#hero{
    display:none !important;
}

.login 
{
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}

.form 
{
  position: relative;
  z-index: 1;
  background: #a8d7ad;
  border-radius: 10px;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
}

.form input 
{
  outline: 0;
  background: #FFD803;
  width: 100%;
  border: 0;
  border-radius: 5px;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  font-family: 'Comfortaa', cursive;
}

.form input:focus {
  background: #dbdbdb;
}

.form button 
{
  font-family: 'Comfortaa', cursive;
  
  outline: 0;
  background: #FDFBF2;
  width: 100%;
  border: 0;
  border-radius: 5px;
  padding: 15px;
  color: #272343;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form button:active 
{
  background: #395591;
}

.form span 
{
  font-size: 75px;
  color: #FFD803;
}
</style>
<?php 
    if($error_msg=="use valid gmail"){
?>
<div class="alert alert-danger mx-auto mt-5 w-50 text-center" role="alert">
  <?=$error_msg?>
</div>
<?php } ?>
<div class="login">
  <div class="form">
    
      <span><i class="fa fa-lock"></i></span>
      
      <?php echo $login_button?>
  </div>
</div>

