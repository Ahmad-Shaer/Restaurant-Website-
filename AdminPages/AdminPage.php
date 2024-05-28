<?php
session_start();
if(isset($_SESSION['admin']) ){
    if($_SESSION['admin'] == 0 )header("location:../signinPage.php");
}else header("location:../signinPage.php");
$db = new mysqli('localhost','root','','project');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="adminStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
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
       <h1>  DASHBOARD </h1>

        <div class ="adminContent admin-text-center ">
            <?php
            $qry = "SELECT * FROM food";
            $res = $db -> query($qry);
            $count = $res ->num_rows ;
            ?>
            <h1> <?php echo $count; ?> </h1>
            <br>
            Foods
        </div>
        <div class ="adminContent admin-text-center ">
            <?php
            $qry1 = "SELECT * FROM foodOrder WHERE status ='Delivered'";
            $res1 = $db -> query($qry1);
            $count1 = $res1 ->num_rows ;

            ?>
            <h1 > <?php echo $count1; ?> </h1>
            <br>
            Total Orders done
        </div>
        <div class ="adminContent admin-text-center ">
            <?php
            $qry2 = "SELECT * FROM foodOrder WHERE status ='ordered'";
            $res2 = $db -> query($qry2);
            $count2 = $res2 ->num_rows ;

            ?>
            <h1 > <?php echo $count2; ?> </h1>
            <br>
            Total Orders Undone
        </div>
        <div class ="adminContent admin-text-center ">
            <?php
            $qry3 = "SELECT SUM(total) AS  Total FROM foodOrder WHERE status ='Delivered'";
            $res3 = $db -> query($qry3);
            $row3 = $res3 ->fetch_assoc();
            $total_revenue = $row3['Total'];

            ?>
            <h1 > $ <?php echo  $total_revenue; ?> </h1>
            <br>
            Total Revenue
        </div>

    <div class="Adminclearfix"> </div>
</div>
<div class="footer">
    <div class="wrapper">
       <p class="admin-text-center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>
