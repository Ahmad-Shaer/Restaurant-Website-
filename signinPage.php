<?php
session_start();
if( isset($_SESSION["RInfo"]) && isset($_SESSION["tried"] )) {
    if ( $_SESSION["RInfo"] == 0 && $_SESSION["tried"] == 1) echo " <script> alert(' wrong information please check youre data ') </script>";
}
    $_SESSION["isLoggedIn"] = 0;
    $_SESSION["count"] = 1 ;
    $_SESSION["email"] = "";
    $_SESSION["name"] = "";
    $_SESSION["location"] ="";
    $_SESSION["phoneNumber"] = "";
    $_SESSION["admin"] =0 ;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>SignIn</title>
</head>
<body>
<?php
include "PageHeader.html"?>

    <section class="PageContent">
        <div class="container">

            <h2 class="text-center text-white">Fill Your Information Here</h2>

            <form action="processSI.php" enctype="multipart/form-data" method="post" class="order">

                <fieldset>
                    <legend>Log IN</legend>
                    <table>
                        <tr>
                            <td><label for="SuserEmail"> email address :</label>  </td>
                            <td><input type="email" name="SuserEmail" id="SuserEmail" class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><label for="SuserPass"> Password : </label></td>
                            <td><input type="password" name="SuserPass" id="SuserPass"  class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td><input type="submit" value=" Login "></td>
                        </tr>
                        <tr>
                            <td> Doesn't have an Account : </td>
                            <td><a href="signupPage.php"> Sign Up</a></td>
                        </tr>
                    </table>

            </form>

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
