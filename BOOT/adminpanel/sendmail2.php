<?php
session_start();
include("database_connect_2.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/mscit_project/PHPMailer/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/mscit_project/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/mscit_project/PHPMailer/PHPMailer-master/src/SMTP.php';




 
 if(isset($_POST["send"]))
{
    // Initialize PHPMailer
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'jigeshjethava89@gmail.com';             // SMTP username
        $mail->Password   = 'kgggpnohcihamsim';                     // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable SSL encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('jigeshjethava89@gmail.com', 'Absolute Shipping');
        $mail->addAddress($_POST["remail"]);                        // Add recipient's email

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $_POST["rsubject"];
        $mail->Body    = $_POST["temail"];

        $receiver=$_POST["remail"];
        $subject=$_POST["rsubject"];
        $body=$_POST["temail"];

        $sql = "INSERT INTO email (receiver, subject, body, date) VALUES ('$receiver', '$subject', '$body', NOW())";

        if (mysqli_query($conn, $sql)) {
            #echo "<script>alert('Email sent successfully and saved to the database!')</script>";
        } else {
            echo "<script>alert('Email sent but could not save to the database: " . mysqli_error($conn) . "')</script>";
}

        $mail->send();
        echo "<script>alert('Email sent successfully!')</script>";
        echo "<script>window.location = './adminpanelemail.php';</script>";
    } 
    catch (Exception $e) {
        echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }
   
}

?>