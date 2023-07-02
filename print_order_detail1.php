<?php
session_start();
include 'condb.php'; 
$ids1=$_GET['id'];
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
<body>

<div class= "container">
<div class= "card" style="width: 50rem;">
<div class="h4 text-center alert alert-dark mb-4 mt-5" role="alert">การสั่งซื้อเสร็จสมบูรณ์</div>
<?php $sql = "SELECT * FROM tb_order WHERE id=$ids and order_id= $ids1";
$result = mysqli_query($conn, $sql);
$row1=mysqli_fetch_array($result);
$total_price = $row1['total_price'];?>


&nbsp;  เลขที่คำสั่งซื้อ : <?=$row1['order_id'];?> <br>
&nbsp; ชื่อ-นามสกุล : <?=$row1['cus_name'];?> <br>
&nbsp; address: <?=$row1['address'];?> <br>
&nbsp; tel: <?=$row1['telephone'];?> <br> 

<div class="card-body">
<table class="table table-hover table-striped">
<thead>
    <tr>
      <th scope="col">คำสั่งซื้อที่</th>
      <th scope="col">รายการสินค้า</th>
      <th scope="col">ราคา/ชิ้น</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคารวม</th>
    </tr>
  </thead>
  <tbody>
  <?php $sql1 ="SELECT * FROM order_detail d,product t where d.pro_id=t.pro_id and order_id = $ids1";
        $result1 = mysqli_query($conn,$sql1);
        while($row=mysqli_fetch_array($result1)) {
            ?>
    <tr>
      <td scope="row"><?=$row['pro_id'];?></td>
      <td scope="row"><?=$row['pro_name'];?></td>
      <td scope="row"><?=$row['orderPrice'];?></td>
      <td scope="row"><?=$row['orderQty'];?></td>
      <td scope="row"><?=$row['total'];?></td>
    </tr> 
    <?php } ?> 
</tbody>
</table><br>
<h5 class="text-end"> รวมเป็นเงิน <?=$total_price?>บาท </h5>
</div>
<h7 class="text-start">&nbsp;&nbsp;*กรุณาโอนเงินภายใน 7 วัน โอนเงินได้ที่ 555-5555-555 Kbank ชำระเงินแล้วโปรดแนบสลิป</h7>

</div>
<a href="order_history.php" class="btn btn-success">Back</a>
<button onclick="window.print()" class="btn btn-success">Print</button>

</div>
<?php mysqli_close($conn);

?>

</body>
</html>