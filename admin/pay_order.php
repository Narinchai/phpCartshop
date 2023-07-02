<?php
include'condb.php';
$ids= $_GET['id'];

$sql = "UPDATE tb_order set order_status = 2 WHERE order_id='$ids' ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='report_order.php';</script>";

}else{
        echo "<script>alert ('ไม่สามารถแก้ไขข้อมูลได้');</script>";

}

mysqli_close($conn);
?>

