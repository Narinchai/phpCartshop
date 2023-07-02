<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>        
    </head>
    <body class="sb-nav-fixed">
    <?php include 'menu1.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4 mt-4">
                            <div class="card-header col-10">
                                <i class="fas fa-table me-1"></i>สินค้าคงเหลือ
                                <div class="card-body">
                                <table table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>no.</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคา</th>
                                            <th>จำนวนคงเหลือ</th>
                                            <th>image</th>
                                            <th>เพิ่มสินค้า</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php $sql ="SELECT * FROM product ";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)) { 
                                        $amout1=$row['amount'];
                                      ?>
                                    <tbody>
                                    <tr>
                                            <th><?=$row['pro_id']?></th>
                                            <th><?=$row['pro_name']?></th>
                                            <th><?=$row['price']?></th> 
                                            <th><?php if($amout1 <=0){ ?>
                                             <a class="btn btn-danger" href="#">สินค้าหมด</a>
                                            <?php }else{ ?>
                                            <a><?=$row['amount']?> </a></th>  <?php }?>
                                            <th><img src="../image/<?=$row['image']?>" width="100" height="100" class="img-thumbnail"></th>

                                            <th><a href="update_product.php?id=<?=$row["pro_id"]?>" class="btn btn-success mb-4">เพิ่มสินค้า</a></th>
                                            <th><a href="edit_product.php?id=<?=$row["pro_id"]?>" class="btn btn-warning mb-4">แก้ไข</a></th>
                                            <th><a href="delete_product.php?id=<?=$row["pro_id"]?>" class="btn btn-danger mb-4" onclick="del1(this.href); return false">ลบสินค้า</a></th>   
                                        </tr>
                                        <?php } 
                                        mysqli_close($conn); ?> 
                                    </tbody>


                                </div>
                        </div>
                    </div>
                  
                </main>
                
            
            </body>
            
</html>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    <script>
function del(mypage){
        var agree=confirm('คุณต้องการยกเลิกใบสั่งซื้อสินค้าหรือไม่');
        if(agree){
            window.location=mypage;
        }
}
function del1(mypage1){
        var agree=confirm('คุณต้องการลบสินค้านี้หรือไม่');
        if(agree){
            window.location=mypage1;
        }
}
    </script>
