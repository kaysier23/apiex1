<?php
	$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
?>
<html>
	<head> 
		<title> API </title>
		<link rel="stylesheet" type="text/css" href="css/styles_index.css">
	</head>
	<body>
		<div class="header">
			<a href="index.php"><h3> INVENTORY </h3></a>
		</div>
	<ul>
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