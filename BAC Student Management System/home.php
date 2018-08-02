<?php
include("dbconnect.php");
session_start();
if($_SESSION['user_id']!="" and $_SESSION['password']!=""){
  if($_GET['id']!="") 
   {
    $e= $_GET['id'];
    }
  $did= $_GET['did'];
  if($did) {
            mysql_query("delete from notice where nid='$did'");
            header("Location:add_notice.php");
             }
            
?>

<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
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

	<div id="container2">
		<div class="center">
		
			<table style="background-color: #eee;" align="center" border="0"  width="1000px" height="300px">
				<tr>
					<td width="1000px">
						<div class="slideshow">
						
							<div class="slideshow-container">

								<div class="mySlides fade">
									<div class="numbertext">1 / 10</div>
									<img src="images/1.jpg" style="width:100%" height="250px">
								</div>

								<div class="mySlides fade">
									<div class="numbertext">2 / 10</div>
									<img src="images/2.jpg" style="width:100%" height="250px">
								</div>

								<div class="mySlides fade">
									<div class="numbertext">3 / 10</div>
									<img src="images/3.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">4 / 10</div>
									<img src="images/4.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">5 / 10</div>
									<img src="images/5.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">6 / 10</div>
									<img src="images/6.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">7 / 10</div>
									<img src="images/7.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">8 / 10</div>
									<img src="images/8.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">9 / 10</div>
									<img src="images/9.jpg" style="width:100%" height="250px">
								</div>
								
								<div class="mySlides fade">
									<div class="numbertext">10 / 10</div>
									<img src="images/10.jpg" style="width:100%" height="250px">
								</div>
								
							</div>
						
							<br>

							<div style="text-align:center">
								<span class="dot"></span> 
								<span class="dot"></span> 
								<span class="dot"></span> 
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
							</div>

							<script>
								var slideIndex = 0;
								showSlides();

								function showSlides() {
									var i;
									var slides = document.getElementsByClassName("mySlides");
									var dots = document.getElementsByClassName("dot");
									for (i = 0; i < slides.length; i++) {
										 slides[i].style.display = "none";  
									}
									slideIndex++;
									if (slideIndex> slides.length) {slideIndex = 1}    
									for (i = 0; i < dots.length; i++) {
										dots[i].className = dots[i].className.replace(" active", "");
									}
									slides[slideIndex-1].style.display = "block";  
									dots[slideIndex-1].className += " active";
									setTimeout(showSlides, 3000); // Change image every 3 seconds
								}
							</script>
							
						</div>		
					</td>
				</tr>
			</table>					
			
			<hr>
			
			<table  border="3px" width= "50%" height= "50%" align="center">
					<tr> 
						<td colspan= "3" align= "center" style="background-color: lightblue"><strong>Notice</strong></td>
					</tr>
					<tr> 
						<td align="center" style="background-color: white"><strong> Title </strong></td> 
						<td align="center" style="background-color: white"><strong> Date </strong></td> 
						<td align="center" style="background-color: white"><strong> Description </strong></td>
					</tr>
					
						<?php
						 $i=1;
						 $sql=mysql_query("select * from notice order by nid desc limit 5");
						 while($notice=mysql_fetch_array($sql)){
						 ?>
						 
					<tr>
						<td style="background-color: white"> <?php echo $notice['title']; ?> </td>
						<td style="background-color: white"> <?php echo $notice['date']; ?> </td>
						<td style="background-color: white"> <?php echo $notice['description']; ?> </td>
					</tr>
					
						<?php $i++;} ?>
			</table>
			
		</div>
	</div>
	
	<hr>
		
	<div id="container3">
		<table border="1" height="300px" width="1300px" align="center">
			<tr>
				<td>
					<h2 align="center">School of IT</h2>
					<img class="img-responsive center-block" src="images/it.jpg" alt="School of IT" /><br>
					<p align="center">Now a days, A computer system is a means to solve some of today’s existing problems. The problems in the developing world are more pressing than the problems of the developed</p>
				</td>
				<td>
					<h2 align="center">School of Business</h2>
					<img class="img-responsive center-block" src="images/business.jpg" alt="School of Business" /><br>
					<p align="center">BAC International is offering BA (Hons) in Law programme of University of Derby, UK. University of Derby is one of the leading Universities in the UK and its popularity is increasing year by year</p>
				</td>
				<td>
					<h2 align="center">School of Law</h2>
					<img class="img-responsive center-block" src="images/law.jpg" alt="School of Law" /><br>
					<p align="center">The BTEC Higher National Diplomas (HNDs) or BTEC Higher National Certificates (HNCs) are well established, work-related UK qualifications that can help students to their way..</p>
				</td>
			</tr>
		</table>
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
				</font></td>
			</tr>
			<tr>
				<td colspan="5" align="center"><font color="white">
			<br>
			<br>
			<br>© Copyright 2016 BAC International. All rights reserved
				</font></td>
			</tr>
		</table>
	</div>
	
</body>

</html>

<?php
}
else
{$_SESSION['msg']="You have to login first";
   header("Location:index.php");
}
?>