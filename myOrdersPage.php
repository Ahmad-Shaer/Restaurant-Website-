<?php
session_start();
if(isset($_SESSION["isLoggedIn"])){
    if($_SESSION["isLoggedIn"] == 0 )header("location:signinPage.php");
}
else{
    header("location:signinPage.php");
}
$protocol =  "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$email = $_SESSION['email'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>Orders</title>
</head>
<body>
<?php
include "PageHeader.html"?>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">My Orders</h2>
        <?php
        $sql1 = "SELECT * FROM foodOrder WHERE customer_email =' $email' " ;
        $db = new mysqli('localhost','root','','project');
        $res = $db -> query($sql1);
        $count = $res ->num_rows ;
        if( $count > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date =$row['order_date'];
                $status = $row['status'];

                    ?>
                    <div class="food-menu-box">

                        <div class="food-menu-desc">
                            <h4><?php echo $food ;?></h4>
                            <p class="food-price"> total price $<?php echo $total ;?></p>
                            <p class="food-detail">
                                Status : <?php echo $status ." / ";?>
                                Quantity :<?php echo $qty ." / ";?>
                                 Time :<?php echo  $order_date;?>
                            </p>
                            <br>

                        </div>
                    </div>


                    <?php
                }

        }else{
            echo " No Orders Yet" ;
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