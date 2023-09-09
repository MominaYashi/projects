<?php include("top.php") ?>
<html>
<head>
    <?php include("head.php") ?>
</head>
<body>
    <?php include("header.php") ?>
<?php

$error="";
if(isset($_POST['username']) && isset($_POST['password']))
{
            $username=$_POST['username'];
            $password=$_POST['password'];

            //check from database 
            $sql ="select * from users where username='".$username."'and password='".$password."' ";

            $result=$con->query($sql);
            $total_rows = $result->num_rows;
            if($total_rows>0)
            {
                $row=$result->fetch_assoc();
                $_SESSION['username']=$username;
                $_SESSION['user_id']=$row["user_id"];

                if($_SESSION['last_url'])
                    header("location: ".$_SESSION['last_url']);
                else
                    header("location: profile.php");
            }
            else
                $error="Login Failed !";
}            
             

?>    

    <div class="container">
        <h2>LOGIN</h2>

        <div class="row">

            <div class="col-md-12">
                <div class="login-form">
                    <form method="POST" action="login.php">
                        <span><?= $error ?></span>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <br>
                                    <input type="submit" value="Login" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


        
    </div>


    <?php include("footer.php") ?>    
</body>
</html>
<?php include("bottom.php") ?>