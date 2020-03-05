<?php
	$id = $_GET['id'];
 	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
 	$data = json_decode($json,true);
 	$details = array('records' => $data);
 	$result = $details['records'];
?>

<link rel="stylesheet" type="text/css" href="css/styles_css.css">

<html>
	<head> 
		<title> Delete Confirm </title>
		<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">
	</head>
	<body>
		<h1>Are you sure to delete <?php echo $result['name']?>?</h1>
		<br>
		<form action = "pro_delete.php?id=<?php echo $id?>" method = "POST">
			<input class="delete" type="Submit" name="Submit" value="Yes">
		</form>
		<form action="index.php?page=Product">
			<button class="delete" type="submit"> No </button>
		</form>
	</body>
</html>