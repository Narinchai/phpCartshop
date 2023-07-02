<?php
include'condb.php';
$id=$_GET['id'];
$sql="SELECT * FROM product WHERE pro_id='$id' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

?>

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
<body>
     
<body class="sb-nav-fixed">
    <?php include 'menu1.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4 mt-4">
                            <div class="card-header col-10">
                                <i class="fas fa-table me-1"></i>สินค้าคงเหลือ
                                <div class="card-body">
                                <table table class="table table-hover">
                                <form method="POST" action="update_amount.php">
        <label>รหัสสินค้า:<?=$row['pro_id']?></label>
        <input type="text"  name="pro_id" class="form-control" readonly value=<?=$row['pro_id']?>><br>
        <label>ชื่อสินค้า :<?=$row['pro_name']?></label>
        <br>
        <label>ราคา:<?=$row['price']?> </label>
     <br>
        <label>คงเหลือ:</label>
        <input type="number" name="amount" class="form-control" value=<?=$row['amount']?> ><br>

        <input type="submit" value="update" class="btn btn-success">
              <a href="report_product.php" class="btn btn-secondary mt-4 mb-4 " >back</a>
</form>


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
        var agree=confirm('คุณต้องการปรับสถานะใบสั่งซื้อสินค้าหรือไม่');
        if(agree){
            window.location=mypage1;
        }
}
    </script>
