<?php
session_start();
if(isset($_SESSION["isLoggedIn"])){
    if($_SESSION["isLoggedIn"] == 1 && $_SESSION["count"] == 1 ){
        $_SESSION["count"] = 2;
        echo " <script> alert(' you have logged in successfully ') </script>";
    }
}
$protocol =  "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>Home</title>
</head>
<body>
<?php
include "PageHeader.html"?>
<div id="imagesCarousel" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#imagesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Image 1"></button>
        <button type="button" data-bs-target="#imagesCarousel" data-bs-slide-to="1" aria-label="Image 2"></button>
        <button type="button" data-bs-target="#imagesCarousel" data-bs-slide-to="2" aria-label="Image 3"></button>
    </div>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="imgs/1stImage.jpeg" width = "100%" height="750px" alt="Restaurant">
            <div class="carousel-caption d-none d-md-block">
                <h3>Welcome to our Restaurant</h3>
                <p>We may be a little pricey, but our quality and service are unsurpassed.</p>
            </div>

        </div>
        <div class="carousel-item">
            <img src="imgs/2ndImage.jpeg" width = "100%" height="750px" alt="Restaurant">
            <div class="carousel-caption d-none d-md-block">
                <h3>Drinks from heaven</h3>
                <p>Chill and enjoy our drinks.</p>
            </div>
        </div>


        <div class="carousel-item">
            <img src="imgs/thirdImage.jpeg" width = "100%" height="750px" alt="Restaurant">
            <div class="carousel-caption d-none d-md-block">
                <h3>Food</h3>
                <p>Get the best quality food out there.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#imagesCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imagesCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql1 = "SELECT * FROM food WHERE active ='Yes' LIMIT 6" ;
        $db = new mysqli('localhost','root','','project');
        $res = $db -> query($sql1);
        $count = $res ->num_rows ;
        if( $count > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $descreption = $row['descreption'];
                $price = $row['price'];
                $active = $row['active'];
                $image_name = $row['image_name'];
                $imageURL = $CurPageURL ."/../AdminPages/Images/". $image_name ;
                if($image_name != ""){
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $imageURL?>"  class="img-responsive img-curve" width=" 250px">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title?></h4>
                        <p class="food-price">$<?php echo $price?></p>
                        <p class="food-detail">
                            <?php echo $descreption?>
                        </p>
                        <br>

                        <a href="OrderFood.php<?php echo "?food_id=". $id;  ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>


        <?php
                }
            }
        }else{
            echo " Food Not Available" ;
        }

        $db -> close() ;
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<div class="fot">
    <div class="wrap">
        <p align="center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>
