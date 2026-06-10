<?php 


	
   $_SESSION['ucontact'] = "";
   $_SESSION['img'] = "";
   $_SESSION['userid'] = "";
   $_SESSION['username'] = "";
   $_SESSION['utime'] = "";
	
	session_destroy();
	
	header("location:index.php?file=home");


?>