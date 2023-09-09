<div class="container">

<img src="logo.png">
</div>
<hr>
<div class="container">
  <a href="index.php">
HOME
</a>


 | 
<a href="about-us.php">
 ABOUT US
</a>
  | 
<a href="products.php">
  PRODUCTS 
</a>
  |

<?php
if(is_login()==false)
{

?>
    <a href="login.php">
       LOGIN
    </a>
       | 
       REGISTER 
       | 
<?php
}
else
{
?>
    <a href="cart.php">
        MY CART
    </a>
        |

    <a href="logout.php">
       LOGOUT
    </a>
       

<?php  
}
?>
 
</div>
<hr>
