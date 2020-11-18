<?php
include './dbconnect.php';
include './dbinc.php';
if(isset($_POST['login_btn'])){

		$con = new DBConnector();
		$pdo = $con->connectToDB();

		$user = new User();
		
		$user->setEmail($_POST['email']);
		$user->setPassword( $_POST['password']);

		echo $user->login($pdo);
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body style="background-color: #BDD3E1;">
	<form action="login.php" method="post">
		<h2 style="margin: 0 auto; text-align: center; padding: 10px;">Fill in the details below to log into your account.</h2>
		<fieldset  style="width: 400px;height: 400px; top: 50%;margin:0 auto;">
			<div style="padding: 10px">
				<label for="email_add">Email address:</label>
				<input type="email" name="email" id="email_add">
			</div>
			<div style="padding: 10px">
				<label for="pass">Password</label>
				<input type="Password" name="password" id="pass">
			</div>
			<div style="padding: 10px">
				<input type="submit" name="login_btn">
			</div>
		</fieldset>
	</form>
</body>
</html>