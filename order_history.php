<?php
session_start();
include 'condb.php'; 
$ids=$_SESSION["cus_id"];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินค้าในตะกร้า</title>
       <!-- Bootstrap CSS -->
       <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
include'menu.php';?>

<div class= "container">
<div class= "card" style="width: 80rem;">
<div class="h4 text-center alert alert-dark mb-4 mt-5" role="alert">รายการการสั่งซื้อ</div>
                                <div class="card-body">
                                <table id="datatablesSimple" table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ชิ่อ นามสกุล</th>
                                            <th>address</th>
                                            <th>tel</th>
                                            <th>ราคารวม</th>
                                            <th>การชำระเงิน</th>
                                            <th>Date</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sql="select * from tb_order where id=$ids and order_status = 1 order by reg_date DESC" ;
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        $status = $row['order_status'];
                                    ?>
                                        <tr>
                                            <td><?=$row["order_id"]?></td>
                                            <td><?=$row["cus_name"]?></td>
                                            <td><?=$row["address"]?></td>
                                            <td><?=$row["telephone"]?></td>
                                            <td><?=$row["total_price"]?></td>
                                            <td> <?php if($status == 1){
                                                echo "<b style='color:orange'>ยังไม่ชำระเงิน</b>";
                                            }else if($status == 2){
                                                echo "<b style='color:green'>ชำระเงินแล้ว</b>";
                                            }else if($status == 0){
                                                echo "<b style='color:red'>ยกเลิกคำสั่งซื้อ</b>"; 
                                            }?></td>
                                            <td><?=$row["reg_date"]?></td>
                                            <td><a href="print_order_detail1.php?id=<?=$row["order_id"]?>" class="btn btn-success">รายละเอียด</a></td>
                                            <td><a href="pay_ment2.php?id=<?=$row["order_id"]?>" class="btn btn-warning"type="submit"
                                             onclick="del1(this.href); return false">ชำระเงิน</a></td>
                                          
                                        </tr>
                                    <?php } ?></tbody>
                                    
                                </table>
</div></div>