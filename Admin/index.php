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
	  header("location:index.php?file=login");
	  exit();
	}
	else
	{
	   header("location:index.php?file=login");
	   exit();
	}
		
	if(!file_exists(getcwd()."/middle/".$_REQUEST['file'].".php"))
	{
		header("location:index.php?file=404");
		exit();
	}
  ?>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php if ($filename != 'login') { ?>
  <header id="header" class="header fixed-top d-flex align-items-center">
  <?php include_once("include/header.php");?>
  </header><!-- End Header -->
  <?php } ?>
  <!-- ======= Sidebar ======= -->
  <?php if ($filename != 'login') { ?>
  <aside id="sidebar" class="sidebar">

<?php include_once("include/leftbar.php");?>
  </aside><!-- End Sidebar-->
  <?php } ?>
 
<?php if ($filename != 'login') { ?>
 <main id="main" class="main">
    <div class="pagetitle">
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?file=home">Home</a></li>
          <li class="breadcrumb-item active" style="text-transform: capitalize;"><?php echo $filename; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
	
      <div class="row">
       <?php } ?>
	   <?php include_once("middle/".$filename.".php");?>
     <?php if($filename != 'login'){ ?>
      </div>
    </section>

  </main><!-- End #main -->
	 <?php } ?>
  <!-- ======= Footer ======= -->
  <?php if ($filename != 'login') { ?>
  <footer id="footer" class="footer">
   <?php include_once("include/footer.php"); ?>
  </footer><!-- End Footer -->
  <?php } ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <?php include_once("include/script.php"); ?>
 

</body>

</html>
<?php ob_flush(); ?>