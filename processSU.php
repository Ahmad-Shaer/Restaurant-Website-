<?php
session_start();

if( isset($_POST["userName"]) && isset($_POST["userPass"]) && isset($_POST["userLocation"]) && isset($_POST["userPhoneNumber"]) && isset($_POST["userEmail"])){
    $email = $_POST["userEmail"];
    $name = $_POST["userName"];
    $pass = $_POST["userPass"];
    $location = $_POST["userLocation"] ;
    $PNO = $_POST["userPhoneNumber"];

    $_SESSION["count"] = 1 ;
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["location"] =$location ;
    $_SESSION["phoneNumber"] = $PNO;

    $db = new mysqli('localhost','root','','project');
    $qry = "INSERT INTO user (Email ,Name ,Pass, Location,PhoneNumber) 
            VALUES (' " .$email ."',' " .$name ."', ' ". sha1($pass)."', '" .$location. "', '" .$PNO. "')";
    $db -> query($qry);
    $db -> commit();
    $db -> close();
    $_SESSION['isLoggedIn'] = 1 ;
    header("location:homePage.php");
}
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

</body>
</html>
