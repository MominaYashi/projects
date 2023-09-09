<?php
session_start();
$con = new mysqli('localhost', 'root','','ecom');

$server_name='http://localhost';


function is_login()
{	
	if(isset($_SESSION['user_id']))
		return(true);
	else
		return(false);
}
function get_user_id()
{
	$user_id=$_SESSION['user_id'];
	return($user_id);
}
function get_username()
{
	$username=$_SESSION['username'];
	return($username);
}
function secure()
{

	if(!isset($_SESSION['user_id']))
		header("location: login.php");
}


?>