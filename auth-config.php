<?php

//auth config.php

//Include Google Client Library for PHP autoload file

require_once 'google-auth/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1007669522953-ggbfc83chh4ehkdckoadrto6hcne8uof.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://www.sourchtech.com');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
if(!isset($_SESSION)){
    session_start();
}
?>