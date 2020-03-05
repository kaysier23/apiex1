<?php
	$jsonCategory = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$categoryData = json_decode($jsonCategory,true);
	$category = $categoryData['records'];

?>

<link rel="stylesheet" type="text/css" href="css/styles_css1.css">

<form method="POST" action="pro_create.php">
	<br>
	<h1> ADD PRODUCT </h1>
	<hr style ="width: 25%;">
	<br>
	<table style="border: 1px black solid;">
		<tr>
			<td><h2>Name:</h2></td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td><h2>Description: </h2></td>
			<td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td><h2>Price: </h2></td>
			<td><input type="text" name="price"></td>
		</tr>
		<tr>
			<td><h2>Category: </h2></td>
			<td><select type="text" name="category">
					<option value="" selected> ---Category--- </option>
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
	<button class="confirm" type="submit" value="Create" name="Submit"> Submit </button>
</form>