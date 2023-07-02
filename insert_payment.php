<?php
include 'condb.php';
$orderid=$_POST['order_id'];
$price=$_POST['total_price'];
$pdate=$_POST['pay_date'];
$ptime=$_POST['pay_time'];

if (is_uploaded_file($_FILES['file1']['tmp_name'])){
    $new_image_name = 'bill_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']),PATHINFO_EXTENSION);
    $image_upload_path = "./image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
}else{
    $new_image_name="";
}
$sql="INSERT into payment(order_id,pay_money,pay_date,pay_time,pay_image) VALUES('$orderid','$price','$pdate','$ptime','$new_image_name')";
$sql1 = "UPDATE tb_order set order_status = 2 WHERE order_id='$orderid' ";
$result=mysqli_query($conn,$sql);
$result1=mysqli_query($conn,$sql1);
if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='pay_ment.php';</script>";

}else{
        echo "<script>alert ('ไม่สามารถบันทึกข้อมูลได้');</script>";

}


mysqli_close($conn);
?>