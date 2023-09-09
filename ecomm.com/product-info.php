<?php include("top.php") ?>
<html>
<head>
    <?php include("head.php") ?>
</head>
<body>
    <?php include("header.php") ?>
    
<?php
$_SESSION['last_url']=$server_name.$_SERVER['REQUEST_URI'];  //

$pid=$_GET['pid'];

$sql ="select * from product where product_id=".$pid;
$result=$con->query($sql);
$row=$result->fetch_assoc();

?>


    <div class="container">
        <h5><?= $row["product_name"] ?></h5>

        <div class="row">
                <div class="col-md-4">
                    <div class="product">
                        <img src="assets/images/cpu.jpg" width="100%">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-info">
                        <?= $row["description"] ?>
                        <br>
                        <br>
                        <form method="post" action="cart.php">
<input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
<input type="hidden" name="mode" value="a">
                        Qty
                        <input type="text" name="qty" required>
                        
                        <input type="submit" class="btn btn-primary" value="Add To Cart">

                        
                        </form>
                    </div>
                </div>
        </div>  
    </div>


    <?php include("footer.php") ?>    
</body>
</html>
<?php include("bottom.php") ?>