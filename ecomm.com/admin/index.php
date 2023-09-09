<?php 
   
   session_start();
   if(isset($_SESSION['username']))
    header("location: dashboard.php");
   
 ?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
      
      <?php 
           
           $error="";
           if(isset($_POST['username']) && isset($_POST['password']))
           {
            $username=$_POST['username'];
            $password=$_POST['password'];


            //check from database 
            $conn = new mysqli('localhost', 'root','','task_1');
            $sql ="select * from user where username='".$username."'and password='".$password."' ";

            $result=$conn->query($sql);
            $total_rows = $result->num_rows;


            if($total_rows>0)
            {
                $_SESSION['username']=$username;
                header("location: dashboard.php");
            }
            else
            {
                $error="invalid login";
            }
           }


           //check
          ?>

    <form action="index.php" method="post">
         
         username <input type="text" name="username">
         <br>
         password <input type="text" name="password">
         <br>
         login    <input type="submit" name="" value="submit">

         <strong> <?=$error ?>  </strong>
         
    </form>

</body>
</html>