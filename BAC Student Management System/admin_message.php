<?php
include("dbconnect.php");
session_start();
 if($_SESSION['user_id']!="" and $_SESSION['password']!=""){ 
 if($_SESSION[user_type]=='admin'){
  if($_GET['nid']!="") 
   {
    $e= $_GET['nid'];
    }
  $did= $_GET['did'];
  if($did) {
            mysql_query("delete from message where mid='$did'");
            header("Location:admin_message.php");
             }
?> 

<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title>Admin Message</title>
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
	
	<div id="container2" style="min-height: 300px;">
		<div class="center">
		
			<table border="2" width= "900" height= "30" align="center">
				<tr> 
					<td colspan= "8" align= "center" style="background-color: lightblue"><strong> Admin Message Table </strong></td> 
				</tr>
        <tr> 
					<td align="center"><strong> SL No </strong></td> <td align="center"><strong> Name </strong></td>  <td align="center"><strong> Contact </strong></td> <td align="center"><strong> Email </strong></td> <td align="center"><strong> Description </strong></td><td></td>
				</tr>
				<?php
				 $i=1;
				 $sql=mysql_query("select * from message");
				 while($message=mysql_fetch_array($sql)){
				 ?>
				<tr>
				 <td> <?php echo $i;?></td>
				 <td> <?php echo $message['name']; ?> </td>
				 <td> <?php echo $message['contact']; ?> </td>
				 <td> <?php echo $message['email']; ?> </td>
				 <td> <?php echo $message['description']; ?> </td>
				 <td>
				<?php
				 echo"<a href=\"javascript:delete_message(id=$message[mid])\"> Delete </a>";
				 ?>
				 </td>  
			  </tr>
				<?php $i++;} ?>
      </table>

						<script>
							function validateForm(){
								var name = document.admin_message.name.value;
								var contact = document.admin_message.contact.value;
								var email = document.admin_message.email.value;
								var description = document.admin_message.description.value;
							
							if(name==""){alert("Please enter your name."); return false;}
							if(contact==""){alert("Please enter your contact."); return false;}
							if(email==""){alert("Please enter your email."); return false;}
							if(description==""){alert("Please enter the description."); return false;}
												}
						</script>
						<script language="Javascript">
							 function delete_message(id){
													var msg= confirm('Are you sure you want to delete this message?');
												if (msg){
														 window.location="admin_message.php?did="+id;  
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