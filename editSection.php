<!DOCTYPE html>
<html>
<head>
	<title>Edit Information</title>
	<style type="text/css">
		*{
			font-family: century gothic;
		}
		table 
		{	
			text-align: center;
		}
		.left
		{
			width: 25%
		}
		.right
		{
			width: 50%
		}

	</style>
</head>
<body>
	<?php
			$db = "localhost";
			$user = "root";
			$pw = "";
			

			mysql_connect($db, $user, $pw);
			mysql_select_db(db_cont);	
			

			$cont_Id = $_GET['cont_Id'];

			$passCheck = mysql_query("SELECT password FROM tbl_cont WHERE contact_id = '$cont_Id'");
			$resultPass = mysql_fetch_object($passCheck);
			$current_pass = $resultPass -> password;

			if($_POST['submitb']){
			$fname = $_POST['fname'];	
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$add = $_POST['add'];
			$contact = $_POST['contact'];
			$pass = $_POST['pass'];
				if ($current_pass == $_POST['current_pass']) {
					if($_POST['pass']==$_POST['cpass']){
						
						$pass = $_POST['pass'];
						
						$editsql = mysql_query ("UPDATE tbl_cont SET firstName = '$fname', lastName = '$lname', address = '$add', emailAddress = '$email', contactNumber = '$contact', password = '$pass' WHERE contact_id = '$cont_Id'");
						echo "<script>
					           if (confirm('Change Info?')){
									window.location.href = 'carido_personalInfo.php';
								}
				    		 </script>";

					}else{
						echo "<script type='text/javascript'>alert('password did not match')</script>";
					}
				}else{
					echo "<script type='text/javascript'>alert('current password did not match')</script>";
				}
				
			}

			$SelectSql = mysql_query("SELECT * FROM tbl_cont where contact_id = '$cont_Id'");

			while($result = mysql_fetch_object($SelectSql)){

				$fname = $result -> firstName;
				$lname = $result -> lastName;
				$add = $result -> address;
				$email = $result -> emailAddress;
				$contact = $result -> contactNumber;
			}

		?>
	
	<form name="form1" method="POST">
		
		<table>
			<tr>
				<td class="left">First Name:</td>
				<td class="right"><input type="text" name="fname" placeholder="<?php echo $fname?>" ></td>
			</tr>
			<tr>
				<td class="left">Last Name:</td>
				<td class="right"><input type="text" name="lname" placeholder="<?php echo $lname?>"></td>
			</tr>
			<tr>
				<td class="left">Email:</td>
				<td class="right"><input type="text" name="email" placeholder="<?php echo $email?>"></td>
			</tr>
			<tr>
				<td class="left">Address:</td>
				<td class="right"><input type="text" name="add" placeholder="<?php echo $add?>"></td>
				
			</tr>
			<tr>
				<td class="left">Contact Number:</td>
				<td class="right"><input type="text" name="contact" placeholder="<?php echo $contact?>"></td>
				
			</tr>
			<tr>
				<td class="left">Current Password:</td>
				<td class="right"><input type="password" name="current_pass"></td>
			</tr>
			<tr>
				<td class="left">New Password:</td>
				<td class="right"><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td class="left">Confirm Password:</td>
				<td class="right"><input type="password" name="cpass"></td>
			</tr>
		</table>
		<br>
		<input type="submit" name="submitb" value="submit">
	</form>
</body>
	
</html>