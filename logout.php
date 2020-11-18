<?php
if(isset($_POST["logout"])){
	session_start();
	include 'dbconnect.php';
	include 'dbinc.php';

	$con= new DBConnector();
	$pdo=$con-> connectToDB();

	$user = new User();
	$user->logout($pdo);
}


?>