<?php
include'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
    </head>
<body>
<?php
include'menu.php';?>
<div class="container">


<div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert">search product</div>
<div class="row bg-dark text-white">
<?php 
      $perpage = 8;
      if(isset($_GET['page'])){
          $page= $_GET['page'];
      }else{
          $page=1;
      }
      $start = ($page-1) * $perpage;
      $key_word =@$_POST['keyword'];
      if ($key_word !="") {
        $sql ="SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' order by pro_id limit {$start},{$perpage}";
       } else {
        $sql ="SELECT * FROM product order by pro_id limit {$start},{$perpage}";
       }
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($result)) {?>


        <div class="col-md-3 mb-4 mt-4"><img src="image/<?=$row["image"]?>" width="150" height="150" class="img-thumbnail"><br>
        รหัสสินค้า:<?=$row["pro_id"]?><br>
        ชื่อสินค้า:<?=$row["pro_name"]?><br>
        ราคา:<b class="text-danger"><?=$row["price"]?></b> บาท<br>
        คงเหลือ:<?=$row["amount"]?>
    
        </div><?php }?>



    
</div>  
</div>
</body>
</html>