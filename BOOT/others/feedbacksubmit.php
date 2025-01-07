<?php
include("database_connect_2.php");

if (isset($_POST["comm"])) {
    $a = $_POST["comm"];
    $b = $_POST["name"];
    $c = $_POST["phoneemail"];

    $sql = "insert into feedback(comment,date,name,phoneoremail) values ('$a',NOW(),'$b','$c')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thank you for your valuable Feedback ')</script>";
        echo "<script>window.location = 'http://localhost/mscit_project/BOOT/index.php';</script>";
    } else
    {
        echo mysqli_error($conn);
    }
}
