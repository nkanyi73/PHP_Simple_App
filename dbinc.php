<?php


class User {

	private $email, $names, $residence, $password, $password2, $pic;

	public function setPic($pic){
		$this->pic = $pic;
	}
	public function getPic(){
		return $this->pic;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setNames($names){
		$this->names = $names;
	}
	public function getNames(){
		return $this->names;
	}
	public function setResidence($residence){
		$this->residence = $residence;
	}
	public function getResidence(){
		return $this->residence;
	}
	public function setPassword($password){
		 $this->password = $password;
	}
	public function getPassword(){
		return $this->password;
	}
	public function setPassword2($password2){
		$this->password2 = $password2;
	}
	public function getPassword2(){
		return $this->password2;
	}


	public function login($pdo){
		session_start();
		$password = $this->getPassword();
		$email = $this->getEmail();
		$sql = "SELECT * FROM user_details WHERE email=?";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$email]);
		$result=$stmt->fetch();
		//print_r($result);
		if(empty($result)){
			echo '<script>alert("Invalid credentials")</script>';
			echo '<script>window.location="login.php"</script>';
		}else{
				if (password_verify($password, $result['password'])) {
					$_SESSION['email'] = $result['email'];
					echo '<script>alert("Login successful")</script>';
					echo '<script>window.location="index.php"</script>';
				}else{
					echo '<script>alert("Wrong credentials")</script>';
					echo '<script>window.location="login.php"</script>';
				}
			}
	}
	public function register($pdo){
		try{
			$password = $this->getPassword();
			$names = $this->getNames();
			$email = $this->getEmail();
			$residence = $this->getResidence();
			$pic = $this->getPic();
			$original_file_name = $_FILES["pic"]["name"];
			$file_tmp_location = $_FILES["pic"]["tmp_name"];
			$fileext = explode('.',$original_file_name);
			$fileActualExt = strtolower(end($fileext));
			$fileNamenew = uniqid('',true).".".$fileActualExt;
			$fileDestination = 'images/'.$fileNamenew;
			move_uploaded_file($file_tmp_location, $fileDestination);
			$passN = password_hash($password, PASSWORD_DEFAULT);
			$sql="INSERT INTO user_details(names,email,residence,password,profile) VALUES (?,?,?,?,?)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$names,$email,$residence,$passN,$fileDestination]);
			$stmt = null;
			echo '<script>alert("Registration successful")</script>';
			echo '<script>window.location="login.php"</script>';
		}catch(Exception $e){
			return $e->getMessage();
		}

	}
	public function changePassword($pdo){
		$email= $this->getEmail();
		$password = $this->getPassword();
		$password2 = $this->getPassword2();
		$sql = "SELECT * FROM user_details WHERE email=?";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$email]);
		$result=$stmt->fetch();
		if (password_verify($password, $result['password'])){
			$passNew = password_hash($password2, PASSWORD_DEFAULT);
			$sql2 = "UPDATE user_details SET password = '".$passNew. "' WHERE email = ?";
			$stmt2=$pdo->prepare($sql2);
			$stmt2->execute([$email]);
			$stmt2 = null;
			echo '<script>alert("Password Changed")</script>';
			echo '<script>window.location="index.php"</script>';

		}else{
			echo '<script>alert("Wrong Password")</script>';
			echo '<script>window.location="passchange.php"</script>';
		}
	}
	public function logout($pdo){
		if(isset($_SESSION['email'])){
			session_destroy();
			echo '<script>alert("Log out successful. Log in again")</script>';
			echo '<script>window.location="login.php"</script>';
		}else{
			echo '<script>alert("Authentication Error. Log in again")</script>';
			echo '<script>window.location="login.php"</script>';
		}
	}
	public function getDetails($pdo){
		$email= $this->getEmail();
		$sql = "SELECT * FROM user_details WHERE email=?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$email]);
		$result=$stmt->fetch();
		$stmt = null;

		return $result;


	}
	
}

?>