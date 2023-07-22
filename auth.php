<?php 
include "config/config.php";
include "auth-config.php";

if(isset($_GET["code"]))
    {
        //It will Attempt to exchange a code for an valid authentication token.
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    
        //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
        if(!isset($token['error']))
        {
            //Set the access token used for requests
            $google_client->setAccessToken($token['access_token']);
    
            //Store "access_token" value in $_SESSION variable for future use.
            $_SESSION['access_token'] = $token['access_token'];
      
            //Create Object of Google Service OAuth 2 class
            $google_service = new Google_Service_Oauth2($google_client);
    
            //Get user profile data from google
            $data = $google_service->userinfo->get();
    
            //Below you can find Get profile data and store into $_SESSION variable
            if(!empty($data['given_name']))
            {
                $_SESSION['user_first_name'] = $data['given_name'];
                $fname = $data['given_name'];
            }
    
            if(!empty($data['family_name']))
            {
                $_SESSION['user_last_name'] = $data['family_name'];
                $lname = $data['family_name'];
            }
    
            if(!empty($data['email']))
            {
                $email_domain=substr(strrchr($data['email'], "@"), 1);
                if($email_domain!="gmail.com")
                {
                    $google_client->revokeToken();

                    //Destroy entire session data.
                    session_destroy();
                    header("Location:login.php?error=use valid gmail");
                    die();
                }
               $_SESSION['user_email_address'] = $data['email'];
               $email = $data['email'];
               $_SESSION['login_success_msg']="Login Successfull!";
            }
            else
            {
                $google_client->revokeToken();

                //Destroy entire session data.
                session_destroy();
                header('Location:userLogin.php');
                die();
            }
    
            if(!empty($data['gender']))
            {
                $_SESSION['user_gender'] = $data['gender'];
            }
            
            if(!empty($data['picture']))
            {
                $_SESSION['user_image'] = $data['picture'];
            }
            
            
            $sql_log = "insert into user_register (email,f_name,l_name) values('$email','$fname','$lname');";
            
            if(mysqli_query($con, $sql_log)){
                
            }else{
                
            }
            //check which page to redirect after successfull login
           
            
            header('Location:index.php');
            
            die();
    
      
        }
    }

?>