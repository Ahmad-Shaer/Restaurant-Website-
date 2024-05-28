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
        <h1> Update Order</h1>
        <br><br>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'] ;
        $sql = "SELECT * FROM foodOrder WHERE id=$id ";
        $db = new mysqli('localhost','root','','project');
        $res = $db -> query($sql);
        $count = $res->num_rows;
        if($count == 1){
            $row = $res ->fetch_assoc();

            $food = $row['food'];
            $idNumber = $row['id'];
            $foodPriceOrder = $row['price'];
            $qty = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];

        ?>
        <form action="" method="post">
            <table class="tableOrder" >
            <tr>
                <input type="hidden" name="idNum" value="<?php echo $idNumber;?>">
                <td align="left"> Food Name :</td>
                <td> <?php echo $food ;?></td>
            </tr>
                <tr>
                    <td align="left"> Price :</td>
                    <td> <?php echo "$".$foodPriceOrder ;?> </td>
                </tr>
                <tr>
                    <td align="left"> total :</td>
                    <td> <?php echo "$".$total ;?> </td>
                </tr>
            <tr>
                 <td align="left"> Quantity :</td>
                  <td> <?php echo $qty ;?> </td>
            </tr>
             <tr>
                 <td align="left"> Status: </td>
                 <td>
                     <select name="status" id="">
                         <option value="ordered" <?php if($status == "ordered")echo "selected";?> > Ordered</option>
                         <option value="Delivered" <?php if($status == "Delivered")echo "selected";?> > delivered</option>
                     </select>
                 </td>
             </tr>
                <tr>
                    <td align="left"> Customer Email :</td>
                    <td> <?php echo $customer_email ;?> </td>
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
            $id = $_POST['idNum'];
            $status = $_POST['status'];
            $qry1 ="UPDATE foodOrder SET
            Status='$status'
            WHERE id =$id";
            $db = new mysqli('localhost','root','','project');
            $db -> query($qry1);
            $db ->commit();
            $db -> close();
            header("location:AdminOrders.php");

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