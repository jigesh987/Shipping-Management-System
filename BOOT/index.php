<?php

//include("./others/navigationbar2.php");

include("./navigationbar2.php");
?>
<title>Home</title>
<body>
    <div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/index6.jpg" class="w-100" alt="..." height="800px;">
                </div>
                <div class="carousel-item">
                    <img src="./image/index2.jpg" class="w-100" alt="..." height="800px">
                </div>
                <div class="carousel-item">
                    <img src="./image/index3.jpg" class="w-100" alt="..." height="800px">
                </div>
                <div class="carousel-item">
                    <img src="./image/index8.jpg" class="w-100" alt="..." height="800px">
                </div>
                <div class="carousel-item">
                    <img src="./image/index7.jpg" class="w-100" alt="..." height="800px">
                </div>
                <div class="carousel-item">
                    <img src="./image/index9.jpg" class="w-100" alt="..." height="800px">
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


        <h1 class="text-center my-5">Our Services</h1>
        <div class="d-flex flex-wrap justify-content-evenly">
            <div class="card" style="width: 250px;">
                <img src="./image/1.jpg" class="card-img-top" alt="..." style="height: 140px;">
                <div class="card-body">
                    <h5 class="card-title">Shipping Service</h5>
                    <p class="card-text"></p>
                    <a href="./others/shippingservice.php" class="btn btn-primary">Visit</a>
                </div>
            </div>
            <div class="card" style="width: 250px;">
                <img src="./image/6.jpg" class="card-img-top" alt="..." style="height: 140px;">
                <div class="card-body">
                    <h5 class="card-title">Marine Services</h5>
                    <p class="card-text"></p>
                    <a href="./others/marineservice.php" class="btn btn-primary">Visit</a>
                </div>
            </div>

            <div class="card" style="width: 250px;">
                <img src="./image/truck2.jpg" class="card-img-top" alt="..." style="height: 140px;">
                <div class="card-body">
                    <h5 class="card-title">Transport Servcies</h5>
                    <p class="card-text"></p>
                    <a href="./others/transportservice.php" class="btn btn-primary">Visit</a>
                </div>
            </div>
        </div>
    </div>


</body>
<?php
include("footer.php");
?>