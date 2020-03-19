<?php
	$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

include('config.php');

$login_button = '';

if(isset($_GET["code"])){
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error'])){
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();
  if(!empty($data['given_name'])){
   $_SESSION['user_first_name'] = $data['given_name'];
  }
  if(!empty($data['family_name'])){
   $_SESSION['user_last_name'] = $data['family_name'];
  }
  if(!empty($data['email'])){
   $_SESSION['user_email_address'] = $data['email'];
  }
  if(!empty($data['gender'])){
   $_SESSION['user_gender'] = $data['gender'];
  }
  if(!empty($data['picture'])){
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
if(!isset($_SESSION['access_token'])){
 $login_button = '<br><a href="'.$google_client->createAuthUrl().'"><img style="" src="images/google.png" /></a>';
}
?>
<html>
	<head> 
		<title> API </title>
		<link rel="stylesheet" type="text/css" href="css/styles_index.css">
	</head>
	<body>
		<div class="header">
		<h3> INVENTORY </h3></a>
		</div>
	<ul>
		<li><a href="index.php">Home</a></li>
 		<li><a href="index.php?page=Product">Manage Product</a></li>
 		<li><a href="index.php?page=AddProd">Add Product</a></li>
 		<li><a href="index.php?page=Category">Category List</a></li>
	</ul>
		<br>
		<div class="content">
			<?php 
			switch($page){
				case 'Product':
					require_once 'product_list.php';
				break;
				case 'Category':
					require_once 'category_list.php';
				break;
				case 'AddProd':
					require_once 'addproduct.php';
				break;
				case 'Details':
					require_once 'product_details.php';
				break;
				case 'Update':
					require_once 'updateproduct.php';
				break;
				case 'Delete':
					require_once 'deleteproduct.php';
				break;	
				default:
				break;
			}
			?>
		</div>
</html>
