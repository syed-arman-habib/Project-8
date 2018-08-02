<?php
include("dbconnect.php");
session_start();
 if($_SESSION['user_id']!="" and $_SESSION['password']!=""){ 
 if($_SESSION[user_type]=='admin'){
  if($_GET['id']!="") 
   {
    $e= $_GET['id'];
    }
  $did= $_GET['did'];
  if($did) {
            mysql_query("delete from user where id='$did'");
            header("Location:add_faculty.php");
             }
?> 

<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title>Add Faculty</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="icon" href="bac-favicon.ico" type="image/x-icon">
</head>

<body>

<?php  error_reporting(E_ALL & ~E_NOTICE); ?>

	<div class="navbar">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="home.php"><img src="bac-logo.png" alt="BAC International">
					</a>
				</div>
				<div id="navbar3" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="home.php">Home</a></li>
						<li><a href="add_student.php">Add Student</a></li>
						<li><a href="add_admin.php">Add Admin</a></li>
						<li><a href="add_faculty.php">Add Faculty</a></li>
						<li><a href="add_notice.php">Add Notice</a></li>
						<li><a href="admin_message.php">Admin Message</a></li>
						<li><a href="contact_admin.php">Contact Admin</a></li>
						<li><a href="change_password.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>
  </div>
	
	<div id="container2" style="min-height: 594px;">
		<div class="center">
		
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="jumbotron" style="margin-top: 20px">
				
						<?php if($e){$_SESSION['edit']=$e;
											 $n=mysql_query("select * from user where id='$e'");
											 $edit=mysql_fetch_array($n);}
						?>
				
						<?php
						if ($_SESSION['msg'])
								{
								 echo $_SESSION['msg'];
								 $_SESSION['msg']="";
								 } 
						?>
								
						<h2 align="center">Add Faculty</h2>
						
						<table border="0" width= "400" height= "30" align= "center">
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
			
						<form class="form-horizontal" action="action.php" method="post" name="add_faculty" onsubmit="return(validateForm());">
							<div class="form-group">
								<label class="col-sm-2 control-label">Name</label>
								<div class="col-sm-8">
								<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php if($e){echo $edit['name'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">User ID</label>
								<div class="col-sm-8">
								<input type="text" name="user_id" class="form-control" placeholder="Enter User ID" value="<?php if($e){echo $edit['user_id'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-8">
								<input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php if($e){echo $edit['password'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-8">
								<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php if($e){echo $edit['confirm_password'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Gender</label>
								<div class="col-sm-8">
									<div class="radio-inline">
										<label>
											<input id="radiobutton1" type="radio" value="Male" name="gender" <?php if($e){echo $edit['name'];}else{echo "";}?>>Male
										</label>
									</div>
									<div class="radio-inline">
										<label>
											<input id="radiobutton2" type="radio" value="Female" name="gender" <?php if($e){echo $edit['name'];}else{echo "";}?>>Female
										</label>
									</div>
			
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Contact</label>
								<div class="col-sm-8">
								<input type="text" name="contact" class="form-control" placeholder="Enter Contact" value="<?php if($e){echo $edit['contact'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-8">
								<input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php if($e){echo $edit['email'];}else{echo "";}?>">
								</div>
							</div>
								
							<div class="form-group">
								<label for="Address" class="col-sm-2 control-label">Address</label>
								<div class="col-sm-8">
														<textarea name="address" cols="20" rows="5" class="form-control"><?php if($e){echo $edit['address'];}else{echo "";}?></textarea>
								</div>
							</div>
				 
							<div class="form-group">
								<label for="School" class="col-sm-2 control-label">School</label>
								<div class="col-sm-8">
												<select class="form-control" name="school" value="<?php if($e){echo $edit['school'];}else{echo "";}?>">
													<option value ="0">Select</option>
													<option value ="IT">IT</option>
													<option value ="Business">Business</option>
													<option value ="Law">Law</option>
												</select>
								</div>
							</div>
			
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-2">
									<button type="Submit" class="btn btn-primary form-control" value="<?php if($e){echo"Edit Faculty";}else{echo"Add Faculty";}?>" name="action">Submit
									</button>
								</div>
							</div>
						</form>
						
				</div>
			</div>
				
			<table border="3px" width= "50%" height= "50%" align="center">
				<tr> 
					<td colspan= "10" align= "center" style="background-color: lightblue"><strong> Faculty Table </strong></td> 
				</tr>
				<tr> 
					<td align="center"><strong> SL No </strong></td> <td align="center"><strong> Name </strong></td> <td align="center"><strong> User ID </strong></td> <td align="center"><strong> Gender </strong></td> <td align="center"><strong> Contact </strong></td> <td align="center"><strong> Email </strong></td> <td align="center"><strong> Address </strong></td> <td align="center"><strong> School </strong></td><td colspan="2"></td>
				</tr>
				
					<?php
					 $i=1;
					 $sql=mysql_query("select * from user where user_type='faculty'");
					 while($user=mysql_fetch_array($sql)){
					?>
					
			  <tr>
				  <td> <?php echo $i;?></td>
				  <td> <?php echo $user['name']; ?> </td>
				  <td> <?php echo $user['user_id']; ?> </td>
				  <td> <?php echo $user['gender']; ?> </td>
				  <td> <?php echo $user['contact']; ?> </td>
				  <td> <?php echo $user['email']; ?> </td>
				  <td> <?php echo $user['address']; ?> </td>
				  <td> <?php echo $user['school']; ?> </td>
				  <td> <a href= "add_faculty.php?id=<?php echo $user['id'];?>"> Edit </a> </td>
				  <td>
				  <?php
					  echo"<a href=\"javascript:delete_user(id=$user[id])\"> Delete </a>";
					 ?>
				  </td>  
			  </tr>
				 <?php $i++;} ?>
			</table>

						<script>
							function validateForm(){
								var name = document.add_faculty.name.value;
								var user_id = document.add_faculty.user_id.value;
								var password = document.add_faculty.password.value;
								var confirm_password = document.add_faculty.confirm_password.value;
								var gender = document.add_faculty.gender.value;
								var contact = document.add_faculty.contact.value;
								var email = document.add_faculty.email.value;
								var address = document.add_faculty.address.value;
								var school = document.add_faculty.school.value;
								
							if(name==""){alert("Please enter your name."); return false;}
							if(user_id==""){alert("Please enter your User ID."); return false;}
							if(password==""){alert("Please enter your password."); return false;}
							if(confirm_password==""){alert("Please confirm your password."); return false;}
							if(password!=confirm_password){alert("Password does not match."); return false;}
							if(gender==""){alert("Please indentify your gender."); return false;}
							if(contact==""){alert("Please enter your contact."); return false;}
							if(email==""){alert("Please enter your email."); return false;}
							if(address==""){alert("Please enter your address."); return false;}
							if(school==""){alert("Please select your school."); return false;}
										}
						</script>
						<script language="Javascript">
							 function delete_user(id){
													var msg= confirm('Are you sure you want to delete this faculty?');
												if (msg){
														 window.location="add_faculty.php?did="+id;  
														}   
											 }
						</script>
							
		</div>
	</div>
		
	<br><br>
		
	<div id="bac_IT">
		<table border="0" height="100px" width="1300px" align="center">
			<tr>
				<td><font color="white">
					<h2>Contact Us</h2>
					<p><font color="white">
						House # 28/B, Road # 5<br>
						Dhanmondi, Dhaka- 1205,
						Bangladesh<br>
						+880 (2) 9677054, 9677068, 
						9612453, 9612454<br>
						info@bacbd.org<br>
					</font></p>
				</font></td>
				<td colspan="2"><font color="white">
						<h2>Follow Us</h2>
						<a href="https://www.facebook.com/BACBangladesh" target="_blank"><img src="facebook.png" /></a>
						<a href="https://twitter.com/bacinternation2" target="_blank"><img src="twitter.png" /></a>
						<a href="https://www.linkedin.com/in/bac-international-study-centre" target="_blank"><img src="linkedin.png" /></a>
						<a href="http://bacbd.org/#" target="_blank"><img src="vimeo.png" /></a>
				</font></td>
				<td colspan="3"><font color="white">
									<h2>Find Us</h2>
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1826.073280442939!2d90.38053740857107!3d23.742152491699986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa5587a9ce3ee6a87!2sBAC+International+Study+Centre!5e0!3m2!1sen!2suk!4v1481113628273" width="600" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
				</font>
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center"><font color="white"><br><br><br>© Copyright 2016 BAC International. All rights reserved
				</font></td>
			</tr>
		</table>
	</div>
	
</body>

</html>

 <?php
     }
 else
  {
    $_SESSION[msg]= "You are not authorized to access this page";
     header("Location:logout.php");
    }
  }
 else
  {
    $_SESSION[msg]= "You have to login first";
    header("Location:index.php");
  }
?>