<?php
	$db = "localhost";
	$user = "root";
	$pw = "";
	
	mysql_connect($db,$user,$pw);
	mysql_select_db(db_contact);
	
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];	
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$add = $_POST['add'];
		$contact = $_POST['contact'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$update = mysql_query("UPDATE tbl_contacts SET FirstName='$fname',LastName='$lname',Email='$email',Address='$add',Contact='$contact',Pass='$pass' where ID='$id'");
		header("Location:index.php");
	}
?>
<?php 
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_contacts WHERE id=$id");
	while($result = mysql_fetch_object($select)){
					$fname = $result -> FirstName;
					$lname = $result -> LastName;
					$email = $result -> Email;
					$add = $result -> Address;
					$contact = $result -> Contact;
					$pass = $result -> Pass;
					$id = $result -> ID;
	}
?>
<html>
<head>
	<style type="text/css">
		body{
			font-family: century gothic;
            color: #717171;
			font-weight: bold;
		}
		form{
            height:350px;
		}
		#wrap{
			border: 1px solid #DCDADA;
          <--  border-radius: 5px 5px 5px 5px;
			box-shadow: #E1E1E1;
		    height:75%; -->
            background: #fff;
            background:#f4f4f4;
		}
		.title{
			font-size:30px;
            height:40px;
            padding:16px 16px 20px 20px;
        }
		#page{
            width:65%;
            margin:5% 18%;
			border: 1px solid #DCDADA;
			border-radius:5px 5px 5px 5px;
        }
		.left{
            float: left;
            font-size: 16px;
            font-weight: bold;
            padding: 5px;
            width: 200px;
        }
        .right{
            float: left;
            width: 214px;
        }
        .row{
            float: left;
			margin:0px 0px 0px 55px;
			padding:5px;
            width: 90%;
        }
		.form-input{
			padding:0px 60px 0px 53px;
		}
		input[type='text']{
			border-radius: 4px;
			border: 1px solid #CFCFCF;
			height:25px;
		}
		input[type='submit']{
			font-size:16px;
			border:none;
			border-radius:5px 5px 5px 5px;
			margin:30px 125px;
			padding:10px;
			width:125px;
			float:right;
			background:linear-gradient(#94b9e9, #4870d2);
			color:white;
			cursor:pointer;
			font-weight: bold;
		}
		
	</style>
</head>
<body>
	<div id = "page">
		<div id="wrap">
			<div class="title">Personal Information<hr></div>
			<form method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<div class="form-input">
					<div class="row">
						<div class="left">First Name:</div>
						<div class="right"><input type="text" name="fname" value="<?php echo $fname; ?>"></div>
					</div>
					<div class="row">
						<div class="left">Last Name:</div>
						<div class="right"><input type="text" name="lname" value="<?php echo $lname; ?>"></div>
					</div>
					<div class="row">
						<div class="left">Address:</div>
						<div class="right"><input type="text" name="add" value="<?php echo $add; ?>"></div>
					</div>
					<div class="row">
						<div class="left">Contact No.:</div>
						<div class="right"><input type="text" name="contact" value="<?php echo $contact; ?>"></div>
					</div>
					<div class="row">
						<div class="left">Email Add:</div>
						<div class="right"><input type="text" name="email" value="<?php echo $email; ?>"></div>
					</div>
					<div class="row">
						<div class="left">Password:</div>
						<div class="right"><input type="text" name="pass" value="<?php echo $pass; ?>"></div>
					</div>
				</div>
					<input type="submit" name="update" value="Submit" >
			</form>
		</div>
	</div>
</body>
</html>