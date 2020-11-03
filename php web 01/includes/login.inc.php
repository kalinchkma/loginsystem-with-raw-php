<?php
if (isset($_POST['login-submit'])) {
	require_once('../config.php');

	$mailuid = $_POST['emailuid'];
	$password = $_POST['pwd'];

	if(empty($mailuid) || empty($password)){
		header("Location: ../login-page.php?error=emptyFields");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE username=? OR useremail=?;";
		$stmt = mysqli_stmt_init($dbcon);
		//error check
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../login-page.php?error=SQLERROR");
			exit();
		}else{

			mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdcheck = password_verify($password, $row['userpwd']);
				if($pwdcheck == false){
					header("Location: ../login-page.php?error=Password not correct");
					exit();
				}else if ($pwdcheck == true) {
					session_start();
					$_SESSION['userId'] = $row['userid'];
					$_SESSION['userName'] = $row['username'];

					header("Location: ../index.php?login=success");
					exit();

				}else{
					header("Location: ../login-page.php?error=Password not correct");
					exit();
				}
			}else{
				header("Location: ../login-page.php?error=userNot found");
				exit();
			}
		}
	}
	
}else{
	header("Location: ../index.php");
	exit();
}