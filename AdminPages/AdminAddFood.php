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
    <div class="wrapper">
        <h1>  Add Food </h1>
        <br><br>
        <form action="" enctype="multipart/form-data" method="post">
            <table class="tableManage">
                <tr>
                    <td> Title :</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td> Description :</td>
                    <td><textarea name="description" id="" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td> price :</td>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td> image :</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td> active :</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value=" Add Food" name="submit">
                    </td>

                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            }else{
                $active ="NO";
            }
            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name !=""){
                    $extention = explode('.',$image_name);
                    $extention = end($extention);
                    $image_name = "Food-Name-".rand(0000,9999).".".$extention;
                    $src =$_FILES['image']['tmp_name'];
                    $dst = "Images/" . $image_name ;
                    $upload = move_uploaded_file($src ,$dst);
                }
            }else{
                $image_name =" ";
            }
            $sql1 = "INSERT INTO food SET 
                     title = '$title',
                     descreption = '$description',
                     price = $price,
                     image_name ='$image_name',
                     active = '$active'";
            $db = new mysqli('localhost','root','','project');
            $db -> query($sql1);
            $db -> commit();
            $db -> close() ;
            header("location:AdminFood.php");
        }
        ?>
    </div>
    <div class="footer">
        <div class="wrapper">
            <p class="admin-text-center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
        </div>
    </div>
</body>
</html>

