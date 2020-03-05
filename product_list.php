<?php
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');
 	$data = json_decode($json,true);

	$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : '';

	if(isset($search)){
	$prodsearch = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
	$rec = json_decode($prodsearch,true);

	$list = $rec['records'];
	
 }else{
	$list = $data['records'];
 }
 
?>

<link rel="stylesheet" type="text/css" href="css/styles_css.css">

<h1>PRODUCT LIST</h1>
<BR>

<form method = "POST" action="index.php?page=Product">
	<input class="search" type="text" name ="search">
	<input class="submit" type="submit" name="submit" value="SEARCH">
</form>
<br>

<table>
		<tr>
			<td> <b>Name</b> </td>
			<td> <b>Price</b> </td>
			<td> <b>Description</b> </td>
			<td> <b>Category</b> </td>
		</tr>
<?php 
	foreach($list as $result)
	{
?>
		<tr>
			<td> <a href="index.php?page=Details&id=<?php echo $result['id'];?>"> <?php echo $result['name']; ?> </a> </td>
      		<td><?php echo $result['price']; ?> </td>
     		<td><?php echo $result['description']; ?> </td>
      		<td><?php echo $result['category_name'];?> </td>
		</tr>
<?php
	}
?>
</table>
<br>
<br>
<br>