<?php
//Connection to the database
include 'connection.php';
//colllecting submitted data and storing them in their respective variables 
$ProductID=$_POST['txtProductID'];
$ProductName=$_POST['txtProductName'];
$ProductDescription=$_POST['txtProductDescription'];
$ProductPrice= $_POST['txtProductPrice'];
$ProductShipping= $_POST['txtProductShipping'];
$ProductQuantity= $_POST['txtProductQuantity'];
$ProductImage=$_POST['txtProductImage'] ;
//INSERT into the variables from the collected data
$query = "INSERT INTO product (ProductID, Name, Description, Product_Price, Shipping_Cost, Quantity, Product_Image)
		VALUES ('$ProductID', '$ProductName', '$ProductDescription', '$ProductPrice', '$ProductShipping', '$ProductQuantity', '$ProductImage')";

//Temporarily echo $query for debugging purposes
//echo $query;

//run $query
mysqli_query($connection, $query) or die(mysqli_error());
if (mysqli_affected_rows($connection) > 0) {

	//If affected ,the calling page is returned( that stored in the server variables as HTTP_REFERER

	header("Location: {$_SERVER['HTTP_REFERER']}");

} else {

	// Displaying error message

	echo "Error in query: $query. " . mysqli_error($connection);

	exit ;

}
?>