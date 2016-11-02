<?php
//Make connection to database
include 'connection.php';
// Store ID to be deleted
$id = $_GET['id'];
// Query is created to delete record
$query = "DELETE FROM product WHERE ProductID = '$id' ";
mysqli_query($connection, $query) or exit("Error in query: $query. " . mysqli_error($connection));

// Check if any rows were affected
if (mysqli_affected_rows($connection) > 0) {
	//If affected , calling page is returned(stored in the server variables as HTTP_REFERER
	header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
	// Print error message
	echo "Error in query: $query. " . mysqli_error($connection);
	exit ;
}
?>
