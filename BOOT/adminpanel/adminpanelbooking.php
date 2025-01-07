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

if (isset($_POST['idid']))
{
    $a = $_POST['idid'];

    $sql2 = "SELECT * FROM container_table where order_id='$a'";
    
    if ($res = mysqli_query($conn, $sql2))
    {
        if (mysqli_num_rows($res) > 0)
        {
            $sql = "delete from container_table where order_id='$a'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "<script>alert('Booking Enquiry deleted successfully')</script>";
            }
            else
            {
                echo "<script>alert('Error')</script>";
            }
        }
        else
        {
            echo "<script>alert('Booking Enquiry do not Exist')</script>";
        }
    }
}



$sql3 = "SELECT * FROM container_table";
$resultSet = mysqli_query($conn, $sql3) or die("database error:" . mysqli_error($conn));
?><br>
<title>Booking Enquiry</title>
<head>
    <script>
        function check() {
            var a = confirm("Do yor want to Delete Enquiry");
            if (a == true) {
                return true;
            } else {
                return false;
            }
        }

    </script>
</head>
<h1 class="text-center">Booking-Enquiry</h1>

<div class="container">
    <form method="POST" action="" onsubmit="return check()">
        <input class="form-control" type="text" placeholder="Enter Account ID to Delete Account" size="30" maxlength="1000" name="idid" required="" style="width: 300px;"><br>
        <input type="submit" value="Delete" class="btn btn-primary">
    </form>
</div>
<br>



<div class="mt-5 container-fluid">
    <table id="editableTable" class="table">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">User Id</th>
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
                    <td><?php echo $developer['order_id']; ?></td>
                    <td><?php echo $developer['userid']; ?></td>
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