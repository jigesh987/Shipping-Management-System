<?php
session_start();
?>

<?php include("database_connect_2.php");

class Password_Change
{
	function changing_password($conn)
	{
		if (isset($_POST["currentpassword"]) && isset($_POST["newpassword"])) {
			$d = $_POST["currentpassword"];
			$f = $_POST["newpassword"];
		}
		$USER = $_SESSION["a"];

		$sql2 = "SELECT * FROM customer where useremail='$USER' and password = '$d'";
		if ($res = mysqli_query($conn, $sql2)) {
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_array($res)) {
					$sql = "update customer set password='$f' where useremail='$USER'";
					if (mysqli_query($conn, $sql)) {
						echo "<script>alert('Your password has changed successfully')</script>";
						echo "<script>alert('Login Again')</script>";
						echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php'</script>";
					}
				}
			} else {
				echo "<script>alert('Current password is wrong')</script>";
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/mainaccountsetting.php'</script>";
			}
		}
	}
}
$passwordchange = new Password_Change();
$passwordchange->changing_password($conn);

?>