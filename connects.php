<?php
function connect(){
$server="localhost";
$username="root";
$password="";
$database="newapp";

$link=mysqli_connect($server,$username,$password,$database) or die("Could not connect". mysqli_connect_error());
return $link;
}
function setData($sql){
	$link = connect();
	$response = " ";
	if(mysqli_query($link,$sql)){
		$response = "Success";
		
	}else{
		$response = "Error".mysqli_error($link);
	}
	return $response;
}
	function getData($sql){
	$link = connect();
	$results = mysqli_query($link,$sql);
	return $results;
}

?>