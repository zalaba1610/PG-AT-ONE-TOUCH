<?php 

$ownerid = $_SESSION['ownerid'];
date_default_timezone_set("Asia/Kolkata");
$c_date = date('Y-m-d H:i:s');

$up = "update owner_tb set o_udate = '$c_date' where o_id = '$ownerid'";
if($con->query($up)==TRUE)
{
	
	$_SESSION['contact'] = "";
    $_SESSION['img'] = "";
    $_SESSION['ownername'] = "";
    $_SESSION['time'] = ""; 
    $_SESSION['ownerid'] = ""; 
	
	
	session_destroy();
	
	header("location:index.php?file=login");
}


?>