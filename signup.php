<?php
include './dbconnect.php';
include './dbinc.php';
if(isset($_POST['register_btn'])){

		$con = new DBConnector();
		$pdo = $con->connectToDB();

		$user = new User();
		$user->setNames($_POST['f_names']);
		$user->setEmail($_POST['email']);
		$user->setResidence($_POST['residence']);
		$user->setPassword($_POST['password']);
		$user->setPic($_FILES['pic']);

		echo $user->register($pdo);
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body style="background-color: #BDD3E1;">
	<form action="signup.php" method="post" enctype="multipart/form-data">
	<h2 style="margin: 0 auto; text-align: center; padding: 10px;">Welcome. Fill in the details below.</h2>
	<fieldset style="width: 400px;height: 400px; top: 50%;margin:0 auto;">
		<div style="padding: 10px">
			<label for="names">Full name:</label>
			<input type="text" name="f_names" id="names" placeholder="Enter full name">
		</div>
		<div style="padding: 10px">
			<label for="email_add">Email address:</label>
			<input type="email" name="email" id="email_add" placeholder="Enter email address">
		</div>
		<div style="padding: 10px">
			<label for="profile">Profile picture:</label>
			<input type="file" name="pic" id="profile" placeholder="Select a profile image">
		</div>
		<div style="padding: 10px">
			<label for="home">Place of residence:</label>
			<input type="text" name="residence" id="home" placeholder="Enter place of residence">
		</div>
		<div style="padding: 10px">
			<label for="pass">Password:</label>
			<input type="password" name="password" id="pass" placeholder="Enter password">
		</div>
		<div style="padding: 10px">
			<input type="submit" name="register_btn">
		</div>
	</fieldset>
	</form>
</body>
</html>