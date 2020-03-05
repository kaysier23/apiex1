<?php
	$id = $_GET['id'];
 	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
 	$data = json_decode($json,true);
 	$details = array('records' => $data);
 	$result = $details['records'];

?>

<link rel="stylesheet" type="text/css" href="css/styles_css1.css">

	<br>
	<h1> PRODUCT DETAILS </h1>
	<hr style ="width: 25%;">
	<br>
	<table style="border: 1px black solid;">
		<tr>
			<td><h2>Name:</h2></td>
			<td><h2><?php echo $result['name']; ?></h2></td>
		</tr>
		<tr>
			<td><h2>Description: </h2></td>
			<td><h2><?php echo $result['description']; ?></h2></td>
		</tr>
		<tr>
			<td><h2>Price: </h2></td>
			<td><h2><?php echo $result['price']; ?></h2></td>
		</tr>
		<tr>
			<td><h2>Category: </h2></td>
			<td><h2><?php echo $result['category_name']; ?></h2></td>
		</tr>
	</table>
<a href="index.php?page=Update&id=<?php echo $id; ?>"><button class="confirm1" value="Update" type="submit">Update</button></a>
<a href="index.php?page=Delete&id=<?php echo $id; ?>"><button class="confirm2" value="Delete" type="submit">Delete</button></a>