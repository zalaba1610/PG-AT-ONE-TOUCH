<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php  
  // file / page call
   include_once("include/head.php");
   include_once("include/config.php"); 
    if(isset($_REQUEST['file']))
	{
	   $filename = $_REQUEST['file'];
	}
	else if($_SERVER['QUERY_STRING']=="")
	{
	  header("location:index.php?file=home");
	  exit();
	}
	else
	{
	   header("location:index.php?file=home");
	   exit();
	}
		
	if(!file_exists(getcwd()."/middle/".$_REQUEST['file'].".php"))
	{
		header("location:index.php?file=404");
		exit();
	}
  ?>

</head>

<body class="body  counter-scroll">

   

    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
			<?php include_once("include/header.php");?>
           <!-- End Main Header -->
                
               <?php 
			    if($filename == 'home')
				{
			      include_once("include/slider.php");
				}
				else
				{
					include_once("include/banner.php");
				}
				?>
				
			   <!--start -->
			   <?php include_once("middle/".$filename.".php");?>
			   
			   <!--end-->
            <!-- Footer -->
           <?php include_once("include/footer.php");?>
        <!-- Bottom -->
        </div>
        <!-- /#page -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal Popup Bid -->


    <!-- Javascript -->
    
 <?php include_once("include/script.php"); ?>
 

</body>

</html>
<?php ob_flush(); ?>