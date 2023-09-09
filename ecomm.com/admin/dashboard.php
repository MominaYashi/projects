<?php 
  session_start();
  
  // Check if the user is not logged in, redirect to the login page
  if (!isset($_SESSION['username'])) 
  {
    header("location: index.php");
    exit(); // Ensure that the script stops executing after the redirect
  }

  // Logout logic
  if (isset($_POST['logout'])) 
  {
    session_destroy();
    header("location: index.php");
    exit(); // Ensure that the script stops executing after the redirect
  }
  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	WELCOME TO DASHBOARD
	<form method="post">
	 <a href="#">
  	<input type="submit" name="logout" value="Logout">
    </a>
	</form>


</body>
</html>