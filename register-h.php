<form action="includes/signup.inc.php" method="post" name="signup" id="signup">
	<div class="form-group row">
		<label class="col-md-4" for="user-name">User Name: </label>
		<div class="col-md-8">
			<input type="text" name="user-name" id="user-name" placeholder="User Name" class="form-control" value="<?php if(isset($_POST['user-name'])) echo $_POST['user-name'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-md-4"> E-Mail:</label>
		<div class="col-md-8">
			<input type="email" name="email" id="email" placeholder="E-Mail" class="form-control" value="<?php if(isset($_POST['email'])) echo($_POST['email']);?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="pass" class="col-md-4">Password: </label>
		<div class="col-md-8">
			<input type="password" name="pass" id="pass" placeholder="Password" class="form-control" value="<?php if(isset($_POST['pass'])) echo($_POST['pass']);?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="con-pass" class="col-md-4">Conform Password:</label>
		<div class="col-md-8">
			<input type="password" name="con-pass" id="con-pass" placeholder="Conform Password" class="form-control" value="<?php if(isset($_POST['con-pass'])) echo $_POST['con-pass'];?>">
		</div>
	</div>
	<div class="form-group row">
		<input type="submit" name="signup-submit" value="Signup" class="btn btn-secondary">
	</div>
</form>