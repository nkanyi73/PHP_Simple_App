<?php
session_start();
include 'dbconnect.php';
include 'dbinc.php';

$con= new DBConnector();
$pdo=$con-> connectToDB();

$user = new User();
$user->setEmail($_SESSION["email"]);
$results = $user-> getDetails($pdo);

if(isset($_POST["logout"])){
	$user->logout($pdo);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body style="background-color: #BDD3E1;">
	<fieldset style="width: 300px;height: 550px; top: 50%;margin:0 auto;">
		<div style="padding: 5px">
			<p>Profile picture</p>
			<img style="height: 200px; width: 200px; object-fit: cover;" src="<?php echo $results['profile'];?>">
		</div>
		<div style="padding: 5px">
			<p>Email address:<?php
			if(isset($_SESSION["email"])
						){
							echo $_SESSION["email"];
						}else{
							echo '<script>alert("Authentication Error. Log in again")</script>';
							echo '<script>window.location="login.php"</script>';
						}?>
				
			</p>
		</div>
		<div style="padding: 5px">
			<p>Name:<?php echo $results['names'];?></p>
		</div>
		<div style="padding: 5px">
			<p>Residence: <?php echo $results['residence'];?></p>
		</div>
		<div style="padding: 5px">
			<a href="passchange.php">Change password</a>
		</div>
		<div style="padding: 5px">
			<a href="order.php">Order food</a>
		</div>
		<form action="logout.php" method="post">
			<div style="padding: 5px">
				<input type="submit" name="logout" value="Log Out">
			</div>
		</form>
	</fieldset>
</body>
</html>