<?php
include'condb.php';

$ids=$_GET['id'];
$sql="DELETE FROM MEMBER WHERE id='$ids'";
if(mysqli_query($conn,$sql)){
echo "<script> alert('ลบข้อมูลเรียบร้อย');</script>";
echo "<script> window.location='show_member.php';</script>";
}else {
   echo "Error : " . $sql . "<br>" . mysqli_error($conn);
   echo "<script> alert('ลบข้อมูลไม่สำเร็จ');</script>";

}
mysqli_close($conn);
?>