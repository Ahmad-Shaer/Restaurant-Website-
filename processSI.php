<?php
session_start();
if( isset($_POST["SuserPass"]) && isset($_POST["SuserEmail"]) ){

    $_SESSION["RInfo"] = 0 ;
    $_SESSION["tried"] = 1 ;
    $semail = $_POST["SuserEmail"];
    if(strcmp($semail,"admin@admin.com") != 0) $semail = " ". $_POST["SuserEmail"];
    else  $_SESSION["admin"] = 1;
    $spass =  $_POST["SuserPass"];
    $encPass = sha1($spass);
    if(strcmp($semail,"admin@admin.com") != 0) $encPass = " ".sha1($spass);
    $db = new mysqli('localhost','root','','project');
    $qry = " select * from user WHERE Email = '$semail' AND Pass = '$encPass' " ;
    $result = $db -> query($qry);

    for($i =0; $i < $result->num_rows ; $i++) {
        if( $_SESSION["admin"] == 1) {
            $db ->close();
            header("location:AdminPages/AdminPage.php");
        }

        $row = $result->fetch_assoc();
        if ( $result -> num_rows > 0) {
            $_SESSION["RInfo"] = 1;
            $_SESSION['isLoggedIn'] = 1;
            $_SESSION['email'] = $row['Email'];
            $_SESSION["name"] = $row['Name'];
            $_SESSION["location"] = $row['Location'];
            $_SESSION["phoneNumber"] = $row['PhoneNumber'];
            $db ->close() ;
            header("location:homePage.php");
        }
    }
    $db ->close();
    header("location:signinPage.php");

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
