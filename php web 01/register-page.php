<?php
session_start();
?>
<head>
	<title>PHP.org
	</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<!-- main header      #1 -->
	<header class="jumbotron row">
		<div class="col-md-2">
			<img src="img/hunter.jpg" alt="hunter.jpg" class="img-fluid">
		</div>
		<div class="col-md-8">
			<h1 class="text-center h3">PHP ORGANIZATION DOT ORG</h1>
		</div>
		<div class="col-md-2">
			
		</div>
	</header>
	<!-- header end    #1 -->
	<section class="row">
		<nav class="col-md-2">
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<?php
				if (@$_SESSION['userId']) {
					echo '	<li class="nav-item">
					<form class="nav-link" action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit" >Logout</a>
					</form>
					</li>';
				}else{
				echo '<li class="nav-item ">
				<a href="login-page.php" class="nav-link">Login</a>
				</li>';
				}
				?>

			<li class="nav-item">
			<a href="register-page.php" class="nav-link active">Register</a>
				</li>
			</ul>
		</nav>
		<div class="col-md-8">
			<h1 class="text-center">Register</h1>

			<?php
			//showing the error message
			if(isset($_GET['error'])){
				echo "<p class='h5 text-center' style='color: red'>Make sure You fileds all fields currectly</p>";
			}
			require_once('register-h.php');
			
			?>
		</div>
		<div class="col-md-2">
			
		</div>

		
	</section>


	<footer class="jumbotron row ">
		<div class="col-md-12"><p class="h5 text-center">&copy;Copy Right By Hunter ORG</p></div>
	</footer>
</div>






<!-- javascript -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>