<?php
include 'condb.php';
session_start();
$order="";
$name="";
$total=0;
if (isset($_SESSION["cus_id"])){ 
    $key_word=$_SESSION["cus_id"];
    if($key_word !=""){
    $sql="select * from tb_order where id='" .$_SESSION["cus_id"]. "' and order_status=1 ";
    unset ($_SESSION['ERROR']);
    }else{
        echo "<script> window.location='pay_ment.php';</script>";
        unset ($_SESSION['ERROR']);
    }
    $hand=mysqli_query($conn,$sql);
    $num1=mysqli_num_rows($hand);

    if($num1 ==0 ){
        echo "<script> window.location='pay_ment.php';</script>";
        $_SESSION['ERROR'] = "ไม่พบเลขที่ใบสั่งซื้อ";
    }else{
    $row=mysqli_fetch_array($hand);
    $order=$row['order_id'];
    $name=$row['cus_name'];
    $total=$row['total_price'];
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>แจ้งชำระเงิน</title>

</head>
<body>
    <div class="container">
        <?php include 'menu.php' ?>
        <div class="row">
            <div class="col-6">
                <div class="alert alert-success mt-5 me-5">แจ้งชำระเงิน</div>
                <div class="border col-7 mt-2 me-2"style="background-color:#f0f0f5;">
                   <form action="pay_ment.php" method="POST">
                        <label>เลขที่คำสั่งซื้อ</label>
                        <input type="text" name="keyword">
                        <button type="submit" name="btn1" class="btn btn-primary">ค้นหา</button><br>
                        <?php if (isset($_SESSION['ERROR'])){
                                echo $_SESSION['ERROR'];
                          
                        } ?>
                   </form></div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                    <form action="insert_payment.php" method="post" enctype="multipart/form-data">
                        <label class="mt-4">เลขที่คำสั่งซื้อ</label>
                        <input type="text" name="order_id" require value=<?=$order?>><br>
                        <label class="mt-4">ชื่อ นามสกุล</label>
                        <textarea type="text" class="form-control" name="name"rows="1" require><?=$name?></textarea>
                        <label class="mt-4">จำนวนเงิน</label>
                        <input type="number" class="form-control" name="total_price" require value=<?=$total?>>
                        <label class="mt-4">วันที่โอน</label>
                        <input type="date" class="form-control" name="pay_date" require >
                        <label class="mt-4">เวลาโอน</label>
                        <input type="time" class="form-control" name="pay_time" require>
                        <label class="mt-4">รูป</label>
                        <input type="file" class="form-control" name="file1" require ><br>
                        <button type="submit" name="btn1" class="btn btn-primary">ยืนยัน</button><br>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>