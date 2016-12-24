<!DOCTYPE html>
<html>
<head>
	<title>Information Table</title>

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
		
		if($_POST['submitb']){
			$fname = $_POST['fname'];	
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$add = $_POST['add'];
			$contact = $_POST['contact'];
			if($_POST['pass']==$_POST['cpass']){
				
				$pass = $_POST['pass'];
				
				$sql1 = mysql_query ("INSERT INTO tbl_cont(firstName, lastName, address, emailAddress, contactNumber, password)
				VALUES ('$fname', '$lname', '$add', '$email', '$contact', '$pass')");
			}else{
				echo "<script type='text/javascript'>alert('password did not match')</script>";
			}
			

		}
	?>
	<?php
		if(isset($_GET['delete'])){
			 $delete = mysql_query("DELETE FROM tbl_cont WHERE contact_id = ".$_GET['delete']);
			 header("Location: carido_personalInfo.php");
		}

	?>
	<script type="text/javascript">
		function delete_info(contId){
			if (confirm('Delete Info?')){
				window.location.href = 'carido_personalInfo.php?delete='+contId;
			}
		}
		
	</script>

	<form name="form1" method="POST">
		
		<table>
			<tr>
				<td class="left">First Name:</td>
				<td class="right"><input type="text" name="fname"></td>
			</tr>
			<tr>
				<td class="left">Last Name:</td>
				<td class="right"><input type="text" name="lname"></td>
			</tr>
			<tr>
				<td class="left">Email:</td>
				<td class="right"><input type="email" name="email"></td>
			</tr>
			<tr>
				<td class="left">Address:</td>
				<td class="right"><input type="text" name="add"></td>
			</tr>
			<tr>
				<td class="left">Contact Number:</td>
				<td class="right"><input type="text" name="contact"></td>
			</tr>
			<tr>
				<td class="left">Password:</td>
				<td class="right"><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td class="left">Confirm Password:</td>
				<td class="right"><input type="password" name="cpass"></td>
			</tr>
		</table>
		<br>
		<input type="submit" name="submitb" value="submit" ><br><br>
	</form>

		<span >
			<table border="1" >
				<tr>
					<td>First Name</td>
			 		<td>Last Name</td>
					<td>Email</td>
					<td>Address</td>
					<td>Contact No.</td>
					<td>Action</td>
				</tr>
				<?php

					$sql2 = mysql_query("SELECT * FROM tbl_cont");
					
					
					
					while($result = mysql_fetch_object($sql2)){

						$fname = $result -> firstName;
						$lname = $result -> lastName;
						$add = $result -> address;
						$email = $result -> emailAddress;
						$contact = $result -> contactNumber;
						$contId = $result -> contact_id;
					

						echo "<tr>
							<td>".$fname."</td>
							<td>".$lname."</td>
							<td>".$email."</td>
							<td>".$add."</td>
							<td>".$contact."</td>
							<td>
								<a href = 'editSection.php?cont_Id=".$contId."'>edit</a>/
								<a href = 'javascript:delete_info(".$contId.")'>delete</a>
							</td>
						</tr>";
					}
					
				?>
			</table>
		</span>
		
</body>
</html>
