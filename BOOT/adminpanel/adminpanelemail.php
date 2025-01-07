<?php
session_start();
?>
<?php
include("adminpanelheader.php");
?>
<?php
if (empty($_SESSION["i"]) && empty($_SESSION["o"])) {
  echo "<script>window.location = 'http://localhost/mscit_project/BOOT/adminpanel/index.php';</script>";
}
?>
<title>E-mail</title>
<body>
<br>
<h1 class="text-center">E-Mail</h1>

<form method="POST" action="./sendmail2.php">
<div class="container mt-5 d-flex align-items-center flex-column">
  <div class="row">
  <div class="col mb-3">
    <label for="exampleFormControlInput1" class="form-label">Receiver E-Mail Address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Receiver E-Mail Address" required="" name="remail" style="width: 450px;">
  </div>
  </div>
  <div class="row">
  <div class="col mb-3">
    <label for="exampleFormControlInput1" class="form-label">Subject</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Subject" name="rsubject" style="width: 450px;">
  </div>
</div>
<div class="row">
  <div class="col mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">E-Mail Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="temail" style="width: 450px;"></textarea>
  </div>
</div>
<div class="row">
  <div class="col mb-3">
    <input type="submit" name="send" value="Send" class="btn btn-primary">
  </div>
</div>
</div>

</form>
</body>