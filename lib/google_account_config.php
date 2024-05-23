<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once './vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('630194698561-otudoafvl4o5jmi4j3t4j5hk9incrce3.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Gym_MarFit/index.php?controller=Login&action=procesarGoogle');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');