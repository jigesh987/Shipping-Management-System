<?php
session_start();
?>
<?php include("adminpanelheader.php");


if (empty($_SESSION["i"]) && empty($_SESSION["o"])) {
    echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/index.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<title>Admin</title>
<body>

    <?php include("database_connect_2.php");
    
    $sql3 = "SELECT * FROM customer";
    $resultSet = mysqli_query($conn, $sql3) or die("database error:" . mysqli_error($conn));
    ?><br>
    <h1 class="text-center">Our Customers</h1>
    <div class="mt-5">
        <div class="container-fluid">
            <?php
            $sql3 = "SELECT COUNT(*) FROM customer";
            if ($ress = mysqli_query($conn, $sql3)) {
                if (mysqli_num_rows($ress) > 0) {
                    while ($roww = mysqli_fetch_array($ress)) {
                        echo "Total Customer : ";
                        echo $roww['0'];
                    }
                }
            }
            ?>
        </div>
        <div class="container-fluid">
        <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Date of Account Creation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($developer = mysqli_fetch_assoc($resultSet)) { ?>
                        <tr>
                            <td><?php echo $developer['userid']; ?></td>
                            <td><?php echo $developer['username']; ?></td>
                            <td><?php echo $developer['useremail']; ?></td>
                            <td><?php echo $developer['usergender']; ?></td>
                            <td><?php echo $developer['userage']; ?></td>
                            <td><?php echo $developer['date_of_birth']; ?></td>
                            <td><?php echo $developer['userphone']; ?></td>
                            <td><?php echo $developer['date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<html>