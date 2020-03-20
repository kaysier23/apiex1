<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('539246690236-tvoad6op2k24t4010o2re4nd9v2kjq1n.apps.googleusercontent.com');

$google_client->setClientSecret('WpZooC_GLJZXb9zunI3SH828');

$google_client->setRedirectUri('https://kyzier.herokuapp.com/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();

?>
