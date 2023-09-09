<?php 
include("top.php");
secure();
?>
<html>
<head>
    <?php include("head.php") ?>
</head>
<body>
    <?php include("header.php") ?>
    
<?php
$message='';

$user_id=get_user_id();

if(isset($_GET['mode']) && isset($_GET['product_id']))
{

    $mode=$_GET['mode'];
    $product_id=$_GET['product_id'];
    $sql="delete from cart where user_id=$user_id and product_id=$product_id";
    $con->query($sql);

    $message="Product   Removed From Cart..";



}
else if(isset($_POST['mode']) && isset($_POST['product_id']))
{
    $mode=$_POST['mode'];
    $product_id=$_POST['product_id'];
    if($mode=='a' && isset($_POST['qty']))
    {
        $qty=$_POST['qty'];

        

        // check for duplicate
        $sql="select * from cart where user_id=$user_id and product_id=$product_id";
        
        $res=$con->query($sql);        
        if($res->num_rows>0)
            $message="Product is already in cart.";
        else
        {
            
            $sql=$sql." values($user_id,$product_id,$qty) ";

            $con->query($sql);

            $message='Product Added Into Card Successfully.';
        }

    }
   
}



$user_id=get_user_id();

$sql ="
select 
c.user_id,p.product_name,p.product_id,c.qty,p.price
from cart c
inner join
product p
on c.product_id=p.product_id
and c.user_id=$user_id
";

$result=$con->query($sql);
if($result->num_rows==0)
    $message="Cart is empty";
?>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>MY CART</h2>
            </div>
            <div class="col-md-4">
                <?= $message ?>
            </div>
            <div class="col-md-4">
<form method="post" action="checkout.php">                
<input type="submit" class="btn btn-success" value="Checkout" style="float:right">
</form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

<table class="table table-bordered">
<tr>
    <th>
        
    </th>
    <th>Product</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Amount</th>
    <th></th>
</tr>
<?php
while($row=$result->fetch_assoc())
{
?>
    <tr>
        <td width="5%">
            <img src="assets/images/cpu.jpg" width="100%">
            
        </td>
        <td>
            <?= $row["product_name"] ?> 
        </td>
        <td width="5%">
            
            <?= $row["qty"] ?>             

        </td>
        <td width="5%">
            
            <?= $row["price"] ?>             

        </td>
        <td width="5%">        
            <?= $row["price"]*$row["qty"] ?>             
        </td>
        <td width="15%" align="center">
            <a href="product-info.php?pid=<?= $row["product_id"] ?>">
                View 
            </a>      
            |      
            <a href="cart.php?mode=r&product_id=<?= $row["product_id"] ?>">
                Remove
            </a>            
        </td>
        </div>
    </tr>
<?php
}
?>  
</table>                
            </div>
        </div>


        
    </div>


    <?php include("footer.php") ?>    
</body>
</html>
<?php include("bottom.php") ?>