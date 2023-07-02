<!DOCTYPE html>
<?php
    session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php
   
    include'menu.php';?>
        <div class="row">
            <div class=col-md-6>
    <div class="h4 text-center alert alert-dark mb-4 mt-2" role="alert">Login</div>
    <form method="POST" action="logincheck.php">
        <input type="text"  name="username" class="form-control"  placeholder="..username" required><br>
        <input type="password" name="password" maxlength="10" class="form-control"  placeholder="..รหัสผ่าน" required><br>
        <?php 
            if(!isset($_SESSION["Error"])){
                session_destroy();
            }
            else{
                echo "<div class='text-danger'>"; 
                echo $_SESSION["Error"]; 
                echo "</div>";
            }
            $_SESSION["Error"] ="";
            ?>
             
                
        
        <input type="submit" name="submit" value="Login" class="btn btn-primary"><br><br>
        <a href="fr_member.php">Register</a>
    </form>
    
    </div>
   </div>
</div>
</body>
</html>