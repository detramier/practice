<?php
	$db = "localhost";
	$user = "root";
	$pw = "";
	
	mysql_connect($db,$user,$pw);
	mysql_select_db(db_contact);
	
	if($_POST['submitb']){
			$fname = $_POST['fname'];	
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$add = $_POST['add'];
			$contact = $_POST['contact'];
			$pass = $_POST['pass'];
			$cpass = $_POST['cpass'];
	}
	$insert = mysql_query("insert into tbl_contacts(FirstName,LastName,Email,Address,Contact,Pass) 
	values('$fname','$lname','$email','$add','$contact','$pass')");
	
	if(isset($_GET['delete_id'])){
	 mysql_query("DELETE FROM tbl_contacts WHERE ID = ".$_GET['delete_id']);
	 header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="style.css" />
	<script type="text/javascript">
	function delete_id(id){
		if(confirm('Delete Row?')){
			window.location.href='index.php?delete_id='+id;
		}
	}
	</script>
</head>
<body>
	<div id = "page">
		<div id="wrap">
			<div class="title">Personal Information<hr></div>
			<form method="POST">
				<div class="form-input">
					<div class="row">
						<div class="left">First Name:</div>
						<div class="right"><input type="text" name="fname"></div>
					</div>
					<div class="row">
						<div class="left">Last Name:</div>
						<div class="right"><input type="text" name="lname"></div>
					</div>
					<div class="row">
						<div class="left">Address:</div>
						<div class="right"><input type="text" name="add"></div>
					</div>
					<div class="row">
						<div class="left">Contact No.:</div>
						<div class="right"><input type="text" name="contact"></div>
					</div>
					<div class="row">
						<div class="left">Email Add:</div>
						<div class="right"><input type="text" name="email"></div>
					</div>
					<div class="row">
						<div class="left">Password:</div>
						<div class="right"><input type="text" name="pass"></div>
					</div>
				</div>
					<input type="submit" name="submitb" value="Submit" >
			</form>
			<table border="1">
			<tr>
				<td>ID</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Address</td>
				<td>Contact No.</td>
				<td>Password</td>
				<td>Action</td>
			</tr>
			<tr>
				<?php
				$select = mysql_query("select * from tbl_contacts");
				while($result = mysql_fetch_object($select)){
					$fname = $result -> FirstName;
					$lname = $result -> LastName;
					$email = $result -> Email;
					$add = $result -> Address;
					$contact = $result -> Contact;
					$pass = $result -> Pass;
					$id = $result -> ID;
				$sort = mysql_query("select * from tbl_contacts)
				order by ID");
			
				echo "<tr id='dbrow'>
					  <td>".$id."</td>
					  <td>".$fname."</td>
					  <td>".$lname."</td>
					  <td>".$email."</td>
					  <td>".$add."</td>
					  <td>".$contact."</td>
					  <td>".$pass."</td>
					  <td>
					  <a href='edit.php?id=".$id."'>Edit</a>
					  <a href='javascript:delete_id(".$id.")'>Delete</a>
					  </td>
					  </tr>"
				;}
				
				
				?>
			</tr>
		</table>
		</div>
	</div>
</body>
</html>