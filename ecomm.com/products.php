<?php include("top.php") ?>
<html>
<head>
    <?php include("head.php") ?>
</head>
<body>
    <?php include("header.php") ?>
    
<?php
$sql ="select * from product";
$result=$con->query($sql);
?>


    <div class="container">
        <h2>PRODUCTS</h2>

        <div class="row">
<?php
while($row=$result->fetch_assoc())
{
?>
    <div class="col-md-3">
        <div class="product">
            <img src="assets/images/cpu.jpg" width="100%">
            <?= $row["product_name"] ?>
            <hr>
            <a href="product-info.php?pid=<?= $row["product_id"] ?>">
                View Detail
            </a>
        </div>
    </div>
<?php
}
?>  
        </div>


        
    </div>


    <?php include("footer.php") ?>    
</body>
</html>
<?php include("bottom.php") ?>