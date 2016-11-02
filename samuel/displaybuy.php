<?php
session_start();

$page = 'buy.php';

$connection=mysqli_connect('localhost', 'root', '', 'sammys_toys') or die('Failed to connect');


function buy() {
	$get = mysqli_query($GLOBALS['connection'], 'SELECT ProductID, Name, Description, Product_Price, Shipping_Cost, Product_Image FROM product WHERE Quantity >0 ORDER BY ProductID DESC');
	if (mysqli_num_rows($get) == 0) {
		echo 'Your cart is empty';
	} else {
		while ($get_row = mysqli_fetch_assoc($get)) {
			
			echo '<h2>' . $get_row['Name'] . '</h2>';
			echo '<table align="center" width="474" border="2">';
			echo '<tr>';	
			echo '<td><p><font size="2"><strong>Description</font></strong></p></td>';
			echo '<td><p>' . $get_row['Description'] . '</p></td>';
			echo '<tr>';	
			echo '<td><p><font size="2"><strong>Product Price</font></strong></p></td>';
			echo '<td><p>RM ' . $get_row['Product_Price'] . '</p></td>';
			echo '<tr>';	
			echo '<td><p><font size="2"><strong>Shipping Cost</font></strong></p></td>';
			echo '<td><p>RM ' . $get_row['Shipping_Cost'] . '</p></td>';
			echo '<tr>';	
			echo '<td><p><font size="2"><strong>Product Image</font></strong></p></td>';
			echo '<td><img src="./images/'. $get_row['Product_Image'].'"  width="300" height="300"/></td>';
			echo '<tr>';
			echo '<td colspan="2"><a href="signin.php"><img src="images/buy.gif" width="107" height="26" border="0">';
			echo '</table><br/>';
		}
		
	}

}

