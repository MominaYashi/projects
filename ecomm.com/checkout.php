<?php include("top.php") ?>
<html>

<head>
    <?php include("head.php") ?>
</head>

<body>
    <?php include("header.php") ?>
<div class="container">
    <h2>CHECKOUT</h2>
    <hr>
<?php
$message='';

?>
<table class="table table-bordered">
    <tr>
        <td width="50%">
            <h5>Order Summary</h5>
<?php
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
   
            ?>
<table class="table table-bordered">
<tr>
   
    <th>Product</th>
    <th>Qty</th>
    <th>Price</th>
    <th class="pull-right">Amount</th>

</tr>
<?php
$total=0;
while($row=$result->fetch_assoc())
{
    $amount=$row['qty']*$row['price'];
    $total=$total+$amount;
?>
    <tr>
      
        <td>
            <?= $row["product_name"] ?> 
        </td>
        <td width="5%">
            
            <?= $row["qty"] ?>             

        </td>
        <td align="right">
            <?= $row["price"] ?>    
        </td>
        <td align="right">
            <?= $row["qty"]*$row["price"] ?>    
        </td>
       
        </div>
    </tr>
<?php
}


$gst_amount=($total*18)/100;
$grand_total=$total+$gst_amount;

?>  
<tr>

    <td align="right" colspan="3">Total :</td>
    <td align="right"><?= $total ?></td>
</tr>
<tr>

    <td align="right" colspan="3">GST 18%: </td>
    <td align="right"><?= $gst_amount  ?></td>
</tr>
<tr>

    <td align="right" colspan="3">Paid Amount: </td>
    <td align="right"><?= $grand_total  ?></td>
</tr>
</table> 

        </td>
        <td>
            <h5>Shipping Details</h5>
            <?php
                $user_id=get_user_id();
                $sql="select * from users where user_id=$user_id";
                $result=$con->query($sql);
                $row=$result->fetch_assoc();
            ?>
            <?= $row["name"] ?><br>
            <?= $row["address"] ?><br>
            <?= $row["email"] ?><br>
            <?= $row["mobile_no"] ?><br>



        </td>
    </tr>
</table>

    <?= $message ?>
</div>

    <?php include("footer.php") ?>    
  <br>

    <table>
         <tr>
             <td>
              first   
             </td>
             <td>
                 second
             </td>
         </tr>

    </table> 


</body>
</html>
<?php include("bottom.php") ?>