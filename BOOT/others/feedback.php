<?php
include("navigationbar2.php");
include("database_connect_2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<style>
body {
    background: url('../image/feedbackgif.gif')no-repeat;

    background-size: cover;
    background-position: top 50%;

    background-color: rgba(255, 255, 255, 0.8);
    /* Adjust transparency*/

}
</style>
</style>

<body>
    <div class="container mt-5" style="background:url('./image/b.gif');">
        <form method="POST" action="http://localhost/mscit_project/BOOT/others/feedbacksubmit.php">
            <label><strong>Give Us Feedback</strong></label>
            <textarea class="form-control" required="" style="height: 120px;max-width: 500px"
                name="comm"></textarea><br>

            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1"><strong>Name</strong></label>
                <input type="text" class="form-control" placeholder="Enter Name" style="max-width: 400px;" required=""
                    name="name">
            </div>

            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1"><strong>Email Address/Phone Number</strong></label>
                <input type="text" class="form-control" placeholder="Email Address or Phone Number"
                    style="max-width: 400px;" required="" name="phoneemail">
            </div>
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>

    <div style="position: absolute; bottom: 0px; width: 100%;">


</body>

</html>

<?php
    include("footer.php");
    ?>
</div>