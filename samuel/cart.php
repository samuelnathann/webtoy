<?php
session_start();

$page = 'product.php';

$connection=mysqli_connect('localhost', 'root', '', 'sammys_toys') or die('Failed to connect');


if (isset($_GET['add'])) {
	$quantity = mysqli_query($connection, 'SELECT ProductID, Quantity FROM product WHERE ProductID=' . mysql_real_escape_string((int)$_GET['add']));
	while ($quantity_row = mysqli_fetch_assoc($quantity)) {
		if ($quantity_row['Quantity'] != $_SESSION['cart_' . (int)$_GET['add']]) {
			$_SESSION['cart_' . (int)$_GET['add']] += 1;

		}

	}
	header('Location:' . $page);
}

if (isset($_GET['remove'])) {
	$_SESSION['cart_' . (int)$_GET['remove']]--;
	header('Location:' . $page);
}

if (isset($_GET['delete'])) {
	$_SESSION['cart_' . (int)$_GET['delete']] = '0';
	header('Location:' . $page);
}

function products() {
	$get = mysqli_query($GLOBALS['connection'], 'SELECT ProductID, Name, Description, Product_Price, Shipping_Cost, Product_Image FROM product WHERE Quantity >0 ORDER BY ProductID DESC');
	if (mysqli_num_rows($get) == 0) {
		echo 'Your cart is empty';
	} else {
		while ($get_row = mysqli_fetch_assoc($get)) {
		
			echo '<h2>' . $get_row['Name'] . '</h2>';
			echo '<table align="center" width="474" border="2">';
			echo '<tr>';	
			echo '<td><p><font size="2"><strong> Name</font></strong></p></td>';
			echo '<td><p>'. $get_row['Name'] . '</p></td>';
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
			echo '<td><img src="./images/'. $get_row['Product_Image'].'" width="300" height="300"/></td>';
			echo '<tr>';
			echo '<td colspan="2"><a href="cart.php?add=' . $get_row['ProductID'] . '">
			<img src="images/add.gif" width="100" height="26" border="0"></a>';
			echo '</table><br/>';
		}
	}
}

function paypal_items(){
	$num='0';
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, (strlen($name) - 5));
				$get = mysqli_query($GLOBALS['connection'], 'SELECT ProductID, Name, Product_Price, Shipping_Cost FROM product WHERE ProductID=' . mysql_real_escape_string((int)$id));
				while ($get_row = mysqli_fetch_assoc($get)) {
					$num++;
					echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
				    echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['Name'].'">';
					echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['Product_Price'].'">';
					echo '<input type="hidden" name="shipping_'.$num.'" value="'.$get_row['Shipping_Cost'].'">';
					echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
				}
			}

		}

	}
	
	
}

function cart() {
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, (strlen($name) - 5));
				$get = mysqli_query($GLOBALS['connection'], 'SELECT ProductID, Name, Product_Price FROM product WHERE ProductID=' . mysql_real_escape_string((int)$id));
				while ($get_row = mysqli_fetch_assoc($get)) {
					$sub = $get_row['Product_Price'] * $value;
					echo '<p>';
					echo $get_row['Name'] . ' x ' . $value . ' @ RM ' . number_format($get_row['Product_Price'], 2) . ' = RM ' . number_format($sub, 2) . '<a href="cart.php?remove=' . $id . '">[-]</a><a href="cart.php?add=' . $id . '">[+]</a><a href="cart.php?delete=' . $id . '">[Delete]</a><br />';
					echo '</p>';
				}
			}
			$total = @$total + @$sub;

		}

	}
	if (!isset($total)) {
		echo '<p>Your cart is empty!</p>';
	} else {
		echo '<p>The total is RM ' . number_format($total, 2).'</p>';

?>
<p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="business" value="sombu_sam94@yahoo.co.uk">
		<?php paypal_items(); ?>
		<input type="hidden" name="currency_code" value="MYR">
		<input type="hidden" name="amount" value="<?php echo $value; ?>">
		<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>
</p>
<?php
}
}
?>