
<div class="container">

<!-- Example navigation menu using Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">หน้าหลัก</a>
  </li>
  <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">สมัครสมาชิก</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="fr_member.php">Register</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="login.php">Login</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="show_product.php">สินค้า</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cart.php">Cart</a>
  </li>

  <?php 
  if(isset($_SESSION["admin_ses"]) && $_SESSION["admin_ses"] == "admin") {
    ?>
  <li class="nav-item">
    <a class="nav-link" href="admin/report_order.php"><?=$_SESSION["admin_ses"]?></a>
  </li>   <?php }?>

    <?php 
   if (isset($_SESSION["name"])) {
    $checkid = $_SESSION["name"];
    ?>

    <li class="nav-item dropdown">  
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> Profile Menu </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="edit_member.php?id=<?php echo $_SESSION["cus_id"]; ?>">แก้ไขข้อมูล</a></li>
      <li><a class="dropdown-item" href="order_history.php?id=<?php echo $_SESSION["cus_id"];?>"> รายการสินค้าในตะกร้า</a></li>
      <li><a class="dropdown-item" href="showorder.php?id=<?php echo $_SESSION["cus_id"];?>"> ประวัติการสั่งซื้อ</a></li>
      <li><a class="dropdown-item" href="pay_ment.php?id=<?php echo $_SESSION["cus_id"];?>"> แจ้งชำระเงิน</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="logout.php">Logout &nbsp; <img src="logout.jpg" width="15"></a></li>
    </ul>
  </li><?php }else {
    $checkid = "";}?>

  <form class="d-flex" method="POST" action="search_product.php">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

</ul>
</div>
