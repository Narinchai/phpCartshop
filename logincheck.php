<?php
session_start();
require_once 'condb.php';

$username=$_POST['username'];
$password=$_POST['password'];
$password=hash('sha512',$password);

$sql="select * from member WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if($row > 0){
    $_SESSION["username"]=$row['username'];
    $_SESSION["pw"]=$row['password'];
    $_SESSION["cus_id"]=$row['id'];
    $_SESSION["name"]=$row['name'];
    $_SESSION["lastname"]=$row['surname'];
    $_SESSION["address"]=$row['address'];
    $_SESSION["tphone"]=$row['telephone'];
    $_SESSION["admin_ses"]=$row['role'];

    $_SESSION["Error"] ="";
    echo "<script> window.location='index.php';</script>";
    $_SESSION["Error"] ="";

}else{
    $_SESSION["Error"] = "<p>username or password invalid</p>";
    echo "<script> window.location='login.php';</script>";
}
echo $show;
?>