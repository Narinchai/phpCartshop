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
    <title>Add product</title>
</head>

<body>
    <div class= "container">
    <?php
include'menu.php';?>
  
            <div class="row">
                <div class="col-md-6">
                <div class="h4 text-center alert alert-dark mt-4 mb-2" role="alert">เพิ่มข้อมูลสินค้า</div>
                    <form name='form1' method='Post' action='insert_product.php' enctype="multipart/form-data">
        <label>ชื่อ :</label>
        <input type="text"  name="pname" class="form-control"  placeholder="..ชื่อสินค้า" required ><br>
        <label>ประเภทสินค้า :</label>
        <select class="form-select" name="typeID">
                     <option selected>เลือกประเภทสินค้า</option>
                     <?php
        $sql = "SELECT * FROM type ORDER BY type_ID";
        $hand=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($hand)) {
        ?>
                     <option value="<?=$row["type_id"]?>"><?=$row["type_name"]?></option>
      

                     <?php
        }
        mysqli_close($conn); //ปิดการเชื่อมต่อ
        ?>
        </select><br>

        <label>ราคา :</label>
        <input type="number" name="price" class="form-control" placeholder="..ราคา" required ><br>

        <label>จำนวน :</label>
        <input type="number" name="amount" class="form-control" placeholder="..จำนวน" required ><br>    

        <label>รูปภาพ :</label>
        <input class="form-control" type="file" name="file1"  required ><br>

        <button type="submit" class="btn btn-secondary"> Save    </button>   <a href="show_product.php" class="btn btn-secondary mt-4 mb-4 " > Cancel </a>


                    </form>
            </div>
      </div>
    </div>



</body>
</html>