<form action="includes/login.inc.php" method="post" name="loginform" id="loginform">
  	<div class="form-group row">
		<label for="emailuid" class="col-md-4">E-Mail Address:</label>
			<div class="col-md-8">
				<input type="text" name="emailuid" id="emailuid" class="form-control" placeholder="E-Mail" maxlength="60"
				value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
			</div>
	
 	</div>
 	<div class="form-group row">
 		<label for="pwd" class="col-md-4">
 			Password:
 		</label>
 		<div class="col-md-8">
 			<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" maxlength="60" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd'];?>">
 		</div>
 	</div>
 	<div class="form-group row">
 		<div class="col-md-12">
 			<input type="submit" name="login-submit" id="submit" class="btn btn-primary" value="Submit">
 		</div>
 	</div>


</form>
