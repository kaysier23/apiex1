<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('302699445942-3unsom02e9b2hc1f69rmnm92g3biie1p.apps.googleusercontent.com');

$google_client->setClientSecret('seLDKEPjBg6lTt_IV8maLV9_');

$google_client->setRedirectUri('https://kyzier.herokuapp.com/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();

?>
