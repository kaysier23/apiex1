<?php
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	
	$jsonCat = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$catData = json_decode($jsonCat,true);
	$category = $catData['records'];

?>

<link rel="stylesheet" type="text/css" href="css/styles_css1.css">

<form method="POST" action="pro_update.php?id=<?php echo $id ?>">
	<br>
	<h1> ADD PRODUCT </h1>
	<hr style ="width: 25%;">
	<br>
	<table style="border: 1px black solid;">
		<tr>
			<td><h2>Name:</h2></td>
			<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
		</tr>
		<tr>
			<td><h2>Description: </h2></td>
			<td><input type="text" name="description" value="<?php echo $result['description'];?>"></td>
		</tr>
		<tr>
			<td><h2>Price: </h2></td>
			<td><input type="text" name="price" value="<?php echo $result['price'];?>"></td>
		</tr>
		<tr>
			<td><h2>Category: </h2></td>
			<td><select type="text" name="category">
					<option value="<?php echo $result['category_id'];?>" selected> <?php echo $result['category_name'];?> </option>
				<?php
					foreach($category as $catSelect)
					{
				?>
					<option value="<?php echo $catSelect['id']; ?>"> <?php echo $catSelect['name']; ?> </option>
				<?php
					}
				?>
			</select></td>
		</tr>
	</table>
	<button class="confirm" type="submit" value="Create" name="Submit"> Update </button>
</form>