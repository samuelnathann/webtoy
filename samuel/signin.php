<!DOCTYPE html>
<html>
<head>
<!-- Start of Head Section-->
	<title>SAMMY'S TOYS</title>
	
<link href="toy.css" rel="stylesheet" type="text/css" />	
<script type="text/javascript">
function clearText(field){

    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
</script>
	
<!--End of Head Section-->
</head>

<body>
	<!--Start of Body Section-->
	<?php
	//connection to database
	include('connection.php');
	//start a session
	session_start();
	?>
	
<div id="header">
<h1><i>Sammy's Toys</i></h1>
<img id="banner" src="images/cover.jpg" height="600" width="2700" alt="Banner Image"/>
</div>
<hr>


	<!--Start of Menu-->
<div id="nav">
<?php
					if(!isset($_SESSION['name']))
					{
					?>
					
            	<?php
						if (isset($_SESSION['errors'])){
					}
					}
					else
					{
						echo '<font color="green"><strong>You are now logged in as ' . $_SESSION['name'] . '.</strong></font><br />';
						//destroying the session using logout.php
						echo '<a href="./logout.php">Logout.</a>';
					}
					?>
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
<table bgcolor="black" align="center" cellpadding="10px">
	<tr><td>            	<h1><font color="yellow">Sign in to continue shopping!</font></h1>
					<p>You may only continue with your shopping, if you are a member of Sammy's Toys.</p>
					<h2>Sign In</h2>
					<?php
					if(!isset($_SESSION['name']))
					{
					?>
				  <form method="post" action="./login.php">	
					<table align="center" width="200" border="0">
					  <tr>
						<td><label for="username">Username: </label></td>
						<td><input type="text" name="name" value=''/></td>
					  </tr>
					  <tr>
						<td><label for="password">Password: </label></td>
						<td><input type="password" name="password" /></td>
					  </tr>
					  <tr>
					    <td>&nbsp;</td>
					    <td><button type="submit">LOGIN</button></td>
				      </tr>
					</table>
				  </form>
				
					<?php
						if (isset($_SESSION['errors'])){
					}
					}
					else
					{
						echo '<span style="background-color:yellow"><a href="./product.php"><strong>&nbsp;To continue shopping click here!&nbsp;</strong></a></span>';
					}
					?>
                    
				
				
                      <p>If you are not a member yet, <span style="background-color:yellow"><a href="signup.php"><strong>&nbsp;CLICK HERE&nbsp;</strong></a></span> to register.</p>

	<br/>
<hr width="75%">		
	<h2>Quick Info</h2>
		
			Location: No 43, 3rd Floor, New Wing, APS City Mall, Puchong 47100, Selangor Darul Ehsan, Malaysia.
		<br/>
			Contact No.: 03-80625244 / +60127168899
		<br/>
			Email : sombu_sam94@yahoo.co.uk
		</p><td></tr>
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
</body>
</html>                      