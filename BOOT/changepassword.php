<?php
session_start();
?>
<?php
include("database_connect_2.php");
include("./others/navigationbar2.php");


if (isset($_SESSION["forgot"])) {
	$USER = $_SESSION["forgot"];
	if (isset($_POST["newpassword"])) {
		$f = $_POST["newpassword"];

		$sql = "update customer set password='$f' where useremail='$USER'";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Your password has changed successfully')</script>";
			echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php'</script>";
		}
	}
} else {
	echo "<script>alert('Erro')</script>";
	echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php'</script>";
}
?>

<script type="text/javascript">
function passwordvalid() {
            var a = document.myform.newpassword.value;
            var b = document.myform.repassword.value;
            if (a == b) {
            	if(a.length < 8)
                {
                    alert("Password Must be Greater then 8 digit");
                    return false;
                }
                return true;
            } else {
                alert("Enter valid password");
                return false;
            }
        }
</script>
<div class="container-fluid mt-5">
	<p style="font-weight: bold;">Change Your Password</p>
	<form name="myform" method="POST" action="" onsubmit="return passwordvalid()" id="aa">
		<div class="mb-3">
			<label for="" class="form-label">New Password</label>
			<input type="password" class="form-control" id="" placeholder="New Password" name="newpassword" required="" style="width: 400px;">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Re-enter password</label>
			<input type="password" class="form-control" id="" placeholder="Re-enter Password" name="repassword" required="" style="width: 400px;">
		</div>
		<input type="submit" name="" class="btn btn-primary">
	</form>
</div>
