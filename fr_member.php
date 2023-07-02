

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formmember</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
     
    <div class="container">
    <?php
include'menu.php';?>
        <div class="row">
            <div class=col-md-6>
    <div class="h4 text-center alert alert-dark mb-4 mt-2" role="alert">สมัครสมาชิก</div>
    <form method="POST" action="insert_member.php">
        <label>ชื่อ :</label>
        <input type="text"  name="fname" class="form-control"  placeholder="..ชื่อ" required ><br>
        <label>นามสกุล :</label>
        <input type="text" name="lname" class="form-control"  placeholder="..นามสกุล" required ><br>
        Address :
        <textarea type="text" name="address" row="3" class="form-control"  placeholder="..ที่อยู่" required ></textarea><br>

        <label>เบอร์โทรศัพท์ :</label>
        <input type="number" name="telephone" class="form-control" placeholder="..เบอร์โทรศัพท์" required ><br>
        <label>Username :</label>
        <input type="text"  name="username" class="form-control"  placeholder="..username" required ><br>
        <label>Password :</label>
        <input type="password" name="password" maxlength="10" class="form-control"  placeholder="..รหัสผ่าน" required ><br>
        <input type="submit" value="submit" class="btn btn-secondary">
        <a href="index.php" class="btn btn-secondary mt-4 mb-4 " >cancel</a><br>
           <a href="login.php">Login</a> 
 
</form>


</div></div>

</div>
</body>
</html>