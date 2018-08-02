<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css" type="text/css">
	<link rel="icon" href="bac-favicon.ico" type="image/x-icon">
</head>

<body>

	<?php  error_reporting(E_ALL & ~E_NOTICE); ?>
	
	<img src="images/bac-login.jpg" alt="BAC International" width="100%" height="50%" align="center" />
	
	<div class="container" style="min-height: 300px;">
		<div class="col-lg-4"></div>
		
		<div class="col-lg-4">
			<div class="jumbotron" style="margin-top: 20px">
			
				<h3 align="center">Login</h3>
				
				<table  border="0" width="300" height="10" align="center">
					<tr>
						<td colspan="2"> <?php
							error_reporting(E_ALL^E_NOTICE);
							session_start();
							if($_SESSION['msg']){
							echo $_SESSION['msg'];
							$_SESSION['msg']="";} 
							?> 
						</td>
					</tr>
				</table>
				
				<form action="action.php" method="post" name="index" onsubmit="return(validateForm());">
					<div class="form-group">
						<input type="text" name="user_id" class="form-control" placeholder="Enter User ID">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Enter Password">
					</div>
					<input type="Submit" class="btn btn-primary form-control" value="Login" name="action">
				</form>
				
			</div>
		</div>
		
		<script>
		function validateForm(){
		var user_id  = document.index.user_id.value;
		var password = document.index.password.value;

		if(user_id==""){alert("Please enter your user_id.");return false;}
		if(password==""){alert("Please enter your password.");return false;}}
		</script>
	</div>
	
	<div id="bac_IT">
		<table border="0" height="100px" width="1300px" align="center">
			<tr>
				<td colspan="5" align="center"><font color="black">
			<br>
			<br>
			<br>© Copyright 2016 BAC International. All rights reserved
				</font></td>
			</tr>
		</table>
	</div>
	
</body>

</html>