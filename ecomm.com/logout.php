<?php include("top.php") ?>
<html>

<head>
    <?php include("head.php") ?>
</head>

<body>
    <?php include("header.php") ?>
   
<div class="container">   
<?php
session_destroy();
?>


    <h2>LOGOUT</h2>
    <hr>

    Logout done successfully.

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