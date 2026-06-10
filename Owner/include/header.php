<?php 
session_start();
if(!isset($_SESSION['contact']) || !isset($_SESSION['img']) || !isset($_SESSION['time']) || !isset($_SESSION['ownername']) || !isset($_SESSION['ownerid'])) 
{
	header("location:index.php?file=login");
}


?>
<div class="d-flex align-items-center justify-content-between">
      <a href="index.php?file=home" class="logo d-flex align-items-center">
        <img src="../upload/other/icon.jpg" alt="">
        <span class="d-none d-lg-block">PG At One Touch</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
                    <span>Last visit : <?php echo $_SESSION['time'];?></span>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
<!-- End Search Icon-->


       
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../upload/owner/<?php echo $_SESSION['img'];?>" alt="Profile" class="rounded-circle" style="width:36px; height:36px">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucfirst($_SESSION['ownername']);?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo ucfirst($_SESSION['ownername']);?></h6>
                <span>Web Developer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="index.php?file=logout">
                <i class="bi bi-box-arrow-right"></i>
               <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
