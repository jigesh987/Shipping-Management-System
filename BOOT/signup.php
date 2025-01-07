<?php
include("./others/navigationbar2.php");
?>
<!doctype html>
<html lang="en">

<head>
	<script>
		function validation() {
			var user = document.frm.username.value;
			var age = document.frm.userage.value;
			var email = document.frm.useremail.value;
			var dob = document.frm.userdate.value;
			var gender = document.frm.gen.value;
			var pass1 = document.frm.userpassword.value;
			var pass2 = document.frm.userpassword2.value;
			if (user == "") {
				alert("Username should not be empty");
				return false;
			}


			var str = document.frm.userphone.value;
			var patt = new RegExp(("[a-zA-Z@#$%^&*!]"));
			var res = patt.test(str);
			if (res){
				alert("Enter valid Phone Number");
				return false;
			}

			if (user == "") {
				alert("Username should not be empty");
				return false;
			}
			if (age == "") {
				alert("Age should not be empty");
				return false;
			}


			var str2 = document.frm.userage.value;
			var patt2 = new RegExp(("[a-zA-Z@#$%^&*!]"));
			var res2 = patt2.test(str2);
			if (res2){
				alert("Enter valid age Number");
				return false;
			}

			if (email == "") {
				alert("E-Mail should not be empty");
				return false;
			}
			if (dob == "") {
				alert("Date should not be empty");
				return false;
			}
			if (gender == "") {
				alert("Please select your gender");
				return false;
			}
			if (pass1 == "") {
				alert("Password should not be empty");
				return false;
			}
			if (pass2 == "") {
				alert("Password should not be empty");
				return false;
			}
			if(pass1.length < 8)
			{
				alert("Password Must be Greater then 8 digit");
				return false;
			}
			if (pass1 != pass2) {
				alert("Password not matched");
				return false;
			}
		}
	</script>
</head>
<title>Sign Up</title>
<body>
	<!--<img src="./signupgif.gif" width="100%">-->

	<div class="container mt-5">
		<!--<form class="row g-3" action="/BOOT/userdetail.php" onsubmit="return validation()" method="POST" name="frm">-->
		<!--<form class="row g-3" action="http://localhost/BOOT/a.php" onsubmit="return validation()" method="POST" name="frm">-->
		<form class="" action="http://localhost/mscit_project/BOOT/a.php" onsubmit="return validation()" method="POST" name="frm" class="d-flex flex-wrap">
			<div class="row mt-5">
			<div class="col">
				<label for="" class="form-label">Name</label>
				<input type="text" class="form-control" id="" placeholder="Enter Name" name="username">
			</div>
			<div class="col">
				<label for="" class="form-label">Email Address</label>
				<input type="email" class="form-control" id="" placeholder="Enter E-Mail Address" name="useremail" required="">
			</div>
			</div>

			<div class="row mt-3">
			<div class="col">
				<label for="" class="form-label">Age</label>
				<input type="text" class="form-control" id="" placeholder="Enter Age" name="userage">
			</div>
			<div class="col">
				<label for="" class="form-label">Phone number</label>
				<input type="text" class="form-control" id="" placeholder="Enter Phone Number" name="userphone" maxlength="10">
			</div>
			<div class="col">
				<label for="" class="form-label">Date of Birth</label>
				<input type="date" class="form-control" id="" placeholder="Enter Date of Birth" name="userdate">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<input type="radio" name="gen" value="male"> Male
				<input type="radio" name="gen" value="female"> Female
			</div>
		</div>


			<div class="mt-4">
				<div class="mt-3">
					<label for="" class="form-label">Enter Password</label>
					<input type="password" class="form-control" id="" placeholder="Enter Password placeholder" name="userpassword">
				</div>
				<div class="mt-3">
					<label for="" class="form-label">Re-enter Password</label>
					<input type="password" class="form-control" id="" placeholder="Re-enter Password placeholder" name="userpassword2">
				</div>
			</div>
			<div class="col mt-2">
				<input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
			</div>
		</form>
	</div>
</body>

</html>

<div style="position: absolute; bottom: 0px; width: 100%">
	<?php
	include("footer.php");
	?>
</div>