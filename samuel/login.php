<!DOCTYPE html>
<html>
<head>
	<title>SAMMY'S TOYS</title>
</head>
<body>
	<?php
	//make connection to database
	include('connection.php');
	//start a session
	session_start();
	?>

	<?php
	
	$txtUsername=$_POST['name'] ;
	$txtPassword=$_POST['password'] ;
	
	$query="SELECT * FROM users WHERE name = '$txtUsername' 
	AND password ='$txtPassword'";
	$result = mysqli_query($connection, $query) or 
	die(mysqli_error());
	
	if ($row = mysqli_fetch_assoc($result)) {

	$_SESSION['name']=$txtUsername;
	header ('location:product.php');
	
	}
	else
	{
	
	$_SESSION['errors']= '<P><font color="red">User not recognised!</font></P>';
	header ('location:errorpage.php');
	
	}
	?>


</body>

</html>



