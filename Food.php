<?php
session_start();
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
    <title>Food</title>
</head>
<body>
<?php
include "PageHeader.html"?>

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
                            <img src="<?php echo $imageURL ;?>"  class="img-responsive img-curve" width=" 250px">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title ;?></h4>
                            <p class="food-price">$<?php echo $price ;?></p>
                            <p class="food-detail">
                                <?php echo $descreption;?>
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
