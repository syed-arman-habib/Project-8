<?php
	session_start();
	include('dbconnect.php');
	extract($_POST);
	$action=$_POST['action'];
	Switch($action)
	{
		case "Add Student":
				mysql_query("insert into user(id,name,user_id,password,user_type,email,gender,contact,address,school,program)values(null,'$_POST[name]','$_POST[user_id]','$_POST[password]','student','$_POST[email]','$_POST[gender]','$_POST[contact]','$_POST[address]','$_POST[school]','$_POST[program]')");
				$_SESSION['msg']='<h3 class="text-center success_message" >Student has been added successfully</h3>';
				header("Location:add_student.php");
						break;
						
		case "Edit Student":
					mysql_query("update user set name='$_POST[name]',user_id='$_POST[user_id]',contact='$_POST[contact]',email='$_POST[email]',gender='$_POST[gender]',address='$_POST[address]',school='$_POST[school]',program='$_POST[program]' where id='$_SESSION[edit]'");
					$_SESSION['msg']='<h3 class="text-center success_message" >Student has been edited successfully</h3>';
					header("Location:add_student.php");
						break;
	
		
		case "Add Admin":
					mysql_query("insert into user(id,name,user_id,password,user_type,email,gender,contact,address)values(null,'$_POST[name]','$_POST[user_id]','$_POST[password]','admin','$_POST[email]','$_POST[gender]','$_POST[contact]','$_POST[address]')");
					$_SESSION['msg']='<h3 class="text-center success_message" >Admin has been added successfully</h3>';
					header("Location:add_admin.php"); 
						break;
																					 
		case "Edit Admin":
					mysql_query("update user set name='$_POST[name]',user_id='$_POST[user_id]',contact='$_POST[contact]',email='$_POST[email]',gender='$_POST[gender]',address='$_POST[address]' where id='$_SESSION[edit]'");
					$_SESSION['msg']='<h3 class="text-center success_message" >Admin has been edited successfully</h3>';
					header("Location:add_admin.php");
						break;

		
		case "Add Faculty":
          mysql_query("insert into user(id,name,user_id,password,user_type,email,gender,contact,address,school)values(null,'$_POST[name]','$_POST[user_id]','$_POST[password]','faculty','$_POST[email]','$_POST[gender]','$_POST[contact]','$_POST[address]','$_POST[school]')");
					$_SESSION['msg']='<h3 class="text-center success_message" >Faculty has been added successfully</h3>';
          header("Location:add_faculty.php");
						break;

		case "Edit Faculty":
					mysql_query("update user set name='$_POST[name]',user_id='$_POST[user_id]',contact='$_POST[contact]',email='$_POST[email]',gender='$_POST[gender]',address='$_POST[address]',school='$_POST[school]' where id='$_SESSION[edit]'");
					$_SESSION['msg']='<h3 class="text-center success_message" >Faculty has been edited successfully</h3>';
					header("Location:add_faculty.php");
						break;

						
		case "Add Notice":
					$d=date('d/m/Y');
					mysql_query ("insert into notice (nid,title,date,description)values(null,'$_POST[title]','$d', '$_POST[description]')");		
					$_SESSION['msg']='<h3 class="text-center success_message" >Notice has been added successfully</h3>';
					header("Location:add_notice.php");
						break;

		case "Edit Notice":
					mysql_query("update notice set title='$_POST[title]',description='$_POST[description]'where nid='$_SESSION[edit]'");
					$_SESSION['msg']='<h3 class="text-center success_message" >Notice has been edited successfully</h3>';
					header ("Location:add_notice.php");
						break;
						
						
		case "Send Message":
					mysql_query("insert into message(mid,name,contact,email,description)values(null,'$_POST[name]','$_POST[contact]','$_POST[email]','$_POST[description]')");
					$_SESSION['msg']='<h3 class="text-center success_message" >Thank you for the message. You will be contacted by the admin shortly.</h3>';
					header("Location:contact_admin.php");
						break;


		case "Login":
				$u=$_POST['user_id'];
				$p=$_POST['password'];
				$sql=mysql_query("select * from user where user_id='$u' and password='$p'");
				$c=mysql_num_rows($sql);
				if($c==1){
						$user=mysql_fetch_array($sql);
						$_SESSION['id']=$user['id'];
						$_SESSION['name']=$user['name'];
						$_SESSION['user_id']=$user['user_id'];
						$_SESSION['password']=$user['password'];
						$_SESSION['user_type']=$user['user_type'];
						header("Location:home.php");
						}
				else
						{
						$_SESSION['msg']="You are not registered";
						header("Location:index.php");
						}	
						break;

 		
		case "Change Password":

				if($_POST['current_p']=="" or $_POST['new_p']=="" or $_POST['confirm_p']==""){

				$_SESSION['msg']="Please fill all the field"; header("Location:change_password.php");}
				
				
			else{
				if($_POST['current_p']!= $_SESSION['password']){
				$_SESSION['msg']="Current password is not matching"; header("Location:change_password.php");}
				
				
			else{
				if($_POST['new_p']!=$_POST['confirm_p']){

				$_SESSION['msg']="New and confirm passwords are not matching"; header("Location:change_password.php");}
				

			else{
				mysql_query("update user set password='$_POST[new_p]' where id='$_SESSION[id]'");


				header("Location:logout.php");}
				}

					}	

			$_SESSION['msg']="Password has been changed successfully";			

					break;

	}
?>