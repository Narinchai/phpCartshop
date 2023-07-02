<?php include 'condb.php'; 
$ids=$_GET['id'];
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
    <body class="sb-nav-fixed">
    <?php include 'menu1.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>แสดงข้อมูลคำสั่งซื้อสินค้า ที่ยังไม่ชำระเงิน
                           <br>
                            <div><br>
                            <a href="report_order.php"><button class="btn btn-success">กลับหน้าหลัก</button></a>
                            </div></div>
                    
                           
                            <div class="card-body">
                                <h5>เลขที่ใบสั่งซื้อ : <?=$ids?></h5>
                                <table table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">คำสั่งซื้อที่</th>
                                        <th scope="col">รายการสินค้า</th>
                                        <th scope="col">ราคา/ชิ้น</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">ราคารวม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sum_total=0;
                                    $sql ="SELECT * FROM order_detail d,product p,tb_order t where d.order_id=t.order_id and d.pro_id=p.pro_id and t.order_id='$ids' order by d.pro_id ";
                                  
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        $sum_total = $row['total_price'];
                                    ?>
                                        <tr>
                                        <th scope="row"><?=$row['pro_id'];?></th>
                                        <td><?=$row['pro_name'];?></td>
                                        <td><?=$row['orderPrice'];?></td>
                                        <td><?=$row['orderQty'];?></td>
                                        <td><?=$row['total'];?></td>
                                        </tr>
                                        
                                    <?php }
                                    mysqli_close($conn) ?></tbody>
                                    
                                </table>
                             
                                <p style="text-align:right;">ราคารวมสุทธิ<?=number_format($sum_total,2)?></p>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'footer.php'; ?>
            </div>
            </body>
</html>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
  
