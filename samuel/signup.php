<?php
	//connection to database
	include('connection.php');
	
	if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	//username is validated here
    $errors = array();
    if(empty($_POST['name'])){
        $errors['name'] = 'Please type a username';//Username
    }else{
		
		  $name = mysqli_real_escape_string($connection,trim($_POST['name']));
		//validation to check if the username posted is in use.
        if($check = $connection->query("SELECT * FROM users WHERE name = '$name'")){
            if($check->num_rows){
                $errors['name'] = 'Username is already in use!';
            }
        }else{
            $errors['name'] = 'The query did not work';
        }
		
        
    }
	//address is validated here 
    if(empty($_POST['address'])){
        $errors['address'] = 'Please type in your mailing address.';
    }else{
        $address = mysqli_real_escape_string($connection,trim($_POST['address']));
    }
	//contact number is validated here 
    if(empty($_POST['phone'])){
        $errors['phone'] = 'Please type in your contact number.';
    }else{
        $phone = mysqli_real_escape_string($connection,trim($_POST['phone']));
    }
	
	//gender is validated here 
    if(empty($_POST['sex'])){
        $errors['sex'] = 'Please select your gender';
    }else{
		
		if( $_POST['sex'] == 'default')
		{
			$errors['sex'] = 'Please select your gender.';
		}
		else{	
        $sex = mysqli_real_escape_string($connection,trim($_POST['sex']));
		}
    }
	//email address is validated here
    if(empty($_POST['email'])){
        $errors['email'] = 'Please type in your email address.';
    }else{
        $email = mysqli_real_escape_string($connection,trim($_POST['email']));

        if($check = $connection->query("SELECT * FROM users WHERE email = '$email'")){
            if($check->num_rows){
                $errors['email'] = 'This email address in already in use!';
            }
        }else{
            $errors['email'] = 'The query did not work';
        }
    }

	//password is validated here
    if(empty($_POST['pass1'])){
        $errors['pass1'] = 'Please type in your password.';
    }else{
        $pass1 = $_POST['pass1'];
    }
	//password is verified here
    if(empty($_POST['pass2'])){
        $errors['pass2'] = 'Please verify your password!';
    }else{
        $pass2 = $_POST['pass2'];

        if($pass1!=$pass2){
            $errors ['pass2'] = 'Passwords do not match!';
        }else{
            $password = mysqli_real_escape_string($connection,trim($_POST['pass1']));
           // $password = sha1($password);
        }
    }
	
    if(empty($errors)){
        $query  = "INSERT INTO users ";
        $query .= "(name,address,phone,sex,email,password,usertype) ";
        $query .= "VALUES ('$name','$address','$phone','$sex','$email','$password','1')";

        $register = $connection->query($query);


$user_id = $connection->query("SELECT user_ID FROM users WHERE email = '$email' and name = '$name'")->fetch_object()->user_ID;


		$query1  = "INSERT INTO cart ";
        $query1 .= "(user_ID) ";
        $query1 .= "VALUES ('$user_id')";

        $addCart = $connection->query($query1);


        if(!$register && !addCart){
        
			echo $query;    
		}
		else
		{
			$message = 'Registration successfully completed. You can now login.';
		}
    }
}
?>

<!DOCTYPE html PUBLIC>
<html>
<head>
<!-- Start of Head Section-->
<title>SAMMY'S TOYS</title>
<link href="toy.css" rel="stylesheet" type="text/CSS" />
<script language="javascript" type="text/javascript">

function clearText(field){

    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
</script>

<!--End of Head Section-->
</head>
<body>
<!-- Start of Body Section-->
<div id="header">
<h1><i>Sammy's Toys</i></h1>
<img id="banner" src="images/cover.jpg" height="600" width="2700" alt="Banner Image"/>
</div>
<hr>

	<!--Start of Menu-->
<div id="nav">
<br/>
<table align="center" class="menu"> 
<tr><td>
<a href="home.php">HOME</a>
</td><td>
&nbsp;
</td><td>
&nbsp;
</td><td>
<a href="buy.php">PRODUCTS</a>
</td><td>
&nbsp;
</td><td>
&nbsp;
</td><td>
<a href="about.php">ABOUT US</a>
</td></tr>
<tr><td colspan="7" style="text-align:center">
<strong><i><a href="admin_sign.php">ADMIN</a></i></strong>
</td></tr></table>
</div>
	<!--End of Menu-->

<hr>
<div id="section" style="background-image: url(images/bg.jpg);">
			<br>
<table bgcolor="black" align="center" cellpadding="20px" width="55%" style="color:gold; text-align:center;">
<tr><td>
				<h1>Register Now</h1>
					
					
					   <?php 
					    if ($_SERVER['REQUEST_METHOD']=='POST'){ if(empty($errors)){ echo '<span style="color:green;"><h2>'.$message.'</h2>'; 
							} else 
					    { echo '<h2><font color="red">Access Denied!</font></h2><span style="
						display: block;
						padding: 10px;
						background-color: #FFE5E5;
						margin-bottom:5px;
						color: #FF5757;">'. implode("</span><span style='
						display: block;
						padding: 10px;
						background-color: #FFE5E5;
						margin-bottom:5px;
						color: #FF5757;'>",$errors). '</span>';} } 
						?>
					 	
					   
					<form action="signup.php" method="post" name="Register" class="form_input">
				    <input id="name" type="text" name="name" placeholder="Username">
					<br />
					<input id="pass1" type="password" name="pass1" placeholder="Password">
					<br />
					<input id="pass2" type="password" name="pass2" placeholder="Confirm Password">
					<br />	
					<input id="address" type="text" name="address" placeholder="Valid Address" style="width: 55%;">
					<br>
					<input id="phone" type="text" name="phone" placeholder="Phone Number">        
					<br />
					<select name="sex" style="visibility: visible;">
					<option value="default">Choose your gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select><br />
					<input id="email" type="email" name="email" placeholder="example@email.com" style="width: 35%;">
					<br />
					
					<input type="submit" name="submit" value="Submit"> 
					</form> 
                    
					<p><span style="background-color:yellow"><a href="signin.php"><strong>&nbsp;Click here to login&nbsp;</strong></a></span></p>
</td></tr>
</table>
<table bgcolor="black" align="center" cellpadding="10px" style="color:gold; text-align:center;">
	<tr><td>
<br/>
<hr width="75%">
		<h2>Quick Info</h2>
		<p>
			Location: No 43, 3rd Floor, New Wing, APS City Mall, Puchong 47100, Selangor Darul Ehsan, Malaysia.
		<br/>
			Contact No.: 03-80625244 / +60127168899
		<br/>
			Email : sombu_sam94@yahoo.co.uk
		</p></td></tr>
</table>
<br>
<div id="footer">
<b>Copyright &copy SamuelRajArumainathan</b><br>


<a href="mailto:sombu_sam94@yahoo.co.uk">Email Me For Any Inquiries!</a><br>

</div>

<p align="center"><a href="#header"><img src="images/yyy.jpg" alt="Logo" height="70" width="70" border="2"></a><br>
<span style="background-color: #000000">
Back to top!</span></p>

</div>
<!--End of Body Section-->
</html>