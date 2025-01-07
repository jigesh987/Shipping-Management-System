<?php
session_start();
?>
<?php include("database_connect_2.php");


class AccountDelete
{
	function deleting_account($conn)
	{
		if (isset($_SESSION["a"]) && isset($_SESSION["b"])) {
			$USER = $_SESSION["a"];
			$PASS = $_SESSION["b"];
			$sql2 = "delete from container_table where customer_email='$USER'";

			if (mysqli_query($conn, $sql2)) {

			}

			$sql = "delete from customer where useremail='$USER' and password='$PASS'";
			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Your account has deleted successfully')</script>";
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php'</script>";
			} else {
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/mainaccountsetting.php'</script>";
			}
		}
	}
}
$deleteaccount = new AccountDelete();
$deleteaccount->deleting_account($conn);
?>