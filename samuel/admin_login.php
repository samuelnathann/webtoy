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
	
	$Username=$_POST['username'] ;
	$Password=$_POST['password'] ;
	
	$query="SELECT * FROM admin WHERE userID = '$Username' 
	AND password ='$Password'";
	$result = mysqli_query($connection, $query) or 
	die(mysqli_error());
	
	if ($row = mysqli_fetch_assoc($result)) {

	$_SESSION['user']=$Username;
	header ('location:manage.php');
	
	}
	else
	{
	
	$_SESSION['errors']= '<p><font color="red">User not recognised!</font></p>';
	header ('location:admin_sign.php');
	
	}
	?>
</section>	

</body>

</html>



