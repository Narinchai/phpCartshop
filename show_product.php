<?php
include'condb.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
   

</head>
<body>
<?php
include'menu.php';?>
 <div class="container">
 <div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert">List Product</div>
 <form method="POST" action="show_product.php">
 <div class="row">
 <div class="col-md-3 ">
<select class="form-select" name="key_type" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php
        $sql2 ="SELECT * FROM type ORDER BY type_name";
        $hand1 = mysqli_query($conn,$sql2);
        while($row2=mysqli_fetch_array($hand1)) {
            ?>
  <option value=" <?=$row2["type_id"]?> "> <?=$row2["type_name"]?> </option> <?php }?> 
</select></div> 
<div class="col-4">
    <button type="submit" name="btt1" class="btn btn-primary">Search</button>
    <button type="submit" name="btt2" class="btn btn-primary">ALL</button>
</div></div></form><BR>
    <div class="row bg-dark  text-white">
    <?php
            $perpage = 8;
            if(isset($_GET['page'])){
                $page= $_GET['page'];
            }else{
                $page=1;
            }
        $start = ($page-1) * $perpage;
        $key_type =@$_POST['key_type'];

           if(isset($_POST['btt1'])){
            $sql ="SELECT * FROM product p,type t WHERE p.type_id=t.type_id and p.type_id='$key_type' order by pro_id limit {$start},{$perpage}";     
           }elseif(isset($_POST['btt2'])){
            $sql ="SELECT * FROM product p,type t WHERE p.type_id=t.type_id order by pro_id limit {$start},{$perpage}";
           }else{
            $sql ="SELECT * FROM product p,type t WHERE p.type_id=t.type_id order by pro_id limit {$start},{$perpage}";
           }
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)) {
            $amout1=$row['amount'];
        ?>

     <div class="col-md-3 mb-4 mt-4">  <img src="image/<?=$row["image"]?>" width="150" height="150" class="img-thumbnail"><br>
     รหัสสินค้า:<?=$row["pro_id"]?><br>
     ชื่อสินค้า:<?=$row["pro_name"]?><br>
     ราคา:<b class="text-danger"><?=$row["price"]?></b> บาท<br>
     คงเหลือ:<?=$row["amount"]?><br>

     <?php if($amout1 <=0){ ?>
     <a class="btn btn-danger mt-3" href="#">สินค้าหมด</a>
     <?php }else{ ?>
        <a class="btn btn-outline-success mt-3" href="order.php?id=<?=$row['pro_id']?>">Add Cart</a><?php }?>
    </div><?php }?>
 
     <?php
        $sql1 ="SELECT * FROM product";
        $query1 = mysqli_query($conn,$sql1);
        $total_record = mysqli_num_rows($query1);
        $total_page = ceil($total_record/$perpage );
       
        ?>
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    <li class="page-item"> <a class="page-link" href="show_product.php?page=1">Previous</a></li>
            <?php for($i=1;$i<=$total_page;$i++){?>
    <li class="page-item"> <a class="page-link" href="show_product.php?page=<?=$i?>"><?=$i?></a></li>
             <?php } ?>
    <li class="page-item"> <a class="page-link" href="show_product.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>
        </div>
</div> 


     
</body>
</html>

