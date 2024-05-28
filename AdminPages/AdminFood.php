<?php
session_start();
if(isset($_SESSION['admin']) ){
    if($_SESSION['admin'] == 0 )header("location:../signinPage.php");
}else header("location:../signinPage.php");
$sn =0 ;
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
    <div class="wrapper">
        <h1 > Manage Food </h1>
        <br>
        <a class="AddFood" href="AdminAddFood.php"> Add Food </a>
        <br>
        <br><br>
        <table class="table-full tableContent">
            <tr>
                <th> Serial Number</th>
                <th> title </th>
                <th> Description </th>
                <th> Price</th>
                <th> Image </th>
                <th> Status </th>
                <th> Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM food";
            $db = new mysqli('localhost','root','','project');
            $res = $db -> query($sql);
            $count = $res->num_rows;
            if($count > 0){
                while( $row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $descreption = $row['descreption'];
                    $price = $row['price'];
                    $active = $row['active'];
                    $image_name = $row['image_name'];


            ?>

            <tr>
                <td>  <?php echo $sn++; ?></td>
                <td>  <?php echo $title; ?></td>
                <td> <?php echo $descreption; ?></td>
                <td> <?php echo $price ;  ?></td>
                <td>  <?php

                        if($image_name == ""){
                            echo " Image not Added";
                        }else {
                            $imageURL = $CurPageURL ."/../Images/". $image_name ;

                            ?>
                            <img src=" <?php echo $imageURL?> " width="100px" >
                        <?php }
                            ?>
                 </td>
                <td> <?php echo $active; ?></td>
                <td><a href="http://localhost/FinalProject/AdminPages/AdminChangeFood.php?id=<?php echo $id ;?>"> Change Food <br> </a>
                    <a href="http://localhost/FinalProject/AdminPages/AdminDeleteFood.php?id=<?php echo $id ;?>&image_name=<?php echo $image_name;?>">Delete Food </a> </td>

            </tr>
            <?php
                }
            }
            ?>


        </table>


</div>
<div class="footer">
    <div class="wrapper">
        <p class="admin-text-center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>
