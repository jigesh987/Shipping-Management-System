<?php
session_start();
?>
<?php include("database_connect_2.php");

?>

<?php
class LoginAdmin
{
    function login_in_system_as_admin($conn)
    {
        if (isset($_POST['loginusername2']) && isset($_POST['loginuserpassword2']))
        {
            $USER2 = $_POST['loginusername2'];
            $PASS2 = $_POST['loginuserpassword2'];
            $_SESSION["i"] = $USER2;
            $_SESSION["o"] = $PASS2;
        }
    $USER2 = stripcslashes($USER2);
    $PASS2 = stripcslashes($PASS2);
    $USER2 = mysqli_real_escape_string($conn, $USER2);
    $PASS2 = mysqli_real_escape_string($conn, $PASS2);
    $sql = "select * from admindatabase where admin = '$USER2' and password = '$PASS2'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        echo "<script type='text/javascript'>alert('Logged in as Admin');</script>";
        echo "<script>window.location = 'adminpaneluser.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Login failed. Invalid username or password');</script>";
        echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/index.php';</script>";
    }
    }
}
$aa = new LoginAdmin();
$aa->login_in_system_as_admin($conn);
?>