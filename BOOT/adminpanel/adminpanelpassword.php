<?php

include("database_connect_2.php");
include("adminpanelloginheader.php");

class ChangeAdminPassword
{

    function changepasswordforadmin($conn)
    {

        if (isset($_POST["currentpassword"]) && isset($_POST["newpassword"])) {
            $d = $_POST["currentpassword"];
            $f = $_POST["newpassword"];
            $sql2 = "SELECT * FROM admindatabase where admin='admin' and password = '$d'";
            if ($res = mysqli_query($conn, $sql2)) {
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $sql = "update admindatabase set password='$f'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Your password has changed successfully')</script>";
                            echo "<script>alert('Login Again')</script>";
                            echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/index.php'</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Current password is wrong')</script>";
                    echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/adminpanelpassword.php'</script>";
                }
            }
        }
    }
}

$admin = new ChangeAdminPassword();

$admin->changepasswordforadmin($conn);

?>
<script>
    function passwordvalid() {
        var a = document.myform.newpassword.value;
        var b = document.myform.repassword.value;
        if (a == b) {
            return true;
        } else {
            alert("Enter valid password");
            return false;
        }
    }
</script>
<style>
    body {
        background: url('../image/setting.gif');
        background-size: 80%;
        background-position: right 10px;

        background-color: rgba(255, 255, 255, 0.8);
        /* Adjust transparency*/

    }
</style>

<body>

    <div class="container-fluid mt-5">
        <p style="font-weight: bold;">Change Your Password</p>
        <form name="myform" method="POST" action="" onsubmit="return passwordvalid()" id="aa">
            <div class="mb-3">
                <label for="" class="form-label">Current Password</label>
                <input type="text" class="form-control" id="form" placeholder="Current Password" name="currentpassword"
                    required="" style="width: 400px;">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">New Password</label>
                <input type="password" class="form-control" id="" placeholder="New Password" name="newpassword"
                    required="" style="width: 400px;">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Re-enter password</label>
                <input type="password" class="form-control" id="" placeholder="Re-enter Password" name="repassword"
                    required="" style="width: 400px;">
            </div>
            <input type="submit" name="" class="btn btn-primary">
        </form>
    </div>
</body>