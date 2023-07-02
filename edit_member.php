<?php
include'condb.php';
$id=$_GET['id'];
$sql="SELECT * FROM member WHERE id='$id' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_MEMBER</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
     
    <div class="container">
        <div class="row">
            <div class=col-sm-4>
    <div class="h4 text-center alert alert-dark mb-4 mt-5" role="alert">แก้ไขข้อมูลสมาชิก</div>
    <form method="POST" action="update_member.php">
        <label>รหัสสมาชิก:</label>
        <input type="text"  name="id_mem" class="form-control" readonly value=<?=$row['id']?>><br>
        <label>ชื่อ :</label>
        <input type="text"  name="fname" class="form-control" value=<?=$row['name']?>><br>
        <label>นามสกุล :</label>
        <input type="text" name="lname" class="form-control" value=<?=$row['surname']?>><br>
        <label>เบอร์โทรศัพท์ :</label>
        <input type="number" name="telephone" class="form-control" value=<?=$row['telephone']?> ><br>
        <input type="submit" value="update" class="btn btn-secondary">
        <a href="show_member.php" class="btn btn-secondary mt-4 mb-4 " >cancel</a>
</form></div></div>
</div>
</body>
</html>