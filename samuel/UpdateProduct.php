<?php
//Connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'sammys_toys') or die(mysqli_error());
//colllecting submitted data and storing them in their respective variables
$ProductID=$_POST['hideProductID'];
$ProductName=$_POST['txtProductName'] ;
$ProductDescription=$_POST['txtProductDescription'];
$ProductPrice= $_POST['txtProductPrice'];
$ProductShipping= $_POST['txtProductShipping'];
$ProductQuantity= $_POST['txtProductQuantity'];
$ProductImage=$_POST['txtProductImage'] ;

//INSERT into the variables from the collected data
$query="UPDATE product SET Name='$ProductName', Description='$ProductDescription'
, Product_Price='$ProductPrice', Shipping_Cost='$ProductShipping'
, Quantity='$ProductQuantity', Product_Image='$ProductImage' WHERE ProductID='$ProductID' ";

//run the $query 
mysqli_query($connection, $query)or die (mysqli_error());

//link to the page
header( 'Location: manage.php' ) ;
?>