<?php
include'condb.php';

$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$address=$_POST['address'];
$tel=$_POST['telephone'];
$username=$_POST['username'];
$password=$_POST['password'];
$password=hash('sha512',$password);




$sql="INSERT into member(name,surname,address,telephone,username,password) VALUES('$f_name','$l_name','$address','$tel','$username','$password')";
$result=mysqli_query($conn,$sql);
if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='show_member.php';</script>";

}else{
        echo "<script>alert ('ไม่สามารถบันทึกข้อมูลได้');</script>";

}

mysqli_close($conn); 
?>
