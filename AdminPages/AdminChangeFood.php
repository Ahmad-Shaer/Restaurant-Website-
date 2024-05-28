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
<div class="mainContent">
    <div class="wrapper">
        <h1> Update Food</h1>
        <br><br>
        <?php
        if(isset($_GET['id'])){
        $id = $_GET['id'] ;
        $sql = "SELECT * FROM food WHERE id=$id ";
        $db = new mysqli('localhost','root','','project');
        $res = $db -> query($sql);
        $count = $res->num_rows;
        if($count == 1){
        $row = $res ->fetch_assoc();
        $idNumb = $row['id'];
        $title = $row['title'];
        $descreption = $row['descreption'];
        $price = $row['price'];
        $image_nameOld = $row['image_name'];
        $active = $row['active'];

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tableOrder" >
                <tr>
                    <input type="hidden" name="idNum" value="<?php echo $idNumb;?>">
                    <input type="hidden" name="image_nameOld" value="<?php echo $image_nameOld ;?>">
                    <td align="left"> title :</td>
                    <td><input type="text"  name="title" value="<?php echo $title;?>" ></td>
                </tr>
                <tr>
                    <td align="left"> descreption :</td>
                    <td><input type="text"  name="descreption" value="<?php echo $descreption;?>"> </td>
                </tr>
                <tr>
                    <td align="left"> price :</td>
                    <td><input type="number" name="price" value="<?php echo $price;?>" > </td>
                </tr>
                <tr>
                    <td> image :</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td align="left"> Status: </td>
                    <td>
                        <select name="active" id="">
                            <option value="Yes" <?php if($active == "Yes")echo "selected";?> > Yes</option>
                            <option value="No" <?php if($active == "No")echo "selected";?> > No</option>
                        </select>
                    </td>
                </tr>

                <?php
                }
                }?>
                <tr>
                    <td><br> <input type="submit" name="submit" value="Update Order"></td>
                    <td >

                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $image_nameO = $_POST['image_nameOld'];
            echo $image_nameO;
            $idnumber = $_POST['idNum'];
            $title = $_POST['title'];
            $description = $_POST['descreption'];
            $price = $_POST['price'];
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            }else{
                $active ="NO";
            }
            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name !=""){
                    $remove_path = "http://localhost/FinalProject/AdminPages/Images/".$image_nameO;
                    $remove = unlink($remove_path);
                    $extention = explode('.',$image_name);
                    $extention = end($extention);
                    $image_name = "Food-Name-".rand(0000,9999).".".$extention;
                    $src =$_FILES['image']['tmp_name'];
                    $dst = "Images/" . $image_name ;
                    $upload = move_uploaded_file($src ,$dst);

                }
                else{
                    $image_name = $image_nameO;

                }
            }else{
                $image_name = $image_nameO;
            }
            $sql1 = " UPDATE food SET
                     title = '$title',
                     descreption = '$description',
                     price = $price,
                     image_name ='$image_name',
                     active = '$active'
                     WHERE id =$idnumber";

            $db = new mysqli('localhost','root','','project');
            $db -> query($sql1);
            $db -> commit();
            $db -> close() ;
            header("location:AdminFood.php");

        }
        ?>
    </div>
</div>
<div class="footer">
    <div class="wrapper">
        <p class="admin-text-center"> 2022 All rights reserved, Perlin , Developed by Ahmad Shaer</p>
    </div>
</div>
</body>
</html>