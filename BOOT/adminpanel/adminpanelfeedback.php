<?php
session_start();
?>
<?php
include("adminpanelheader.php");
include("database_connect_2.php");

if (empty($_SESSION["i"]) && empty($_SESSION["o"])) {
    echo "<script>window.location = 'http://localhost/BOOT/adminpanel/index.php';</script>";
}

?>

<?php    
    $sql3 = "SELECT * FROM feedback";
    $resultSet = mysqli_query($conn, $sql3) or die("database error:" . mysqli_error($conn));
    ?><br>
    <title>Feedback</title>
    <h1 class="text-center">FeedBack</h1>
    <div class="mt-5">
        <div class="container-fluid">
        <br>
            <table id="editableTable" class="table">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phonenumber or Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($developer = mysqli_fetch_assoc($resultSet)) { ?>
                        <tr>
                            <td><?php echo $developer['date']; ?></td>
                            <td><?php echo $developer['comment']; ?></td>
                            <td><?php echo $developer['name']; ?></td>
                            <td><?php echo $developer['phoneoremail']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>