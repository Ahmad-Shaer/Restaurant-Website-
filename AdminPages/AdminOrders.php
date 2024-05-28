<?php
session_start();
if(isset($_SESSION['admin']) ){
    if($_SESSION['admin'] == 0 )header("location:../signinPage.php");
}else header("location:../signinPage.php");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="adminStyle.css">
    <title>Document</title>
</head>
<body>
<div class="adminMenu">
    <div class="wrapper">
        <ul>
            <li><a href="AdminPage.php"> Home </a></li>
            <li><a href="AdminFood.php"> Food </a></li>
            <li><a href="AdminOrders.php"> Orders </a></li>
            <li><a href="AdminLogout.php"> Logout </a></li>
        </ul>
    </div>
</div>
<div class="mainContent ">
    <div class ="wrapper">
        <table class="table-full tableContent">
            <tr>
                <th> Serial Number</th>
                <th> food </th>
                <th> price </th>
                <th> Quantity</th>
                <th> Total </th>
                <th> Order Date </th>
                <th> Status </th>
                <th> customer Name</th>
                <th> Customer Contact</th>
                <th> Customer Email</th>
                <th> Customer Address</th>
                <th> Action </th>
            </tr>
            <?php
            $sql = "SELECT * FROM foodOrder";
            $db = new mysqli('localhost','root','','project');
            $res = $db -> query($sql);
            $count = $res->num_rows;
            if($count > 0){
                while( $row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $food = $row['food'];
                    $foodPriceOrder = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
            ?>
            <tr>
                <td> <?php echo $id ; ?></td>
                <td> <?php echo $food ; ?></td>
                <td> <?php echo $foodPriceOrder ; ?></td>
                <td> <?php echo $qty ; ?></td>
                <td> <?php echo $total ; ?></td>
                <td> <?php echo $order_date ; ?></td>
                <td> <?php echo $status ; ?></td>
                <td> <?php echo $customer_name ; ?></td>
                <td> <?php echo $customer_contact ; ?></td>
                <td> <?php echo $customer_email ; ?></td>
                <td> <?php echo $customer_address ; ?></td>
                <td><a href="http://localhost/FinalProject/AdminPages/AdminChangeOrder.php?id= <?php echo $id ;?>"> Change Status</a></td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>

</div>
<div class="footer">
    <div class="wrapper">
        <p class="admin-text-center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>
