<?php
if(isset($_POST['signup-submit'])){
	require_once('../config.php');

	$username = $_POST['user-name'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$conpassword = $_POST['con-pass'];

	if(empty($username) || empty($email) || empty($password) || empty($conpassword)){
		header('location: ../register-page.php?error=emptyfields&uid='.$username.'&mail='.$email);
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header('location: ../register-page.php?error=invalidEmail&uid');
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header('location: ../register-page.php?error=invalidEmail&uid='.$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header('location: ../register-page.php?error=invalidUid&uid='.$email);
		exit();
	}
	elseif ($password !== $conpassword) {
		header('location: ../register-page.php?error=passwordcheck&uid='.$username."&mail".$email);
		exit();
	}
	else{
		//check if user already in database
		$sql = "SELECT username FROM users WHERE username=?";
		$stmt = mysqli_stmt_init($dbcon);
		//check the error
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header('location: ../register-page.php?error=SQLERROR');
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			if ($resultcheck > 0){
				header('location: ../register-page.php?error=username already taken');
				exit();
			}
			//if username not in database insert user into database
			else{

				$sql = "INSERT INTO users(username,useremail,userpwd) VALUES(?,?,?)";
				$stmt = mysqli_stmt_init($dbcon);
				//check error
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					header('location: ../register-page.php?error = SQLERROR');
					exit();
				}
				else{

					$hashPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashPwd);
					mysqli_stmt_execute($stmt);
					header('location: ../register-page.php?signup=success');
					exit();
				}

			}
		}
	}
//closing connection 
	mysqli_stmt_close($stmt);
	$dbcon->close();

} else{
	header('location: ../register-page.php');
	exit();
}
