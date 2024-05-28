<?php
session_start();


        ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'] ;
    $image_name = $_GET['image_name'];
    if($image_name != ""){
        $path = "http://localhost/FinalProject/AdminPages/Images/ ".$image_name;
        $remove = unlink($path);
    }
    $sql = "DELETE FROM food WHERE id=$id ";
    $db = new mysqli('localhost','root','','project');
    $res = $db -> query($sql);
    $db ->commit();
    $db ->close();
    header("location:AdminFood.php");

}
?>
</body>
</html>
