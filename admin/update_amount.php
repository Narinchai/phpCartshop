<?php
include'condb.php';

$amount=$_POST['amount'];
$id=$_POST['pro_id'];



$sql = "UPDATE product set amount='$amount'  WHERE pro_id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='report_product.php';</script>";

}else{
        echo "<script>alert ('ไม่สามารถแก้ไขข้อมูลได้');</script>";
 
}

mysqli_close($conn);
?>

