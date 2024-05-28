<?php
session_start();
if(isset($_SESSION["isLoggedIn"])){
    if($_SESSION["isLoggedIn"] == 0 )header("location:signinPage.php");
}
else{
    header("location:signinPage.php");
}
$imageURL ="";
$title = "";
$price = "";
if( isset($_GET['food_id']) ) {
    $found_id = $_GET['food_id'];
    $protocol = "http://";
    $CurPageURL = $protocol . "localhost/FinalProject/OrderFood.php";
    $db = new mysqli('localhost', 'root', '', 'project');
    $qry = " SELECT * FROM food WHERE id ='$found_id'";
    $res = $db->query($qry);
    $count = $res->num_rows;
    if ($count == 1) {
        $row = $res->fetch_assoc();
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $imageURL = $CurPageURL . "/../AdminPages/Images/" . $image_name;
        $db->close();
    }else{
        header("location:homePage.php");
    }
}else header("location:homePage.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>Profile</title>
</head>
<body>
<?php
include "PageHeader.html"?>
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="post">
            <fieldset>
                <legend>Selected Food</legend>
                <input type="hidden" name="food" value=" <?php echo $title; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="hidden" name="name" value=" <?php echo $_SESSION['name']; ?> ">
                <input type="hidden" name="email" value=" <?php echo $_SESSION['email']; ?> ">
                <input type="hidden" name="location" value=" <?php echo $_SESSION['location']; ?> ">
                <input type="hidden" name="phoneNumber" value=" <?php echo $_SESSION['phoneNumber']; ?> ">
                <div class="food-menu-img">
                    <img src="<?php echo $imageURL; ?>" alt="" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <p class="food-price">$<?php echo $price; ?></p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </div>

            </fieldset>

        </form>
        <?php

        if (isset($_POST["submit"])) {
            $food = $_POST['food'];
            $foodPriceOrder = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $foodPriceOrder * $qty;
            $order_date = date("Y-m-d h:i:sa");
            $status = "ordered";
            $customer_name = $_POST['name'];
            $customer_contact = $_POST['phoneNumber'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['location'];


            $db = new mysqli('localhost', 'root', '', 'project');
            try {
                $sql2 = "INSERT INTO foodOrder SET
                    food = '$food',
                    price = $foodPriceOrder,
                    qty = $qty ,
                    total = $total ,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
";

                $res = $db->query($sql2);
                $db->commit();
                $db->close();

            } catch (mysqli_sql_exception $e) {
                var_dump($e);
                exit;
            }

        }

        ?>

    </div>
</section>
<div class="clearfix"></div>
<div class="fot">
    <div class="wrap">
        <p align="center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>
