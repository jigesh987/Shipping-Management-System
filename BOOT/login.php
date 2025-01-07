<?php
session_start();
?>

<?php
include("./others/navigationbar2.php");
?>

<!doctype html>
<html lang="en">
<title>Customer Login</title>
<head>
	<title>Hello, world!</title>
	<script type="text/javascript">
		function password_visible() {
			var x = document.getElementById("pass");
			if (x.type == "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}

		function valid() {
			var a = document.myform.loginusername.value;
			var b = document.myform.loginuserpassword.value;
			if (a == "" && b == "") {
				alert("Username and password are empty");
				return false;
			} else {
				if (a == "") {
					alert("Username is empty");
					return false;
				}
				if (b == "") {
					alert("Password is empty");
					return false;
				}
			}
		}
	</script>
</head>

<body>
	<?php
	session_unset();
	session_destroy();
	?>
	<br>
	<form name="myform" onsubmit="return valid()" method="POST" action="http://localhost/mscit_project/BOOT/loginauth.php">
		<div class="container mt-1 d-flex align-items-center flex-column">
			<div>
				<label for="" class="form-label">Email Address</label>
				<input type="text" class="form-control" id="" placeholder="Example E-Mail Address" name="loginusername" style="width: 370px;">
			</div>
			<div>
				<label for="2" class="form-label">Password</label>
				<input type="password" class="form-control" placeholder="Enter Password" name="loginuserpassword" id="pass" style="width: 370px;">
			</div>
			<br>
			<div class="col-sm-4">
				<input type="checkbox" name="pass" onclick="password_visible()"> Show Password
				<br>
				<a href="password.php">Forgot Password</a>
				<p style="font-size: 18px;font-family: Calibri;">Don't have an account ?<a href="signup.php" style="text-decoration: none;"><b> Sign up.</b></a></p>
				<input type="submit" value="Login" name="submit" class="btn btn-primary">
			</div>
		</div>
	</form>
</body>

</html>

<div style="position: absolute; bottom: 0px; width: 100%">
	<?php
	include("footer.php");
	?>
</div>