<?php
session_start();
?>
<?php include("database_connect_2.php");
class Login
{
    function login_in_system($conn)
    {
        if (isset($_POST['loginusername']) && isset($_POST['loginuserpassword']))
        {
            $USER = $_POST['loginusername'];
            $PASS = $_POST['loginuserpassword'];
            $_SESSION["a"] = $USER;
            $_SESSION["b"] = $PASS;
        }

    $USER = stripcslashes($USER);
    $PASS = stripcslashes($PASS);
    $USER = mysqli_real_escape_string($conn, $USER);
    $PASS = mysqli_real_escape_string($conn, $PASS);
    $sql = "select * from customer where useremail = '$USER' and password = '$PASS'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1)
    {

        echo "<script>window.location = 'http://localhost/mscit_project/BOOT/mainaccount.php';</script>";
        
    } else {
        echo "<script type='text/javascript'>alert('Login failed. Invalid username or password');</script>";
        echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php';</script>";
    }
    }
}
$aa = new Login();
$aa->login_in_system($conn);
?>