<?php
include'condb.php';
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include'menu.php';?>
    <div class= "container">
  
        <div class="h4 text-center alert alert-dark mb-4 mt-5" role="alert">List Members</div>
    <a href="fr_member.php" class="btn btn-secondary mb-4 " >add-</a>

        <table class="table table-dark table-striped">
<thead>
        <tr>
            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr></thead>
        <?php
        $sql = "SELECT * FROM member";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)) {
        ?>

        <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["surname"]?></td>
        <td><?=$row["telephone"]?></td>
        <td><a href="edit_member.php?id=<?=$row["id"]?>" class="btn btn-secondary mb-4 " >EDIT</a></td>
        <td><a href="delete_member.php?id=<?=$row["id"]?>" class="btn btn-secondary mb-4" onclick="Del(this.href);return false;" >DELETE</a></td>
        </tr>
        <?php
        }
        mysqli_close($conn); //ปิดการเชื่อมต่อ
        ?>
  </div>
</table>
</body>
</html>

<script language="JavaScript">
    function Del(mypage){
        var agree=confirm("คุณต้องการลบข้อมูลหรือไม่");
        if(agree){
            window.location=mypage;
        }
    }
    </script>