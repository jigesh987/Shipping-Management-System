<?php
session_start();
include("database_connect_2.php");
include("mainaccountheader.php");
$USER = $_SESSION["a"];
$PASS = $_SESSION["b"];
if (isset($USER) && isset($PASS)) {
} else {
    header("Location:http://localhost/BOOT/login.php");
}
$sql2 = "SELECT * FROM customer where useremail='$USER' and password = '$PASS'";
if ($res = mysqli_query($conn, $sql2)) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $w = "Logged in as : " . $row["useremail"];
            echo "<script>
                    document.getElementById('acc').innerHTML = '$w';
                </script>";
        }
    }
}
?>

<html>
<title>Setting</title>
<head>
    <script>
        function passwordvalid() {
            var a = document.myform.newpassword.value;
            var b = document.myform.repassword.value;

            if (a == b) {

                if (a.length < 8) {
                    alert("Password Must be Greater then 8 digit");
                    return false;
                }
                return true;

            } else {
                alert("Enter valid password");
                return false;
            }
        }

        function dell() {
            var a = "Do yo want to delete your account Permanently";
            if (confirm(a) == true) {
                window.location = 'http://localhost/mscit_project/BOOT/mainaccountsettingdelete.php';
            }
        }

        function historyPage() {
            window.location = 'http://localhost/mscit_project/BOOT/mainaccounthistory.php';
        }
    </script>
</head>
<style>
    body{
        background:url('./image/setting.gif');
        background-size: 80%;
        background-position:right 10px;
       
        background-color: rgba(255,255,255 , 0.8); /* Adjust transparency*/
        
    }

</style>
<body>
    <!--<center><img src="./image/aa.gif" width="100%" height="800px;"></center>-->
    <div class="img">
    <div class="container-fluid mt-3">

        <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Your Account Info
        </button>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Your Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <?php include("database_connect_2.php");
                        $USER = $_SESSION["a"];
                        $PASS = $_SESSION["b"];
                        $sql2 = "SELECT * FROM customer where useremail='$USER' and password = '$PASS'";
                        if ($res = mysqli_query($conn, $sql2)) {
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "Name : " . $row["username"] . "<br>";
                                    echo "Gender : " . $row["usergender"] . "<br>";
                                    echo "Age : " . $row["userage"] . "<br>";
                                    echo "Date of Birth : " . $row["date_of_birth"] . "<br>";
                                    echo "Phone : " . $row["userphone"] . "<br>";
                                    echo "E-Mail : " . $row["useremail"] . "<br>";
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="container-fluid mt-5">
            <p style="font-weight: bold;">Change Your Password</p>
            <form name="myform" method="POST" action="http://localhost/mscit_project/BOOT/mainaccountsettingpassword.php" onsubmit="return passwordvalid()">
                <div class="mb-3">
                    <label for="" class="form-label">Current Password</label>
                    <input type="text" class="form-control" id="form" placeholder="Current Password" name="currentpassword" required="" style="width: 400px;">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="" placeholder="New Password" name="newpassword" required="" style="width: 400px;">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Re-enter password</label>
                    <input type="password" class="form-control" id="" placeholder="Re-enter Password" name="repassword" required="" style="width: 400px;">
                </div>
                <div class="mb-3">
                <input type="submit" name="" class="btn btn-primary">
                </div>
            </form>
            
            <div class="mb-3" style="width: 450px">
                <label for="del" class="form-label">Show Your History</label><br>
                <button type="button" class="btn btn-primary btn-sm" id="del" onclick="historyPage()">History</button>
            </div>
            
            <div class="mb-3" style="width: 450px">
                <label for="del" class="form-label">Delete Your Account Permenantly</label><br>
                <button type="button" class="btn btn-primary btn-sm" id="del" onclick="dell()">Delete</button>
            </div>
        </div>
    </div>
</body>

</html>


<?php
include("./others/footer.php");
?>