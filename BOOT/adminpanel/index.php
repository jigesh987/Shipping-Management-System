<?php
session_start();
?>

<?php
include("database_connect_2.php");
include("adminpanelloginheader.php");
?>

<?php
	session_unset();
	session_destroy();
?>
<br>
	<form method="POST" action="./adminpanelloginauth.php">
		<div class="container mt-5 d-flex align-items-center flex-column">
			<div class="col">
				<label for="" class="form-label">Email Address</label>
				<input type="text" class="form-control" id="" placeholder="Example E-Mail Address" name="loginusername2" required="" style="width: 350px;">
			</div>
			<div class="col">
				<label for="2" class="form-label">Password</label>
				<input type="password" class="form-control" placeholder="Enter Password" name="loginuserpassword2" id="pass" required="" style="width: 350px;">
			</div>
			<br>
			<div class="col">
				<input type="submit" value="Login" name="submit" class="btn btn-primary">
			</div>
		</div>
	</form>