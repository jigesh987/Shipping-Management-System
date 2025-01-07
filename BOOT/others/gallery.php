<?php
include("navigationbar2.php");
?>
<br>
<h1 style="text-align: center;">Gallery</h1><br>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../image/new/a.jpeg" class="w-100" alt="..." height="800px;">
    </div>
    <div class="carousel-item">
      <img src="../image/new/b.jpeg" class="w-100" alt="..." height="800px">
    </div>
    <div class="carousel-item">
      <img src="../image/new/d.jpeg" class="w-100" alt="..." height="800px">
    </div>
    <div class="carousel-item">
      <img src="../image/new/e.jpeg" class="w-100" alt="..." height="800px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <!--<span class="visually-hidden">Previous</span>-->
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <!--<span class="visually-hidden">Next</span>-->
  </button>
</div>

<?php
include("footer.php");
?>