<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="main.css"/>
		<title>SAMMY'S TOYS</title>
	</head>
	<body>
		<?php

		//connection to database
		include 'connection.php';
		//Display heading
		echo '<h2>Manage Products</h2>';
		//run query to select all records from customer table
		//store the result of the query in a variable
		$query="SELECT * FROM product";
		if (isset($_GET['sort'])){
			$query=$query." ORDER BY ".$_GET['sort'];
			//echo $query;
		}
		//displaying the data stored in the product table.
		$result = mysqli_query($connection, $query) or die(mysqli_error());
		echo '<table><tr><th><a href="manage.php?sort=ProductID">Product ID</a></th><th><a href="manage.php?sort=Name">Name</a></th><th><a href="manage.php?sort=Description">Description</a></th><th><a href="manage.php?sort=Product_Price">Product Price</a></th><th><a href="manage.php?sort=Shipping_Cost">Shipping Cost</a></th><th><a href="manage.php?sort=Quantity">Product Quantity</a></th><th>Image</th><th>Edit</th><th>Delete</th></tr>';
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['ProductID'] . '</td>';
			echo '<td>' . $row['Name'] . '</td>';
			echo '<td>' . $row['Description'] . '</td>';
			echo '<td>' . $row['Product_Price'] . '</td>';
			echo '<td>' . $row['Shipping_Cost'] . '</td>';
			echo '<td>' . $row['Quantity'] . '</td>';
			echo '<td><img src="./images/'.$row['Product_Image'].'" width="300" height="300"/></td>';
			echo '<td><a href="AmendProduct.php?id=' . $row['ProductID'] . '">Edit</a></td>';
			echo '<td><a href="DeleteProduct.php?id=' . $row['ProductID'] . '">Delete</a></td>';
			echo '</tr>';
		}
		echo '</table>';
		?>
		<p>
			<form method="post" action="WriteProduct.php">
				<fieldset class="fieldset-width1">
					<legend>
						Enter New Product Details
					</legend>
					<label class="align" for="txtProductID">Product ID: </label>
					<input type="text" name="txtProductID"  />
					<br />
					<br />
					<label class="align" for="txtProductName">Name: </label>
					<input type="text" name="txtProductName"  />
					<br />
					<br />
					<label class="align" for="txtProductDescription">Description: </label>
					<input type="text" name="txtProductDescription"  style="width: 95%;">
					<br />
					<br />
					<label class="align" for="txtProductPrice">Product Price: </label>
					<input type="text" name="txtProductPrice"  />
					<br />
					<br />
					<label class="align" for="txtProductShipping">Shipping Cost: </label>
					<input type="text" name="txtProductShipping"  />
					<br />
					<br />
					<label class="align" for="txtProductQuantity">Quantity: </label>
					<input type="text" name="txtProductQuantity"  />
					<br />
					<br />
					<label class="align" for="txtProductImage">Image Filename: </label>
					<input type="text" name="txtProductImage"  />
					<br />
					<br />

					<input type="submit" value="Submit" name='submit' />
					<input type="reset" value="Clear" />
			</form>
			<br />
			<br />
			<?php
						if (isset($_SESSION['errors'])){
					}
					else
					{
						echo '<a href="./logout.php">Logout.</a>';
					}
					?>
		</p>

	</body>
</html>