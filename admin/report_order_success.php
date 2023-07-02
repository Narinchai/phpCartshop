<?php include 'condb.php'; 


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
                                <i class="fas fa-table me-1"></i>แสดงข้อมูลคำสั่งซื้อสินค้า ที่ชำระแล้ว
                            <br>
                            <div><br>
                            <a href="report_order.php"><button class="btn btn-warning">ยังไม่ชำระเงิน</button></a>
                            <a href="report_order_success.php"><button class="btn btn-success">ชำระเงินแล้ว</button></a>
                             <a href="report_order_unsuccess.php"><button class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></a>
                            </div></div>
                            <div class="card-body">
                                <table id="datatablesSimple" table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ชิ่อ นามสกุล</th>
                                            <th>address</th>
                                            <th>tel</th>
                                            <th>ราคารวมสุทธิ</th>
                                            <th>สถานะการชำระเงิน</th>
                                            <th>Date</th>
                                            <th>pic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$sql = "SELECT * FROM tb_order WHERE order_status = 2 ORDER BY reg_date DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $status = $row['order_status'];
    $picture_id = $row["order_id"];
    $sql1 = "SELECT * FROM payment WHERE order_id = $picture_id";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
?>
                                        <tr>
                                            <td><?=$row["order_id"]?></td>
                                            <td><?=$row["cus_name"]?></td>
                                            <td><?=$row["address"]?></td>
                                            <td><?=$row["telephone"]?></td>
                                            <td><?=$row["total_price"]?></td>
                                            <td> <?php if($status == 1){
                                                echo "<b style='color:orange'>ยังไม่ชำระเงิน</b>";
                                            }else if($status == 2){
                                                echo "<b style='color:green'>ชำระเงินแล้ว</b>";
                                            }else if($status == 0){
                                                echo "<b style='color:red'>ยกเลิกคำสั่งซื้อ</b>"; 
                                            }?></td>
                                            <td><?=$row["reg_date"]?></td>                       
                                  <td><img src="../image/<?=$row1["pay_image"]?>" width="150" height="150"></td>
                                        </tr>
                                         <?php } ?></tbody>
                                </table>
                            </div>
                        </div><?php include 'footer.php'; ?>
                    </div>
                </main>
                
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
    <script>
function del(mypage){
        var agree=confirm('คุณต้องการยกเลิกใบสั่งซื้อสินค้าหรือไม่');
        if(agree){
            window.location=mypage;
        }
}
    </script>
