<?php
session_start();
if(isset($_SESSION["isLoggedIn"])){
    if($_SESSION["isLoggedIn"] == 0 )header("location:signinPage.php");
}
else{
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
    <link rel="stylesheet" href="myStyles/headerPage.css">
    <title>Profile</title>
</head>
<body>
<?php
include "PageHeader.html"?>

<section class="PageContent">
    <div class="container">

        <h2 class="text-center text-white">You're Information :</h2>
            <div class="order">
                <fieldset>
                    <legend>Profile</legend>
                    <table class="text-center">
                        <tr>
                            <td> Name :  </td>
                            <td> <?php echo $_SESSION['name'] ;?> </td>
                        </tr>
                        <tr>
                            <td> Email : </td>
                            <td><?php echo $_SESSION['email'] ;?></td>
                        </tr>
                        <tr>
                            <td> Location : </td>
                            <td><?php echo $_SESSION['location'] ;?></td>
                        </tr>
                        <tr>
                            <td> Phone Number : </td>
                            <td><?php echo $_SESSION['phoneNumber'] ;?></td>
                        </tr>
                    </table>
                </fieldset>
            </div>


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
