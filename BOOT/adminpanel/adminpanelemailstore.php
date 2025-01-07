<?php
session_start();
?>
<?php
include("adminpanelheader.php");
include("database_connect_2.php");

if (empty($_SESSION["i"]) && empty($_SESSION["o"])) {
    echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/index.php';</script>";
    
}
?>



<?php include("database_connect_2.php");


$sql3 = "SELECT * FROM email";
$resultSet = mysqli_query($conn, $sql3) or die("database error:" . mysqli_error($conn));
?><br>
<title>Histroy</title>
<head>
</head>
<div class="mt-5 container-fluid">
        <table id="editableTable" class="table">
        <thead>
            <tr>
                <th scope="col">Receiver</th>
                <th scope="col">subject</th>
                <th scope="col">Body</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($developer = mysqli_fetch_assoc($resultSet)) { ?>
                <tr>
                    <td><?php echo $developer['receiver']; ?></td>
                    <td><?php echo $developer['subject']; ?></td>
                    <td><?php echo $developer['body']; ?></td>
                    <td><?php echo $developer['date']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>