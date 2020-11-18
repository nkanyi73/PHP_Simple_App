<?php
session_start();
include 'dbconnect.php';
include 'dbinc.php';
if(isset($_POST['change'])){
	if(isset($_SESSION["email"])){
		$con= new DBConnector();
		$pdo=$con-> connectToDB();

		

		$user = new User();
		$user->setPassword($_POST['pass1']);
		$user->setPassword2($_POST['pass2']);
		$user->setEmail($_SESSION['email']);

		 $user-> changePassword($pdo);
	}else{
		echo '<script>alert("Authentication Error. Log in again")</script>';
		echo '<script>window.location="login.php"</script>';
	}


	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
</head>
<body style="background-color: #BDD3E1;">
	<form method="post" action="passchange.php">
		<div style="padding: 5px">
			<label for="email_add">Old password:</label>
			<input type="password" name="pass1" id="email_add">
		</div>
		<div style="padding: 5px">
			<label for="email_add">New password:</label>
			<input type="password" name="pass2" id="email_add">
		</div>
		<div style="padding: 10px">
			<input type="submit" name="change">
		</div>
	</form>
</body>
</html>