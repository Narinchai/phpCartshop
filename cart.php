<?php
session_start();
include 'condb.php';
if(!isset($_SESSION["username"])){
    $show=header("location:login.php");
    echo "<script> alert('โปรด Login');</script>";
}

/*
$id=$_GET['id'];
$sql ="SELECT * from product where Pro_id='$id'";
    $result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<?php
include'menu.php';?>
    <div class="container">
    <div class="h4 text-center alert alert-dark mb-4 mt-5" role="alert">Cart</div>
        <form method="POST" id="form1" action="insert_cart.php">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                    <th></th>
                        <th>ลำดับที่</th>
                        <th></th>
                        <th>รายการสินค้า</th>  
                        <th>จำนวน</th>
                        <th>ลด/เพิ่ม</th>
                        <th>ราคารวม</th>
                        <th>ลบ</th>
                    </tr>
<?php
if(isset($_SESSION["intLine"],$_SESSION["strProductID"],$_SESSION["strQty"])){

$Total = 0;
$sum_price = 0;
$m=1;
    for($i=0;$i <= (int)$_SESSION["intLine"];$i++){
        if(($_SESSION["strProductID"][$i])!=""){
            $sql1="select * from product where pro_id= '" . $_SESSION["strProductID"][$i] . "' " ;
            $result1 = mysqli_query($conn,$sql1);
            $row_pro=mysqli_fetch_array($result1); 
            $_SESSION["Price"]=$row_pro['price'];
            $Total = $_SESSION["strQty"][$i];
            $sum = $Total * $row_pro['price'];
            $sum_price = $sum_price + $sum;
            $_SESSION["sum_price"] = $sum_price;
?>
                    <tr>
                    <th></th>
                        <th><?=$m?></th>
                        <th> <img src="image/<?=$row_pro["image"]?>" width="50" height="50" class="img-thumbnail"  ></th>
                        <th><?=$row_pro['pro_name']?></th>
                        <th><?=$_SESSION["strQty"][$i]?></th>

                        <th>
                            <?php if($_SESSION["strQty"][$i] > 1) { ?> 
                        <a href="order_delete.php?id=<?=$row_pro['pro_id']?>" class="btn btn-danger">-</a>
                            <?php } ?>          
                        <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-primary">+</a>
                        </th>
                        <th><?=$sum ?></th>    
                        <th> <a href="pro_delete.php?Line=<?=$i?>"><img src="image/delete.png" width="20"></a></th>
                    </tr>
<?php $m=$m+1; }}?>            
            <tr>
                <td class="text-end" colspan="6">ราคารวม</td>
                <td class="text-center"><?=$sum_price?></td>
                <td>บาท</td>
            </tr>
    </table>
<?php }?>
                <div style="text-align:right">
                <a href="show_product.php"><button type="button" class="btn btn-secondary">Click เลือกสินค้าต่อ</button></a>
                <button type="submit" class="btn btn-success" href="order.php?id=<?$row_pro['pro_id']?>">ยืนยันการสั่งซิ้อ</button>
                </div>

            </div>

        </div>
<div class="row">
    <div class="col-5 text-center alert-dark mb-4 mt-5" role="alert">
    <div class="col">
      ข้อมูลสำหรับจัดส่งสินค้า
      
   
    
    ชื่อ-นามสกุล<textarea name="cus_name" class="form-control"  placeholder="..Firstname-Lastname" required><?=$_SESSION["name"]?> &nbsp; <?=$_SESSION["lastname"]?></textarea><br>
    ที่อยู่ <textarea class="form-control" name="cus_add"  row="4" placeholder="..address" required><?=$_SESSION["address"]?></textarea><br>
    เบอร์โทรศัพท์<input type="text"  name="cus_tel" class="form-control"  placeholder="..tel" required value=<?=$_SESSION["tphone"]?>><br>
    </div><br>
    </div>
  </div>
        </form>
    </div>
</body>
</html>