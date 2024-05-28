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
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>SingUp</title>
</head>
<body>

<?php
include "PageHeader.html"?>
<section class="PageContent">
    <div class="container">

        <h2 class="text-center text-white">Fill Your Information Here</h2>

        <form action="processSU.php" enctype="multipart/form-data" method="post" class="order">

            <fieldset>
                <legend>Sing Up</legend>
                <table>
                    <tr>
                        <td><label for="userEmail"> email address :</label>  </td>
                        <td><input type="email" name="userEmail" id="userEmail" class="input-responsive" required></td>
                    </tr>
                        <td><label for="userName"> Name :</label>  </td>
                        <td><input type="text" name="userName" id="userName" class="input-responsive" required ></td>
                    </tr>
                    <tr>
                        <td><label for="userPass"> Password : </label></td>
                        <td><input type="password" name="userPass" id="userPass"  class="input-responsive" required></td>
                    </tr>
                    <tr>
                        <td><label for="userLocation"> Location : </label></td>
                        <td><input type="text" name="userLocation" id="userLocation"  class="input-responsive" required></td>
                    </tr>
                    <tr>
                        <td><label for="userPhoneNumber"> Phone Number :</label></td>
                        <td><input type="number" name="userPhoneNumber" id="userPhoneNumber"  class="input-responsive" required ></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><input type="submit" value=" Create "></td>
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
