
<li class="nav-item">
	<a href="index.php" class="nav-link active">Home</a>
</li>
<?php
if ($_SESSION['userId']) {
	echo '	<li class="nav-item">
				<form class="nav-link" action="includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit" >Logout</a>
				</form>
			</li>';
}else{
	echo '<li class="nav-item">
		<a href="login-page.php" class="nav-link">Login</a>
	</li>';
}
?>

<li class="nav-item">
	<a href="register-page.php" class="nav-link">Register</a>
</li>