<?php
session_start();
?>
<?php
include("./others/navigationbar2.php");
include("database_connect_2.php");

if (isset($_POST['email'])) {
  $USER = $_POST['email'];
  $USER = stripcslashes($USER);
  $USER = mysqli_real_escape_string($conn, $USER);
  $sql = "select * from customer where useremail = '$USER'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $_SESSION["forgot"] = $_POST["email"];

    $to_email = $_POST["email"];
    $subject = "Password Change";
    $body = "Click this link to change password http://localhost/mscit_project/BOOT/changepassword.php";
    $headers = "From: nishantmangliya26@gmail.com";
    if (mail($to_email, $subject, $body, $headers)) {

    } else {
      echo "Email sending failed...";
    }
    echo "<script type='text/javascript'>alert('Link Send to yout E-Mail Account');</script>";
  } else {
    echo "<script type='text/javascript'>alert('E-Mail Address Invalid');</script>";
    echo "<script>window.location = 'http://localhost/BOOT/password.php';</script>";
  }
}

?>
<br>
<br>
<br>
<script type="text/javascript">
  function navigate() {
    window.location = 'http://localhost/mscit_project/BOOT/securityquestions.php';
  }
</script>
<div>
  <form method="POST" action="">
    <div class="mb-3 d-flex align-items-center flex-column">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="email" style="width: 400px;" required="">
      <button type="submit" class="btn btn-primary my-3">Submit</button>
    </div>
  </form>
</div>

<div style="position: absolute; bottom: 0px; width: 100%">
  <?php
  include("footer.php");
  ?>
</div>