<?php
//Make connection to database
include 'connection.php';
$ProductID = $_GET['id'];
$query = "SELECT * FROM product WHERE ProductID=$ProductID";
//echo $query . '<br />';

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
If (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
} else {
	$row = NULL;
}
?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="main.css"/>
		<title>SAMMY'S TOYS</title>
	</head>
	<body>
		<form method="post" action="UpdateProduct.php">

			<fieldset class="fieldset-width">
				<legend>
					Product Details
				</legend>
				<input type="hidden" name="hideProductID" value="<?php echo $ProductID; ?>" />
				<label for="txtProductName">Name: </label>
				<input type="text" name="txtProductName"  value="<?php echo $row['Name']; ?>"/>
				<br />
				<br />
				<label for="txtProductDescription">Description: </label>
				<input type="text" name="txtProductDescription"  value="<?php echo $row['Description']; ?>"/>
				<br />
				<br />
				<label for="txtProductPrice">Product Price: </label>
				<input type="text" name="txtProductPrice" value="<?php echo $row['Product_Price']; ?>" />
				<br />
				<br />
				<label for="txtProductShipping">Shipping Cost: </label>
				<input type="text" name="txtProductShipping"  value="<?php echo $row['Shipping_Cost']; ?>"/>
				<br />
				<br />
				<label for="txtProductQuantity">Product Quantity: </label>
				<input type="text" name="txtProductQuantity"  value="<?php echo $row['Quantity']; ?>"/>
				<br />
				<br />
				<label for="txtProductImage">Image Filename: </label>
				<input type="text" name="txtProductImage"  value="<?php echo $row['Product_Image']; ?>"/>

			</fieldset>

			<input type="submit" value="Update" name='submit' />
			<input type="reset" value="Clear" />
		</form>
	</body>
</html>