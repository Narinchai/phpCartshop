<?php
include'condb.php';

$amount=$_POST['amount'];
$id=$_POST['pro_id'];
$p_name=$_POST['pro_name'];
$price=$_POST['price'];


$sql = "UPDATE product SET pro_name='$p_name',price='$price',amount='$amount' WHERE pro_id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
        echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='report_product.php';</script>";

}else{
        echo "<script>alert ('ไม่สามารถแก้ไขข้อมูลได้');</script>";
 
}

mysqli_close($conn);
?>
