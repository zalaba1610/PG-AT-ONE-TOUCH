<?php 

$username = $_SESSION['username'];
date_default_timezone_set("Asia/Kolkata");
$c_date = date('Y-m-d H:i:s');

$up = "update admin_tb set a_lastvisit = '$c_date' where a_username = '$username'";
if($con->query($up)==TRUE)
{
	$_SESSION['username'] = "";
	$_SESSION['img'] = "";
	$_SESSION['time'] = "";
	
	session_destroy();
	
	header("location:index.php?file=login");
}


?>