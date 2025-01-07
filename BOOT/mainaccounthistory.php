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


$sql3 = "SELECT * FROM container_table where customer_email='$USER'";
$resultSet = mysqli_query($conn, $sql3) or die("database error:" . mysqli_error($conn));
?>


<div class="mt-5 container-fluid">
    <table id="editableTable" class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">customer_email</th>
                <th scope="col">Source</th>
                <th scope="col">Destination</th>
                <th scope="col">Type</th>
                <th scope="col">Size</th>
                <th scope="col">phonenumber</th>
                <th scope="col">Date_and_time</th>
                <th scope="col">Cargo Weight</th>
                <th scope="col">Date of Departure</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($developer = mysqli_fetch_assoc($resultSet)) { ?>
                <tr>
                    <td><?php echo $developer['name']; ?></td>
                    <td><?php echo $developer['customer_email']; ?></td>
                    <td><?php echo $developer['source']; ?></td>
                    <td><?php echo $developer['destination']; ?></td>
                    <td><?php echo $developer['type']; ?></td>
                    <td><?php echo $developer['size']; ?></td>
                    <td><?php echo $developer['phonenumber']; ?></td>
                    <td><?php echo $developer['Date_and_time']; ?></td>
                    <td><?php echo $developer['cargo_weight']; ?></td>
                    <td><?php echo $developer['DOD']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
//include("footer.php");
?>

<div style="position: absolute; bottom: 0px; width: 100%">
    <?php
    include("footer.php");
    ?>
</div>