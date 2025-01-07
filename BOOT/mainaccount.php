<?php
session_start();
?>

<?php
include("mainaccountheader.php");
?>
<?php include("database_connect_2.php");

if (empty($_SESSION["a"]) && empty($_SESSION["b"])) {
    echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php';</script>";
} 
else {
    $USER = $_SESSION["a"];
    $PASS = $_SESSION["b"];
    $sql2 = "SELECT * FROM customer where useremail='$USER' and password='$PASS'";
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
}
?>

<script type="text/javascript">
    function bookcontainer() {
        var a = document.myForm.sourceofcontainer.value;
        var b = document.myForm.destinationofcontainer.value;
        if (a == b) {
            alert("Source and distination cannot be Same");
            return false;
        }
        var c = confirm('Are you sure you want to book Container ?');
        if (c == true) {
            return true;
        } else {
            window.location = 'http://localhost/mscit_project/BOOT/mainaccount.php';
            return false;
        }
    }
</script>
<style>
    body{
        background:url('./image/c.gif');
        background-size: cover;
    }
    .form{
        background-color: rgba(255,255,255 , 0.8); /* Adjust transparency*/
    }
</style>

<body>

    <div class="container-fluid">
        <!--<img src="./image/c.gif" width="1200px;">-->
    </div>
    <hr>
    <br>
    <h1 style="text-align: center; ">Shipment Booking Enquiry</h1>
    <br>
    <hr>
    <div class="container-fluid">
        <form class="form" name="myForm" method="POST" id="shipment" action="http://localhost/mscit_project/BOOT/a.php" onsubmit="return bookcontainer()">
            <div class="d-flex flex-wrap justify-content-between my-3">
                <div style="width: 48%; min-width: 300px;">
                    <label>Choose container Source</label>
                    <select class="form-select" required="" name="sourceofcontainer">
                        <option></option>
                        <option>Deendayal Port (Kandla), Gujarat </option>
                        <option>Mundra Port, Gujarat </option>
                        <option>Paradip Port, Odisha</option>
                        <option>Visakhapatnam Port, Andhra Pradesh </option>
                        <option>Jawaharlal Nehru Port (Nhava Sheva), Maharashtra</option>
                        <option>Mumbai Port, Maharashtra</option>
                        <option>Haldia Port, West Bengal </option>
                        <option>Chennai Port, Tamil Nadu</option>
                        <option>Panambur Port, Mangalore, Karnataka (New Mangalore Port)</option>
                        <option>Mormugao Port, Goa</option>
                        <option>VO Chidambaranar Port (Tuticorin), Tamil Nadu</option>
                        <option>Port Blair Port, Andaman and Nicobar Islands</option>
                    </select>
                </div>
                
                <div style="width: 48%; min-width: 300px;">
                    <label>Choose container Destination</label>
                    <select class="form-select" required="" name="destinationofcontainer">
                        <option></option>
                        <option>Deendayal Port (Kandla), Gujarat </option>
                        <option>Mundra Port, Gujarat </option>
                        <option>Paradip Port, Odisha</option>
                        <option>Visakhapatnam Port, Andhra Pradesh </option>
                        <option>Jawaharlal Nehru Port (Nhava Sheva), Maharashtra</option>
                        <option>Mumbai Port, Maharashtra</option>
                        <option>Haldia Port, West Bengal </option>
                        <option>Chennai Port, Tamil Nadu</option>
                        <option>Panambur Port, Mangalore, Karnataka (New Mangalore Port)</option>
                        <option>Mormugao Port, Goa</option>
                        <option>VO Chidambaranar Port (Tuticorin), Tamil Nadu</option>
                        <option>Port Blair Port, Andaman and Nicobar Islands</option>
                    </select>
                </div>

            </div>

            <div class="mb-3">
                <label>Choose container type </label>
                <select class="form-select" required="" name="typeofcontainer" style="max-width:630px;">
                    <option></option>
                    <option>Standard</option>
                    <option>Refrigerator</option>
                    <option>Dry Refrigerator</option>
                </select>
            </div>

            <div class="mb-3">
            <label>Choose container Size</label>
            <select class="form-select" required="" name="sizeofcontainer" style="max-width: 630px;">
                <option></option>
                <option>20 ft</option>
                <option>40 ft</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="cweight" class="form-label">Enter Cargo Weight</label>
                <input type="text" class="form-control" id="cweight" placeholder="Enter Cargo Weight" name="cweight" required="" style="max-width: 630px;">
            </div>
            <div class="mb-3">
                <label for="dod" class="form-label">Date of Departure</label>
                <input type="date" class="form-control" id="dod" name="userdate" data-date-format="YYYY MM DD" required="" style="max-width: 630px;">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</body>

<?php
include("footer.php");
?>